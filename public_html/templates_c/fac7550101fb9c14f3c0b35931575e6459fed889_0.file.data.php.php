<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-10 02:33:51
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\data.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e17d47f77b8f3_80412864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fac7550101fb9c14f3c0b35931575e6459fed889' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\data.php',
      1 => 1578620024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e17d47f77b8f3_80412864 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 
';?>
header("Content-Type:text/html; charset=utf-8");
include('../db.php');

try{
    $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
$db['username'],$db['password']);    
} catch(PDOException $e){
    echo "Database connection failed.";
    exit;
}

$sql = 'SELECT posts.post_id , posts.content,posts.img,members.account
        FROM posts,members 
        WHERE posts.member_id = members.member_id
        ORDER BY posts.post_id DESC';
$statement = $pdo->prepare($sql);
$statement->execute();
$posts =  $statement->fetchAll(PDO::FETCH_ASSOC);



$sql = 'SELECT comments.comment_id,comments.name,comments.content,comments.time,comments.post_id
FROM comments,posts 
WHERE  comments.post_id = posts.post_id 
ORDER BY comments.time ASC';
$statement = $pdo->prepare($sql);
$statement->execute();
$comments =  $statement->fetchAll(PDO::FETCH_ASSOC);
<?php echo '?>';?>


<?php echo '<script'; ?>
>
    var posts = <?php echo '<?=';?>
 json_encode($posts,JSON_NUMERIC_CHECK) <?php echo '?>';?>
;
    var comments = <?php echo '<?=';?>
 json_encode($comments,JSON_NUMERIC_CHECK) <?php echo '?>';?>
;
<?php echo '</script'; ?>
>

<?php }
}
