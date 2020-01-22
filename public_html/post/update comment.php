<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');

$comment_id = $_POST['comment_id'];
$content = $_POST['content'];


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$sql = "UPDATE comments SET content='$content'
        WHERE comment_id='$comment_id'";

if ($db['AS']->query($sql)) {
    $sql = "SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
            FROM comments,posts
            WHERE comments.comment_id='$comment_id'
            AND comments.post_id=posts.post_id";
    $db['AS']->query($sql);
    while ($db['AS']->next_record()) {
        $comment = $db['AS']->record;
    }

    echo json_encode($comment);
   
}

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }

// $sql = 'INSERT INTO comments(post_id,`name`,content,`time`)
//         VALUES(:post_id,:name,:content,:time)';
        
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':post_id',$_POST['post_id'],PDO::PARAM_INT);
// $statement->bindValue(':name',$_POST['name'],PDO::PARAM_STR_CHAR);
// $statement->bindValue(':content',$_POST['content'],PDO::PARAM_STR_CHAR);
// $statement->bindValue(':time',$_POST['time'],PDO::PARAM_STR);

// if($statement->execute()){
//     $id = $pdo->lastInsertId();
//     $sql = 'SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
//             FROM comments,posts
//             WHERE comments.comment_id=:id
//             AND comments.post_id=posts.post_id'; 
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':id',$id,PDO::PARAM_INT);
//     $statement->execute();

//     $comment = $statement->fetch(PDO::FETCH_ASSOC);    
    
//     echo json_encode($comment);
      

// }
