<?php

class StockDB extends mysqli
{
	public $dbhost;
	public $dbuser;
	public $dbpwd;
	public $dbname;
	public $dbport;
	public $lid = 0;
	private $qid = 0;
	public $record = array();
	public $_num_rows = 0;
	public $_insert_id = array();
	public $_close_flag =0;

	public $_log_flag;

	// function next_record($action) $action: 1 (MYSQLI_ASSOC) 2 (MYSQL_NUM) 3 (MYSQL_BOTH)

	public function __construct($host='',$user='',$pwd='',$dbname='',$port='') {
		if(!empty($host)) {
			// $d=explode(":",$host);
			// $this->dbhost = $d[0];
			// $this->dbport=$d[1];
			// if($this->dbport=="")$this->dbport=3306;
			$this->dbhost = $host;
			$this->dbuser = $user;
			$this->dbpwd = $pwd;
			$this->dbname = $dbname;
			$this->dbport = $port;
			
		}
		error_reporting(E_ALL^E_NOTICE);
		// include("parserval.php");
	}

	public function connects() {
		if(!$this->lid){
			parent::__construct($this->dbhost,$this->dbuser,$this->dbpwd,$this->dbname,$this->dbport);
			if(mysqli_connect_errno()) {
				$this->show_error(sprintf('Connect failed: %s',mysqli_connect_error()));
				return false;
				
			}

			//parent::query("SET character_set_results='utf8'");
			//parent::query("SET character_set_connection='utf8'");
			//parent::query("SET character_set_client='utf8'");
			$this->lid = 1;
		}
		return $this->lid;
	}

