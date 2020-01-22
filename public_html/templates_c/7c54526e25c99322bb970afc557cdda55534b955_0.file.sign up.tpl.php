<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-21 02:38:10
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\sign up.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2656023c4fc6_52676728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c54526e25c99322bb970afc557cdda55534b955' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\sign up.tpl',
      1 => 1579570688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:../template.php' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e2656023c4fc6_52676728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../template.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="ig">
<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Instagram</a>
			
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
					<button class="btn  btn-primary signUp ">註冊</button>

					<div class="error-msg mt-3">
						<div class="alert"></div>
					</div>
					<hr>
					<a href="login.php" class="btn btn-light login">已有帳號?點擊登入</a>
					
				</div>
		</form>
	</div>


</div>
</div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
