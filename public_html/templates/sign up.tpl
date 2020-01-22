{config_load file="test.conf" section="setup"}
{include file="header.tpl"}
{include file="../template.php"}

<div id="ig">
<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Instagram</a>
			
			<div class="buttons">
				{* <a href="login.php" class="btn btn-link">login</a> *}
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



{include file="footer.tpl"}