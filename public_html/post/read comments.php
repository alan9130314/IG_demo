<?php
header('Content-Type: application/json; charset=utf-8');

include('../../db.php');
require('../mysqlilib.php');


$comment_post_id = filter_var($_POST['comment_post_id'], FILTER_VALIDATE_INT);


$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

$sql = "UPDATE posts SET img='$img', content='$content'
        WHERE post_id='$post_id'";
if ($db['AS']->query($sql)) {
    $sql = "SELECT DISTINCT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
    FROM comments,posts 
    WHERE  comments.post_id = '$comment_post_id'
    ORDER BY comments.time ASC";
    $db['AS']->query($sql);
    while ($db['AS']->next_record()) {
        $comments[] = $db['AS']->record;
    }
    echo json_encode($comments);

    
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
