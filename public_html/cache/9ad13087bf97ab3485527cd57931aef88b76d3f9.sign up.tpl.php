<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-13 08:51:21
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\sign up.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e1c217910d846_59102956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c54526e25c99322bb970afc557cdda55534b955' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\sign up.tpl',
      1 => 1578466036,
      2 => 'file',
    ),
    'e7ec49ec2995403cf84fc8c96b672d5cd111c176' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\header.tpl',
      1 => 1578553576,
      2 => 'file',
    ),
    '28ab568d56520591890fcb6f26bf4fd606009c45' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\footer.tpl',
      1 => 1576198607,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5e1c217910d846_59102956 (Smarty_Internal_Template $_smarty_tpl) {
?>
<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>BlOG demo</title>
	

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">


	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/handlebars-v4.4.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/e7f5427ae7.js" crossorigin="anonymous"></script>
	<script src="js/upload.js"></script>
	<script src="js/action.js"></script>
	<script src="js/login.js"></script>
	<script src="js/sign up.js"></script>
</HEAD>
<BODY bgcolor="#ffffff">

<div id="ig">
<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Navbar</a>
			
			<div class="buttons">
							</div>

		</div>
	</nav>
	<div id="signUp">
	<div class="container">
		<form >			
				<h4 class="mb-3 text-center">註冊新帳號</h4>
				<input type="text" class="form-control account" name="account"  aria-describedby="helpId"
					placeholder="Account">
				<input type="password" class="form-control password" name="password"  aria-describedby="helpId"
					placeholder="Password">
				<div class="buttons">
					<button class="btn  btn-primary signUp mb-3">註冊新帳號</button>

					<div class="error-msg">
						<div class="alert alert-secondary"></div>
					</div>
					<hr>
					<a href="login.php" class="btn btn-light login">已有帳號?點我登入</a>
					
				</div>
		</form>
	</div>


</div>
</div>



</BODY>
</HTML>
<?php }
}
