<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
require('../mysqlilib.php');
// $id=$_POST['id'];
$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

$qstr = "SELECT * FROM posts WHERE post_id=$id";
$db['AS']->query($qstr);
while ($db['AS']->next_record()) {
    $post = $db['AS']->record;

    echo json_encode($post);
}

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }

// $sql = 'SELECT * FROM posts WHERE post_id=:id';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
// $statement->execute();

// $post = $statement->fetch(PDO::FETCH_ASSOC);

// echo json_encode($post);
