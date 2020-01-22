<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
require('../mysqlilib.php');
// $id=$_POST['id'];
$search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$qstr = "SELECT p.*,m.* 
        FROM `posts` p  
        NATURAL JOIN `members` m 
        WHERE m.account 
        LIKE '%$search%'
        ORDER BY p.post_id DESC";
if($db['AS']->query($qstr)){
    
    while ($db['AS']->next_record()) {
        $posts[] = $db['AS']->record;    
    }
    
    echo json_encode($posts);

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
