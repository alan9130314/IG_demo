<?php
session_start();
require('../mysqlilib.php');

header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
include('../HttpStatusCode.php');


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');
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

session_destroy();
echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
