<?php
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');



$comment_id = $_POST['comment_id'];

$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$sql = "DELETE FROM comments WHERE comment_id='$comment_id'";

if ($db['AS']->query($sql)) {
    echo json_encode(['id' => $_POST['comment_id']]);
} else {
    new HttpStatusCode(400, 'Wrong Comment.');
}


// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }

// $sql = 'DELETE FROM comments WHERE comment_id=:id';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':id',$_POST['comment_id'],PDO::PARAM_INT);
// if($statement->execute()){
//     echo json_encode(['id'=> $_POST['comment_id']]);
// }
// else{
//     new HttpStatusCode(400,'Wrong comment.');
// }
