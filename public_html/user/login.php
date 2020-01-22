<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');
include('../HttpStatusCode.php');
require('../mysqlilib.php');

$account = filter_var($_POST['account'], FILTER_SANITIZE_STRING);;
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


$db['AS'] = new StockDB('localhost', 'alan9130314', 'zxc9130314', 'ig_demo', '3306');

$sql = "SELECT members.member_id,members.account,members.password
        FROM members 
        WHERE BINARY account='$account' AND `password`='$password'";

if ($db['AS']->query($sql)) {
    while ($db['AS']->next_record()) {
        $member = $db['AS']->record;
    }
    if (!empty($member)) {
        if ($member['account'] == $account && $member['password'] == $password) {
            session_start();
            $_SESSION['member'] = $member;
            // header("location:./");
            // new HttpStatusCode(200,'登入成功');            
            echo json_encode($member);
        }
    } else {
        new HttpStatusCode(400, '登入失敗 帳號或密碼錯誤');
        // echo json_encode($member);
    };
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

// $sql = 'SELECT members.member_id,members.account,members.password
//         FROM members 
//         WHERE BINARY account=:account AND `password`=:password';
// $statement = $pdo->prepare($sql);
// $statement->bindValue(':account', $_POST['account'], PDO::PARAM_STR_CHAR);
// $statement->bindValue(':password', $_POST['password'], PDO::PARAM_STR_CHAR);
// if ($statement->execute()) {

//     $account = $_POST['account'];
//     $password = $_POST['password'];
//     $member = $statement->fetch(PDO::FETCH_ASSOC);

//     if (!empty($member)) {
//         if ($member['account'] == $account && $member['password'] == $password) {
//             session_start();
//             $_SESSION['member'] = $member;
//             // header("location:./");
//             // new HttpStatusCode(200,'登入成功');            
//             echo json_encode($member);
//         }
//     } else {
//         new HttpStatusCode(400, '登入失敗 帳號或密碼錯誤');
//         // echo json_encode($member);
//     };
// }



// elseif ($member['password']!=$pwd||$member['account']!=$ac) {
//     // header("location:./?error=帳密錯誤");
//     // new HttpStatusCode(400,'Account incorrect');
// }elseif ($member['password']!=''||$member['account']!='') {
//     // header("location:./?error=輸入不完全");
//     // new HttpStatusCode(200,'Account or Password cann\'t be blank');
// }
