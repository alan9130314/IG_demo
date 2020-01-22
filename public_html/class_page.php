<?php
/**
 * 分頁
 */
class Page{
	public $_SQL;
    public $_SQL2;
    public $_SQL3;//子查詢用
//	public $_SQLNoLimit;//沒有限制筆數,取得全部資料
	public $_TotalNums;//全部筆數
	private $_PageRows;//一頁的筆數
	private $_NowPage=1;//目前的頁數
	public $_TotalPages;//全部的頁數
	protected  $_db;
	function __construct($_db,$_now_page,$_page_rows,$_sql_column,$_sql_from,$_sql_where,$_sql_order="",$_subquery_column=""){
		$this->_PageRows=$_page_rows;
		$this->_NowPage=$_now_page;
		$this->_db=&$_db;

        //取總筆數-innodb
        $temp_sql = "SELECT ".$_sql_column." ".$_sql_from." ".$_sql_where;
        $this->_SQL2="SELECT COUNT(*) AS C FROM (".$temp_sql.") AS Temp";

        //myisam
		$_sql_column="SQL_CALC_FOUND_ROWS ".$_sql_column;

		//分頁處理
		if($_page_rows!=0){
			if(intval($_now_page)<=0)$_now_page=1;
			$start_nums=($_now_page-1)*$_page_rows;
			$sql_limit=" LIMIT $start_nums,$_page_rows";
		}
		$this->_SQL="(SELECT ".$_sql_column." "
		.$_sql_from." "
		.$_sql_where." )"
		.$_sql_order." "
		.$sql_limit;

		//用子查詢加速排序,在用取出的ID取資料
        $this->_SQL3="SELECT {$_subquery_column} FROM ({$temp_sql}) AS T {$_sql_order} {$sql_limit}";
	}

	function PrintSelectOption(){
		$qstr="SELECT FOUND_ROWS() AS C";
		$this->_db->query($qstr,1);
		$this->_TotalNums=(int)$this->_db->f('C');
		$this->_TotalPages=ceil($this->_TotalNums/$this->_PageRows);
		$str="";
		for($i=1;$i<=$this->_TotalPages;$i++){
			if($i==$this->_NowPage){
				$str.="<option value=".$i." selected>".$i."</option>\n";
			}else{
				$str.="<option value=".$i.">".$i."</option>\n";
			}
		}
		return $str;
	}

	function PrintSelectOptionPage(){
		$qstr="SELECT FOUND_ROWS() AS C";
		$this->_db->query($qstr,1);
		$this->_TotalNums=(int)$this->_db->f('C');
		$this->_TotalPages=ceil($this->_TotalNums/$this->_PageRows);
		$str="";
		for($i=1;$i<=$this->_TotalPages;$i++){
			if($i==$this->_NowPage){
				$str.="<li class=\"page-item active  \"><a class=\"page-link\">".$i."</a></li>";
			}else{
				$str.="<li class=\"page-item\"><a class=\"page-link\">".$i."</a></li>";
			}
		}
		return $str;
	}

    function PrintSelectOption2(){
        $qstr="SELECT FOUND_ROWS() AS C";
        $this->_db->query($qstr,1);
        $this->_TotalNums=(int)$this->_db->f('C');
        $this->_TotalPages=ceil($this->_TotalNums/$this->_PageRows);
    }

    /**
     *  mysql 8
     *   innodb使用
     */
    function PrintSelectOption3(){
        $this->_db->query($this->_SQL2,1);
        $this->_TotalNums=$this->_db->f('C');
        $this->_TotalPages=ceil((int)$this->_TotalNums/(int)$this->_PageRows);

        $str="";
        for($i=1;$i<=$this->_TotalPages;$i++){
            if($i==$this->_NowPage){
                $str.="<option value=".$i." selected>".$i."</option>\n";
            }else{
                $str.="<option value=".$i.">".$i."</option>\n";
            }
        }
        return $str;
    }
    /**
     *  mysql 8
     *   innodb使用
     */
    function PrintSelectOption4(){
        $this->_db->query($this->_SQL2,1);
        $this->_TotalNums=$this->_db->f('C');
        $this->_TotalPages=ceil((int)$this->_TotalNums/(int)$this->_PageRows);

    }

	function __destruct(){

	}

}



?>