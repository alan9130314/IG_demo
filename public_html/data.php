<?php
header("Content-Type:text/html; charset=utf-8");
include('../db.php');
require('mysqlilib.php');
require('class_page.php');

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

// $qstr = 'SELECT posts.post_id , posts.content,posts.img,members.account
//         FROM posts,members 
//         WHERE posts.member_id = members.member_id
//         ORDER BY posts.post_id DESC';
// $db['AS']->query($qstr);
// while ($db['AS']->next_record()) {
//     $posts[] = $db['AS']->record;
//     // $posts2[$posts['post_id']]=$posts;
// }

$sql = 'SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
FROM comments,posts 
WHERE  comments.post_id = posts.post_id 
ORDER BY comments.time ASC';
$db['AS']->query($sql);
while ($db['AS']->next_record()) {
    $comments[] = $db['AS']->record;
}



$db['WS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$_REQUEST['page'] = 1;
$sql_column="posts.post_id , posts.content,posts.img,members.account";
$sql_from="FROM posts,members";
$sql_where="WHERE posts.member_id = members.member_id";
$sql_order="ORDER BY posts.post_id DESC";

$page_obj=new Page($db['WS'],$_REQUEST['page'],"3",$sql_column,$sql_from,$sql_where,$sql_order);
$db['WS']->query($page_obj->_SQL);
while ($db['WS']->next_record()){
	$posts[]=$db['WS']->record;
}
// $pages = $page_obj->PrintSelectOption();
$pagesPage = $page_obj->PrintSelectOptionPage();




// $sql = 'SELECT posts.post_id , posts.content,posts.img,members.account
//         FROM posts,members 
//         WHERE posts.member_id = members.member_id
//         ORDER BY posts.post_id DESC';
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $posts =  $statement->fetchAll(PDO::FETCH_ASSOC);



// $sql = 'SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
// FROM comments,posts 
// WHERE  comments.post_id = posts.post_id 
// ORDER BY comments.time ASC';
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $comments =  $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<script>
    var posts = <?= json_encode($posts, JSON_NUMERIC_CHECK) ?>;
    var comments = <?= json_encode($comments, JSON_NUMERIC_CHECK) ?>;
</script>