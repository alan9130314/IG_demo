<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');

$_POST[] = filter_input_array(INPUT_POST, [
    "img" => FILTER_SANITIZE_STRING,
    "content" => FILTER_SANITIZE_STRING,
    "account" => FILTER_VALIDATE_INT
]);

$img = $_POST['img'];
// $img = filter_var($_POST['img'], FILTER_SANITIZE_STRING);
$content = $_POST['content'];
// $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$member_id = $_POST['member_id'];
// $member_id = filter_var($_POST['member_id'], FILTER_VALIDATE_INT);

$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

$sql = "INSERT INTO posts(img,content,member_id)
        VALUES('$img','$content','$member_id')";

if ($db['AS']->query($sql)) {

    $id = $db['AS']->insert_id;
    $sql = "SELECT posts.post_id,posts.img,posts.content,members.account
            FROM posts,members
            WHERE posts.post_id='$id'
            AND members.member_id=posts.member_id";
    $db['AS']->query($sql);
    while ($db['AS']->next_record()) {
        $post = $db['AS']->record;
    }
    echo json_encode($post);
} else {
    new HttpStatusCode(400, 'Error.');
}


// while ($db['AS']->next_record()){
//     $posts[]=$db['AS']->record;
//     // $posts2[$posts['post_id']]=$posts;
// }

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }
// $sql = 'INSERT INTO posts(img,content,member_id)
//         VALUES(:img,:content,:member_id)';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':img',$_POST['img'],PDO::PARAM_STR_CHAR);
// $statement->bindValue(':content',$_POST['content'],PDO::PARAM_STR_CHAR);
// $statement->bindValue(':member_id',$_POST['member_id'],PDO::PARAM_INT);


// if($statement->execute()){
//     $id = $pdo->lastInsertId();
//     $sql = 'SELECT posts.post_id,posts.img,posts.content,members.account
//             FROM posts,members
//             WHERE posts.post_id=:id 
//             AND members.member_id=posts.member_id'; 
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':id',$id,PDO::PARAM_INT);
//     $statement->execute();    

//     $post = $statement->fetch(PDO::FETCH_ASSOC);    
    
//     echo json_encode($post);     

// }
