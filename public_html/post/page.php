<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
require('../mysqlilib.php');
require('../class_page.php');


$db['WS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');


$sql_column="posts.post_id , posts.content,posts.img,members.account";
$sql_from="FROM posts,members";
$sql_where="WHERE posts.member_id = members.member_id";
$sql_order="ORDER BY posts.post_id DESC";

$page_obj=new Page($db['WS'],$_REQUEST['page'],"3",$sql_column,$sql_from,$sql_where,$sql_order);
if($db['WS']->query($page_obj->_SQL)){

	while ($db['WS']->next_record()){
		$posts[] = $db['WS']->record;
	}
	echo json_encode($posts);	
}




