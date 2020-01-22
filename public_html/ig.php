<?php session_start(); ?>
<?php include('header.php') ?>
<?php include('data.php') ?>
<?php include('template.php') ?>
<?php 
if(isset($_SESSION['member'])==FALSE) {
	header('Location: login.php');
}
$id = $_SESSION['member']['member_id'];
$ac = $_SESSION['member']['account'];
?>
<div id="ig">
	<nav class="navbar navbar-light shadow-sm fixed-top">
		<div class="container">
			<a href="index.php" class="navbar-brand">Navbar</a>

			<div class="buttons">
				<?php
				if(isset($_SESSION['member'])==TRUE) {		
					$ac = $_SESSION['member']['account'];
					echo "<button class=\"btn btn-link logout\">登出</button>";
					echo "<a class=\"btn btn-link account\">$ac 您已登入</a>";					
					
				}else{
					echo "<a href=\"sign up.php\" class=\"btn btn-link\">註冊</a>";
					echo "<a href=\"login.php\" class=\"btn btn-link\">登入</a>";
				}
				?>
				<button class="btn btn-secondary write_post">發表貼文</button>
			</div>

		</div>
	</nav>

	<?php 
	if(isset($_SESSION['member'])==TRUE){
		echo 
		"<div id=\"board\">
			<div class=\"container posts\">			
			</div>
		</div>";
	}else{
		echo "<h3>請先登入</h3>";
	}
	?>

</div>


<div id="post-panel" class="update">
	<div class="post-panel-header">
		<div class="close">x</div>
	</div>
	<div class="post-panel-body ">
		<form enctype="multipart/form-data">
				<input type="hidden"  value="<?= $id ?>" name="member_id">
				<div class="account mb-1"><?= $ac ?></div>
				<h6 class="mb-3">Upload Img</h6>
				<div class="input-group mb-3">
					<div class="custom-file">
						<input type="hidden" name="img" id="file">
						<input type="file" class="custom-file-input" id="inputGroupFile01"
							aria-describedby="inputGroupFileAddon01" name="my_file">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
				<label class="text-capitalize">content</label><br>
				<textarea name="content" rows="2"></textarea>
		</form>
	</div>
	<div class="post-panel-footer">
		<div class="panel-buttons">
			<button class="create btn btn-primary">post</button>
			<button class="update btn btn-primary">update</button>
			<button class="cancel btn btn-light">cancel</button>
			<button class="delete btn btn-danger">delete</button>
		</div>
	</div>
</div>



<?php include('footer.php') ?>