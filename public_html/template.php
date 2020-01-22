{literal} 
<script id="post-template" type="text/x-handlebars-template">
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
</script>

<script id="comment-template" type="text/x-handlebars-template">
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
</script>
{/literal}