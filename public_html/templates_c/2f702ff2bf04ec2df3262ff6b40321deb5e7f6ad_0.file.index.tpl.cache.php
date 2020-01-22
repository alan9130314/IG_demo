<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-08 07:48:02
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e157b22a2b933_37118088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f702ff2bf04ec2df3262ff6b40321deb5e7f6ad' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\templates\\index.tpl',
      1 => 1578466077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e157b22a2b933_37118088 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '14185286185e157b229f3738_75523261';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="ig">
    <nav class="navbar navbar-light shadow-sm ">
        <div class="container">
            <a href="index.php" class="navbar-brand">Navbar</a>

            <div class="buttons">
                <?php if (isset($_SESSION) == TRUE) {?>
                 <button class="btn btn-link logout">登出</button>
                <a class="btn btn-link account"><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
 您已登入</a>
                <button class="btn btn-secondary write_post">發表貼文</button>
                <?php } else { ?>             
                 <a href="sign up.php" class="btn btn-link">註冊</a>
                <a href="login.php" class="btn btn-link">登入</a>                      
                <?php }?>
                
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
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="member_id">
            <div class="account mb-1"><?php echo $_smarty_tpl->tpl_vars['ac']->value;?>
</div>
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




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
