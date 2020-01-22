<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
include('../HttpStatusCode.php');
require('../mysqlilib.php');
// validation
// title
if (empty($_POST['account'])) {
    new HttpStatusCode(400, 'account cannot be blank.');
    exit();
}
if (empty($_POST['password'])) {
    new HttpStatusCode(400, 'password cannot be blank.');
    exit();
}


$account = filter_var($_POST['account'], FILTER_SANITIZE_STRING);

$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

$sql = "INSERT INTO members(account,`password`)
        VALUES ('$account','$password')";

if ($db['AS']->query($sql)) {
    $id = $db['AS']->insert_id;
    echo json_encode($id);
    // new HttpStatusCode(200, '帳號註冊成功');
} else {
    new HttpStatusCode(400, '此帳號已被註冊');
}


// try {
//     $pdo = new PDO(
//         "mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
//         $db['username'],
//         $db['password']
//     );
// } catch (PDOException $e) {
//     echo "Database connection failed.";
//     exit;
// }



// $sql = 'INSERT INTO members(account,`password`)
//         VALUES (:account,:password)';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':account', $_POST['account'], PDO::PARAM_STR_CHAR);
// $statement->bindValue(':password', $_POST['password'], PDO::PARAM_STR_CHAR);
// if ($statement->execute()) {
//     new HttpStatusCode(200, '帳號註冊成功');
// } else {
//     new HttpStatusCode(400, '此帳號已被註冊');
// }
