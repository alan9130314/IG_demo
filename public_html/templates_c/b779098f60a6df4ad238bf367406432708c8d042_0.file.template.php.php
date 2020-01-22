<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-21 06:55:58
  from 'C:\xampp2\htdocs\IG_demo4-master\public_html\template.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e26926ee28692_04558001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b779098f60a6df4ad238bf367406432708c8d042' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\IG_demo4-master\\public_html\\template.php',
      1 => 1579586157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e26926ee28692_04558001 (Smarty_Internal_Template $_smarty_tpl) {
?> 
<?php echo '<script'; ?>
 id="post-template" type="text/x-handlebars-template">
    <div class="post shadow-sm" data-post_id="{{post_id}}"  value="{{post_id}}">
				<h4 class="account" data-account={{account}}>
					{{account}}
				</h4>
				<div class="picture">
					<img src="{{img}}"  class="img-fluid" alt="">
				</div>
				<div class="contents">
					<div class="account">{{account}}</div>	
					<div class="content" style="white-space: pre-wrap;">{{content}}</div>
				</div>				
				<hr>
				<div class="leaveComment">
                    <form >
                        <input type="hidden" name="post_id" value="{{post_id}}">
                        <input type="hidden" name="name" value="">
                        <div class="input-group">
                            <input type="text" class="form-control comment-content" placeholder="給 {{account}} 留言吧"
                                name="content">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary comment-post"  type="button"><i class="far fa-comment-dots"></i></button>
                            </div>
                        </div>
                        <input type="hidden" name="time" value="">
                    </form>
				</div>
			</div>
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 id="comment-template" type="text/x-handlebars-template">
    <form>
        <!-- <input type="hidden" name="comment_id" value="{{comment_id}}">        -->
        <div class="comments" data-comment_id="{{comment_id}}" value="{{comment_id}}"> 
            <div class="name" data-name="{{name}}">{{name}}</div>
            <div class="comment" style="white-space: pre-wrap;">{{content}}</div>
            <!-- <input class="comment" type="hidden" name="content" value="{{content}}"> -->
            <div class=" ml-auto d-flex align-items-center">
                <div class="time" value="{{time}}"></div>
                <div class="ml-3 edit" data-name="{{name}}"><i class="fas fa-pen"></i></div>
                <div class="ml-3 delete" data-name="{{name}}"><i class="fa fa-times"></i></div>
            </div>
        </div>  
    </form>
<?php echo '</script'; ?>
>
<?php }
}
