<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-21 04:45:25
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2673d508efb5_27952462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f702ff2bf04ec2df3262ff6b40321deb5e7f6ad' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\index.tpl',
      1 => 1579578322,
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
function content_5e2673d508efb5_27952462 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../template.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="ig">
    <nav class="navbar navbar-light shadow-sm ">
        <div class="container">
            <a href="index.php" class="navbar-brand">Instagram</a>

            <div class="input-group-sm">
                <input type="text" class="form-control search" placeholder="搜尋">
            </div>
            <div class="buttons">
                <?php if (isset($_SESSION) == TRUE) {?>
                <a class="btn btn-link account" data-account="<?php echo $_smarty_tpl->tpl_vars['account']->value;?>
"><span class="ac"><?php echo $_smarty_tpl->tpl_vars['account']->value;?>
</span>您已登入</a>
                <button class="btn btn-light logout"><i class="fas fa-sign-out-alt"></i></button>
                <input type="hidden" class="member_id" value="<?php echo $_smarty_tpl->tpl_vars['member_id']->value;?>
" name="member_id">
                <button class="btn  btn-light  myPosts"><i class="fas fa-user"></i></button>
                <button class="btn btn-light  write_post"><i class="fas fa-feather-alt"></i></button>
                <?php } else { ?>
                <a href="sign up.php" class="btn btn-link">註冊</a>
                <a href="login.php" class="btn btn-link">登入</a>
                <?php }?>

            </div>

        </div>
    </nav>

    <?php if (isset($_SESSION) == TRUE) {?>
    <div id="board">
        <div class="container posts">
            <div class="alert alert-light searchResult" role="alert">

            </div>
            <nav aria-label="Page navigation" id="Page">
                <ul class="pagination pagination-lg justify-content-center">
                    <?php echo $_smarty_tpl->tpl_vars['pagesPage']->value;?>

                </ul>
            </nav>
        </div>
    </div>
    <?php }?>

</div>


<div id="post-panel" class="update">
    <div class="post-panel-header">
        <div class="close">x</div>
    </div>
    <div class="post-panel-body ">
        <form enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['member_id']->value;?>
" name="member_id">
            <div class="account mb-1" name="<?php echo $_smarty_tpl->tpl_vars['account']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['account']->value;?>
</div>
            <h6 class="mb-3">Upload Img</h6>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="hidden" name="img" id="file" value="">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" name="my_file" value="" accept=".jpg">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <label class="text-capitalize">content</label><br>
            <textarea name="content" rows="5"></textarea>
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




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
