<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
include('../db.php');
include('data.php');
if (isset($_SESSION['member']) == false) {
    header('Location: login.php');
};
$member = $_SESSION['member'];

$member_id = $_SESSION['member']['member_id'];
$account = $_SESSION['member']['account'];

require 'libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;

$smarty->assign("member_id", $member_id);
$smarty->assign("account", $account);
$smarty->assign("pages",$pages);
$smarty->assign("pagesPage",$pagesPage);

$smarty->display('index.tpl');
