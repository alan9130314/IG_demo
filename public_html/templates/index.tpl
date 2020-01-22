{config_load file="test.conf" section="setup"}
{include file="header.tpl"}
{include file="../template.php"}



<div id="ig">
    <nav class="navbar navbar-light shadow-sm ">
        <div class="container">
            <a href="index.php" class="navbar-brand">Instagram</a>

            <div class="input-group-sm">
                <input type="text" class="form-control search" placeholder="搜尋">
            </div>
            <div class="buttons">
                {if isset($smarty.session)==TRUE }
                <a class="btn btn-link account" data-account="{$account}"><span class="ac">{$account}</span>您已登入</a>
                <button class="btn btn-light logout"><i class="fas fa-sign-out-alt"></i></button>
                <input type="hidden" class="member_id" value="{$member_id}" name="member_id">
                <button class="btn  btn-light  myPosts"><i class="fas fa-user"></i></button>
                <button class="btn btn-light  write_post"><i class="fas fa-feather-alt"></i></button>
                {else}
                <a href="sign up.php" class="btn btn-link">註冊</a>
                <a href="login.php" class="btn btn-link">登入</a>
                {/if}

            </div>

        </div>
    </nav>

    {if isset($smarty.session)==TRUE }
    <div id="board">
        <div class="container posts">
            <div class="alert alert-light searchResult" role="alert">

            </div>
            <nav aria-label="Page navigation" id="Page">
                <ul class="pagination pagination-lg justify-content-center">
                    {$pagesPage}
                </ul>
            </nav>
        </div>
    </div>
    {/if}

</div>


<div id="post-panel" class="update">
    <div class="post-panel-header">
        <div class="close">x</div>
    </div>
    <div class="post-panel-body ">
        <form enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="">
            <input type="hidden" value="{$member_id}" name="member_id">
            <div class="account mb-1" name="{$account}">{$account}</div>
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




{include file="footer.tpl"}