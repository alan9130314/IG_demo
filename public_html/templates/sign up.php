<?php include('header.php') ?>
<?php include('template.php') ?>


<div id="ig">
<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Navbar</a>
			
			<div class="buttons">
				<a href="login.php" class="btn btn-link">login</a>
			</div>

		</div>
	</nav>
	<div id="signUp">
	<div class="container">
		<form >			
				<h3 class="mb-3 text-center">註冊新帳號</h3>
				<input type="text" class="form-control account" name="account"  aria-describedby="helpId"
					placeholder="Account">
				<input type="password" class="form-control password" name="password"  aria-describedby="helpId"
					placeholder="Password">
				<div class="buttons">
					<button class="btn  btn-primary signUp mb-3">sign up</button>

					<div class="error-msg">
						<div class="alert alert-secondary"></div>
					</div>
					<hr>
					<a href="login.php" class="btn btn-light login">login account</a>
					
				</div>
		</form>
	</div>


</div>
</div>




<?php include('footer.php') ?>