	public function query($qstr,$action=0,$close_flag=0) {
        if(defined("SQL_SHOW")){
            if(constant("SQL_SHOW")=="Y"){
                echo $qstr."\n";
            }
        }
		if(empty($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			@mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}

		$this->qid = parent::query($qstr);
		if(!$this->qid) {
			$this->show_error("SQL Error: ".$qstr);
			return false;
		}
		$this->_num_rows = $this->qid->num_rows;
		if($action) $this->next_record($action);

		if($this->_close_flag || $close_flag) $this->close();
		return $this->qid;
	}

	public function query_no_sqlerror($qstr,$action=0,$close_flag=0) {
		if(empty($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			@mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}
		$this->qid = parent::query($qstr);

		if(!$this->qid) {
			if(DEBUG_SHOW==1) {
				echo "SQL ERROR:".$qstr;
			}
			return false;
		}
		$this->_num_rows = $this->qid->num_rows;
		if($action) $this->next_record($action);
		if($this->_close_flag || $close_flag) $this->close();
		return $this->qid;
	}

	public function super_muti_query($qstr,$close_flag=0,$show_error='Y') {
		if(empty($qstr)) return false;
		if(!is_array($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			@mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}
		$idx_name = array_keys($qstr);
		$muti_str = implode(';',$qstr);
		if(parent::multi_query($muti_str)) {
			$index = 0;
			do {
				if($this->insert_id) $this->_insert_id[$idx_name[$index]] = $this->insert_id;
				$index++;
			}while (parent::next_result());

			if($this->errno) {
				if($show_error=='Y')$this->show_error('Multi SQL error: '.$qstr[$index]);
				if(DEBUG_SHOW==1) {
					echo "SQL ERROR:".$qstr[$index];
				}
				return false;
			}
		}else{
			if($show_error=='Y')$this->show_error("First SQL Error: ".$qstr[0]);
			if(DEBUG_SHOW==1) {
				echo "SQL ERROR:".$qstr[0];
			}
			return false;
		}
		if($this->_close_flag || $close_flag) $this->close();
		return true;
	}

	public function muti_query($qstr,$close_flag=0) {
		if(empty($qstr)) return false;
		if(!is_array($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			@mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}

		for($i=0;$i<count((array)$qstr);$i++) {
			$this->qid = parent::query($qstr[$i]);
			if(!$this->qid) {
				$this->show_error('Invalid SQL: '.$qstr[$i]);
				return false;
			}
		}
		if($this->_close_flag || $close_flag) $this->close();
		return true;
	}

	public function muti_select($qstr,$action=0,$close_flag=0) {
		if(empty($qstr)) return false;
		if(!is_array($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}
		$muti_str = implode(';',$qstr);

		if(parent::multi_query($muti_str)) {
			if($this->_close_flag || $close_flag) $this->close();
			return true;
		}else{
			$this->show_error("First SQL Error: ".$qstr[0]);
			return false;
		}
	}

	/**
	 * 有交易的Query
	 *
	 * @param array $qstr
	 * @param unknown_type $close_flag
	 * @return unknown
	 */
	public function TransationQuery($qstr,$close_flag=0){
		if(empty($qstr)) return false;
		if(!is_array($qstr)) return false;
		if(!$this->connects()) return false;
		if($this->qid) {
			@mysqli_free_result($this->qid);
			unset($this->record);
			$this->qid = 0;
		}

		$this->qid = parent::query("BEGIN WORK;");
        foreach ((array)$qstr as $key => $val){
            $this->qid = parent::query($val);
            if(!$this->qid) {
                $this->show_error('Invalid SQL: '.$val);
                return false;
            }
        }
		$this->qid = parent::query("COMMIT");
		if($this->_close_flag || $close_flag) $this->close();
		return true;
	}

	public function next_record($action=0) {
		if(!$this->qid) return false;
		if($this->record) unset($this->record);
		switch ($action) {
			case 1:
				$type = MYSQLI_ASSOC;
				break;
			case 2:
				$type = MYSQLI_NUM;
				break;
			case 3:
				$type = MYSQLI_BOTH;
				break;
			default:
				$type = MYSQLI_ASSOC;
				break;
		}		
		$this->record = &$this->qid->fetch_array($type);
		
		if(is_array($this->record)) {
			return true;
		}else{
			mysqli_free_result($this->qid);
			$this->qid = 0;
			return false;
		}
	}

	public function f($field_name) {
		return stripslashes($this->record[$field_name]);
	}

	public function show_error($str) {
		if(!$this->_log_flag && !mysqli_connect_errno()) {
			error_reporting(0);
			if(DEBUG_SHOW==1) {
				echo "<pre>".$str."<BR>";
				echo '('.$this->errno.')'.$this->error.'<BR>';
				//exit;
			}else{
				//exit('SQL Error ('.$id.')');
			}
			$id = $this->write_sql_error($this->errno,$this->error,$str);
		}else{
			error_reporting(0);
			if(DEBUG_SHOW==1) {
				echo "<pre>".$str."<BR>";
				echo '('.@$this->errno.')'.@$this->error.'<BR>';
				//exit;
			}else{
				//echo "<!--<pre>".$str."<BR>";
				//echo '('.@$this->errno.')'.@$this->error.' '.$this->dbhost.'<BR>-->';
				//exit("SQL Error");
			}
		}
	}

	public function get_total_data($field='',$action=0) {
		$count = 0;
		$all_data = array();
		while ($this->next_record($action)) {
			if(empty($field)) $all_data[$count] = &$this->record;
			else {
				$qfield = explode(',',$field);
				$index = '';
				for($i=0;$i<count((array)$qfield);$i++) {
					$index.="['".$this->record[$qfield[$i]]."']";
				}
				eval("\$all_data$index=&\$this->record;");
			}
			$count++;
		}
		return $all_data;
	}

	public function get_muti_data($field_array='',$action=0) {
		$index = 0;
		$muti_data = array();
		do {
			if(is_array($field_array)) $field = $field_array[$index];
			else $field = $field_array;
			if($this->qid = parent::store_result()) {
				$muti_data[$index] = &$this->get_total_data($field,$action);
			}
			$index++;
		}while (parent::next_result());

		if($this->errno) {
			$this->show_error('Multi Select SQL error: index='.$index);
			return false;
		}

		return $muti_data;
	}
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $errno
	 * @param unknown_type $error
	 * @param unknown_type $sql
	 * @return unknown
	 */

	function write_sql_error($errno,$error,$sql) {
		$today_post=time();
		global $db_host_arr,$db_user_arr,$db_passwd_arr,$db_name_arr;
		$db['LOG']=new StockDB($db_host_arr[WEB_CODE]['RM'],$db_user_arr[WEB_CODE]['RM'],$db_passwd_arr[WEB_CODE]['RM'],$db_name_arr[WEB_CODE]['RM']);
		if($_SERVER['REQUEST_URI']==""){
			$REQUEST_URI=$_SERVER['PHP_SELF'];
		}else{
			$REQUEST_URI=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
		}
		if($db['LOG']->connects()) {
			$db['LOG']->_log_flag = 1;
			$qstr = $this->sql_insert('SQL_ERROR',
				array('M_ERRNO'      =>    $errno,
					'M_ERROR'=>    addslashes($error),
					'SQLTEXT'=>    addslashes($sql),
					'ADDDATE'=>    date('Y-m-d H:i:s',time()),
					'SOURCE' =>    $REQUEST_URI
					// ,
					// 'IP'     =>     join(',',getIP())
				));
			if(!mysqli_connect_errno()) $db['LOG']->query($qstr);
			
			// if(ISBGFILE!=1)exit('SQL ERROR!');
		}else{
			// if(ISBGFILE!=1)exit('Write Error2');
		}
	}
	function sql_insert($_table,$_arr) {
		$str = "INSERT INTO $_table (%s) VALUES (%s)";
		$str_field = array();
		$str_value = array();
		
		if(count((array)$_arr)==0 || !is_array($_arr)) return false;
		foreach ($_arr as $key=>$_value) {
			$str_field[] =  $key;
			if(substr($_value,0,1)=="@") {
				$str_value[] = substr($_value,1);
			}else{
				$str_value[] = "'".$_value."'";
			}
		}

		return sprintf($str,join(',',$str_field),join(',',$str_value));
	}

	public function close() {
		if($this->qid) {
			@mysqli_free_result($this->qid);
			$this->qid = 0;
		}
		if($this->lid) {
			@parent::close();
			$this->lid = 0;
		}
	}

}

