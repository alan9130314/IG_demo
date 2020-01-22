<?php
header('Content-Type: application/json; charset=utf-8');
include('../HttpStatusCode.php');
include('../../db.php');
require('../mysqlilib.php');

$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");

// try{
//     $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
// $db['username'],$db['password']);    
// } catch(PDOException $e){
//     echo "Database connection failed.";
//     exit;
// }


if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"];
} else {
    echo "檔案名稱: " . $_FILES["file"]["name"] . "  ";
    echo "檔案類型: " . $_FILES["file"]["type"] . "  ";
    echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb  ";
    echo "暫存名稱: " . $_FILES["file"]["tmp_name"];

    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
}
