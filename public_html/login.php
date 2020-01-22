<?php
include('../db.php');
include('data.php');
/**
 * Example Application
 *
 * @package Example-application
 */
require 'libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;

$smarty->display('login.tpl');
