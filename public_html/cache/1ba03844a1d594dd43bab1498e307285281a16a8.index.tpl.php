<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-08 07:56:57
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e157d3994c076_78805421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f702ff2bf04ec2df3262ff6b40321deb5e7f6ad' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\index.tpl',
      1 => 1578466077,
      2 => 'file',
    ),
    'e7ec49ec2995403cf84fc8c96b672d5cd111c176' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\header.tpl',
      1 => 1578454726,
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
function content_5e157d3994c076_78805421 (Smarty_Internal_Template $_smarty_tpl) {
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
    <nav class="navbar navbar-light shadow-sm ">
        <div class="container">
            <a href="index.php" class="navbar-brand">Navbar</a>

            <div class="buttons">
                                 <button class="btn btn-link logout">登出</button>
                <a class="btn btn-link account">test 您已登入</a>
                <button class="btn btn-secondary write_post">發表貼文</button>
                                
            </div>

        </div>
    </nav>

    <div id="board">
        <div class="container posts">
        </div>
    </div>


</div>


<div id="post-panel" class="update">
    <div class="post-panel-header">
        <div class="close">x</div>
    </div>
    <div class="post-panel-body ">
        <form enctype="multipart/form-data">
            <input type="hidden" value="1" name="member_id">
            <div class="account mb-1">test</div>
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




</BODY>
</HTML>
<?php }
}
