<?php
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');


$post_id = $_POST['post_id'];

$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$sql = "DELETE FROM comments WHERE comments.post_id = '$post_id'";
$sql2 = "DELETE FROM posts WHERE posts.post_id = '$post_id'";

if ($db['AS']->query($sql) && $db['AS']->query($sql2)) {
    echo json_encode(['id' => $_POST['post_id']]);
} else {
    new HttpStatusCode(400, 'Wrong Post or Sql Error.');
}

// if($db['AS']->query($sql)){
//     echo json_encode(['id'=> $_POST['post_id']]);
// }else{
//     new HttpStatusCode(400,'Wrong Post.');
// }

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }

// $sql = 'DELETE FROM `comments` WHERE `comments`.`post_id` = :post_id;
//         DELETE FROM posts WHERE posts.post_id=:post_id';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':post_id',$_POST['post_id'],PDO::PARAM_INT);
// if($statement->execute()){
//     echo json_encode(['id'=> $_POST['post_id']]);
// }
// else{
//     new HttpStatusCode(400,'Wrong posts.');
// }
