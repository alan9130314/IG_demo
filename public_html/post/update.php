<?php
header('Content-Type: application/json; charset=utf-8');

include('../../db.php');
require('../mysqlilib.php');


$post_id = $_POST['post_id'];
$img = $_POST['img'];
$content = $_POST['content'];


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$sql = "UPDATE posts SET img='$img', content='$content'
        WHERE post_id='$post_id'";
if ($db['AS']->query($sql)) {
    $sql = "SELECT  posts.post_id,posts.img,posts.content,members.account 
            FROM posts,members
            WHERE posts.post_id='$post_id'
            AND members.member_id=posts.member_id";
    $db['AS']->query($sql);
    while ($db['AS']->next_record()) {
        $post = $db['AS']->record;
    }
    echo json_encode($post);

    
}

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }

// $sql = 'UPDATE posts SET img=:img, content=:content
//         WHERE post_id=:post_id';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':post_id',$_POST['post_id'],PDO::PARAM_INT);
// $statement->bindValue(':img',$_POST['img'],PDO::PARAM_STR_CHAR);
// $statement->bindValue(':content',$_POST['content'],PDO::PARAM_STR);

// if($statement->execute()){
//     $sql = 'SELECT posts.post_id,posts.img,posts.content,members.account 
//             FROM posts,members
//             WHERE posts.post_id=:post_id
//             AND members.member_id=posts.member_id';
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':post_id',$_POST['post_id'],PDO::PARAM_INT);
//     $statement->execute();
//     $post = $statement->fetch(PDO::FETCH_ASSOC);
    
//     echo json_encode($post);


// }
