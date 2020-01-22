<?php
session_start();
require('../mysqlilib.php');

header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
include('../HttpStatusCode.php');


$db['AS'] = new StockDB("$db[host]", "$db[username]", "$db[password]", "$db[dbname]", "$db[port]");
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
