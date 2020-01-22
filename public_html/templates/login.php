<?php include('header.php') ?>
<?php include('template.php') ?>

<div id="ig">
	<nav class="navbar navbar-light shadow-sm">
		<div class="container">
			<a href="index.php" class="navbar-brand">Navbar</a>

			<div class="buttons">

				<a href="sign up.php" class="btn btn-link">sign up</a>
			</div>

		</div>
	</nav>
	<div id="login">
		<div class="container">
			<form>
				<h3 class="mb-3 text-center">請先登入或註冊帳號</h3>
				<input type="text" class="form-control account" name="account" aria-describedby="helpId"
					placeholder="Account">
				<input type="password" class="form-control password" name="password" aria-describedby="helpId"
					placeholder="Password">
				<div class="buttons">
					<button class="btn btn-primary login mb-3">login</button>
					<div class="error-msg">
						<div class="alert alert-secondary"></div>
					</div>
					<hr>
					<a href="sign up.php" class="btn btn-light signUp">sign up new account</a>
				</div>

			</form>
		</div>


	</div>

</div>




<?php include('footer.php') ?>