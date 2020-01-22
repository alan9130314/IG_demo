<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-08 07:47:16
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e157af4b132e2_07357838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eab09dd04dec432aba310b624641aa567bc5b732' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\login.tpl',
      1 => 1578466033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e157af4b132e2_07357838 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16260646225e157af4ae1160_68144728';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="ig">
	<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Navbar</a>

			<div class="buttons">

							</div>

		</div>
	</nav>
	<div id="login">
		<div class="container">
			<form>
				<h4 class="mb-3 text-center">請先登入或新的註冊帳號</h4>
				<input type="text" class="form-control account" name="account" aria-describedby="helpId"
					placeholder="Account">
				<input type="password" class="form-control password" name="password" aria-describedby="helpId"
					placeholder="Password">
				<div class="buttons">
					<button class="btn btn-primary login mb-3">登入</button>
					<div class="error-msg">
						<div class="alert alert-secondary"></div>
					</div>
					<hr>
					<a href="sign up.php" class="btn btn-light signUp">註冊新帳號</a>
				</div>

			</form>
		</div>


	</div>

</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
