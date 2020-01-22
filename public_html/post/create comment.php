<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');

$post_id = $_POST['post_id'];
$name = $_POST['name'];
$content = $_POST['content'];
$time = $_POST['time'];

$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

$sql = "INSERT INTO comments(post_id,`name`,content,`time`)
        VALUES('$post_id','$name','$content','$time')";

if ($db['AS']->query($sql)) {

    $id = $db['AS']->insert_id;
    $sql = "SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
            FROM comments,posts
            WHERE comments.comment_id='$id'
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
