<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-10 11:13:21
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\sign up.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e184e41bf7576_17876824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c54526e25c99322bb970afc557cdda55534b955' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\sign up.tpl',
      1 => 1578466036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e184e41bf7576_17876824 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '708850415e184e41a18c93_45205617';
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



<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
