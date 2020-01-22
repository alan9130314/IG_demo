$(document).ready(function () {

    //template.php 解析
    var source = $('#post-template').html();
    var postTemplate = Handlebars.compile(source);
    //template.php 解析
    var source = $('#comment-template').html();
    var commentTemplate = Handlebars.compile(source);

    //把data.php準備好的posts[]陣列塞回#board內
    var postListUI = '';
    $.each(posts, function (index, post) {
        post['img'] = "post/upload/" + post['img'];
        postListUI = postListUI + postTemplate(post);
    });
    $('#board').find('.posts').append(postListUI);


    //把data.php準備好的comments塞回原本的.post內
    $.each(comments, function (index, comment) {
        var commentListUI = commentTemplate(comment);
        //找到該貼文並把留言塞到該位置
        var post_id = comment['post_id'];
        $('#ig').find('.post[data-post_id="' + post_id + '"]').find('hr').before(commentListUI);

        //顯示目前使用者帳號的留言編輯和刪除紐
        var comment_name = comment['name'];
        if ($('a.account').data('account') == comment_name) {
            loadOwnEdit(comment_name);
            loadOwnDelete(comment_name);
        }
    });

    //將是目前使用者帳號的.post的comments.delete刪除按鍵顯示
    $.each(posts, function (index, post) {
        if ($('a.account').data('account') == post['account']) {
            loadAllDelete(post);
        }
    });

    function loadOwnEdit(comment_name) {
        $('#ig').find('.edit[data-name="' + comment_name + '"]').addClass('show');
    }

    function loadOwnDelete(comment_name) {
        $('#ig').find('.delete[data-name="' + comment_name + '"]').addClass('show');
    }

    function loadAllDelete(post) {
        $('#ig').find('h4.account[data-account="' + post['account'] + '"]').closest('.post')
            .find('.delete').addClass('show');
    }



    //發布貼文介面
    var panel = {
        el: '#post-panel',
        selectedPost: null,
        selectedComment: null,
        init: function () {
            panel.clear();
        },
        clear: function () {
            $(panel.el).find('input').val('');
            $(panel.el).find('textarea').val('');
        },
        open: function () {
            $(panel.el).addClass('open')
                .find('textarea').focus();
        },
        close: function () {
            $(panel.el).removeClass('open');
            panel.init();
        },
    }
    //按下發布貼文按鈕
    $('.write_post').click(function (e) {
        panel.open();
        var member_id = $('#ig').find('.member_id').val();
        $(panel.el).find('input[name="member_id"]').val(member_id);
        $(panel.el).addClass('new').removeClass('update');
    });
    //連點兩次可編輯
    $('#board').on('dblclick', '.post', function (e) {
        panel.selectedPost = $(e.currentTarget);
        if ($('a.account').data('account') == panel.selectedPost.find('.account').data('account')) {
            $(panel.el).addClass('open').addClass('update').removeClass('new');
            var id = $(this).data('post_id');
            console.log('post id : ' + id);
            //ajax call - get event detail
            //load detail back to panel 
            $.post("post/read.php", {
                    id: id
                },
                function (data, textStatus, jqXHR) {
                    $(panel.el).find('[name="post_id"]').val(data.post_id);
                    $(panel.el).find('input#file').val(data.img);
                    $(panel.el).find('[name="content"]').val(data.content);
                });
        }
    });


    $(panel.el)
        .on('click', 'button', function (e) {
            if ($(this).is('.create') || $(this).is('.update')) {
                if ($(this).is('.create'))
                    var action = "post/create.php";
                if ($(this).is('.update'))
                    var action = "post/update.php"

                console.log('跑 ' + action + ' API');

                if ($('#inputGroupFile01').get(0).files.length === 0 &&
                    $('input#file').val().length === 0) {
                    // 
                } else if (document.getElementById("inputGroupFile01").files.length != 0) {
                    //上傳區有檔案 跑 create api
                    var selectedFile = $('#inputGroupFile01').prop('files')['0']['name'];
                    $('input#file').val('');
                    $('input#file').val(selectedFile);
                    //collect data 
                    var data = $(panel.el).find('form').serialize();
                    console.log('inputGroupFile01!=0 跑上傳 API ' + data);
                    // ajax call - api   
                    $.post(action, data,
                        function (data, textStatus, jqXHR) {
                            if ($(e.currentTarget).is('.create')) {
                                console.log(action);

                                data.img = "post/upload/" + data.img;
                                var postUI = postTemplate(data);
                                $('#board').find('#Page').after(postUI);
                            }

                        });
                    panel.close();
                } else if ($('input#file').val().length != 0) {
                    //上傳區無檔案但有傳回原本的圖片值，跑更新API
                  
                    
                    var data = $(panel.el).find('form').serialize();
                    console.log('input#file != 0 跑更新API' + data);

                    // ajax call - api   
                    $.post(action, data,
                        function (data, textStatus, jqXHR) {
                            if ($(e.currentTarget).is('.update')) {
                                console.log(typeof (data));
                                console.log(data);                               
                                console.log(data.content);

                                data.img = "post/upload/" + data.img;
                                this_post_id = data.post_id;


                                var postUI = postTemplate(data);
                                $('#board').find('.post[data-post_id="' + this_post_id + '"]').after(postUI);

                                panel.selectedPost.remove();

                                //重新抓取並載入留言
                                var comment_post_id = data.post_id;

                                $.post("post/read comments.php", {
                                        comment_post_id: comment_post_id
                                    },
                                    function (data, textStatus, jqXHR) {

                                        $.each(data, function (index, comment) {
                                            var commentListUI = commentTemplate(comment);

                                            //找到該貼文並把留言塞到該位置
                                            var post_id = comment['post_id'];
                                            $('#ig').find('.post[data-post_id="' + post_id + '"]').find('hr').before(commentListUI);

                                            //顯示該帳號的留言編輯刪除紐
                                            var comment_name = comment['name'];
                                            if ($('a.account').data('account') == comment_name) {
                                                $('#ig').find('.edit[data-name="' + comment_name + '"]').addClass('show');
                                                $('#ig').find('.delete[data-name="' + comment_name + '"]').addClass('show');
                                            }

                                            //顯示自己的post的comment .delete刪除按鈕
                                            $.each(posts, function (index, post) {
                                                var owner = post['account'];

                                                if ($('a.account').data('account') == owner) {
                                                    $('#ig').find('h4.account[data-account="' + owner + '"]').closest('.post')
                                                        .find('.delete').addClass('show');
                                                }
                                            });

                                        });

                                    });

                            }
                        });
                    panel.close();
                }


            }

            if ($(this).is('.cancel')) {
                panel.close();
            }
            if ($(this).is('.delete')) {
                var result = confirm('確定要刪除貼文?');
                if (result) {
                    var id = panel.selectedPost.data('post_id');
                    console.log("delete post_id : " + id);
                    $.post("post/delete.php", {
                            post_id: id
                        })
                        .done(function () {
                            panel.selectedPost.remove();
                            panel.close();
                        });
                }
            }
        })
        .on('click', '.close', function (e) {
            $('button.cancel').click();
        });

    $('button.logout').click(function (e) {
        e.preventDefault();
        console.log("press logout");

        $.post("user/logout.php")
            .done(function (data, textStatus, jqXHR) {
                alert("您已登出");
            });
        window.location = 'login.php';
    });

    $('#ig').on('click', 'button.comment-post', function (e) {
        panel.selectedPost = $(e.currentTarget).closest('.post');
        var TimeNow = new Date();
        var yyyy = TimeNow.toLocaleDateString().slice(0, 4)
        var MM = (TimeNow.getMonth() + 1 < 10 ? '0' : '') + (TimeNow.getMonth() + 1);
        var dd = (TimeNow.getDate() < 10 ? '0' : '') + TimeNow.getDate();
        var h = (TimeNow.getHours() < 10 ? '0' : '') + TimeNow.getHours();
        var m = (TimeNow.getMinutes() < 10 ? '0' : '') + TimeNow.getMinutes();
        var s = (TimeNow.getSeconds() < 10 ? '0' : '') + TimeNow.getSeconds();
        var time = yyyy + '-' + MM + '-' + dd + ' ' + h + ':' + m + ':' + s;

        panel.selectedPost.find('[name="time"]').val(time);
        var commentAc = $('a.account').data('account');
        panel.selectedPost.find('[name="name"]').val(commentAc);


        if (panel.selectedPost.find('input.comment-content').val() == "") {

        } else {
            //collect data
            var data = panel.selectedPost.find('form').serialize();
            // ajax call -create api
            $.post("post/create comment.php", data,
                function (data, textStatus, jqXHR) {

                    var commentUI = commentTemplate(data);
                    var comment_name = data['name'];

                    panel.selectedPost.find('hr').before(commentUI);
                    if ($('a.account').data('account') == comment_name) {
                        $('#ig').find('.edit[data-name="' + comment_name + '"]').addClass('show');
                        $('#ig').find('.delete[data-name="' + comment_name + '"]').addClass('show');
                    }
                    panel.selectedPost.find('input.comment-content').val('')
                });
        }

    });

    $('#ig').on('click', '.delete', function (e) {
        console.log('delete comment');
        var result = confirm('確定要刪除留言?');
        panel.selectedComment = $(e.currentTarget).closest('.comments');
        if (result) {
            var id = panel.selectedComment.data('comment_id');
            // panel.selectedComment.remove();
            $.post("post/delete comment.php", {
                    comment_id: id
                })
                .done(function () {
                    panel.selectedComment.remove();
                });
        }

    });


    $('#ig')
        .on('click', '.edit', function (e) {
            console.log('edit comment');
            panel.selectedComment = $(e.currentTarget).closest('.comments');
            panel.selectedComment.find('.comment')
                .prop('contenteditable', true).focus();
        }).on('blur', '.comment', function (e) {
            panel.selectedComment = $(e.currentTarget).closest('.comments');
            var comment_id = panel.selectedComment.data('comment_id');
            var content = panel.selectedComment.find('.comment').text();
            console.log(content);

            $.post("post/update comment.php", {
                    comment_id: comment_id,
                    content: content
                })
                .done(function (data, textStatus, jqXHR) {
                    console.log(data);


                    var commentUI = commentTemplate(data);
                    var oldcomment = $('#board').find('.comments[data-comment_id="' + data.comment_id + '"]');
                    oldcomment.after(commentUI);

                    $('#board').find('.comments[data-comment_id="' + data.comment_id + '"]')
                        .find('.edit').addClass('show');
                    $('#board').find('.comments[data-comment_id="' + data.comment_id + '"]')
                        .find('.delete').addClass('show');


                    panel.selectedComment.remove();

                });


            // panel.selectedComment.find('.comment').prop('contenteditable', false);
        });

    $('.myPosts').click(function (e) {
        e.preventDefault();
        console.log('press my post');
        var member_id = $('.member_id').val();
        var account = $('a.account').data('account');

        $.post("post/myPosts.php", {
                member_id: member_id,
                account: account
            },
            function (data, textStatus, jqXHR) {
                console.log(data);
                $('.post').remove();
                $('#Page').remove();
                var postListUI = '';
                $.each(data, function (index, post) {
                    post['img'] = "post/upload/" + post['img'];
                    postListUI = postListUI + postTemplate(post);
                });
                $('#board').find('.posts').append(postListUI);

                //把data.php準備好的comments塞回原本的.post內
                $.each(comments, function (index, comment) {
                    var commentListUI = commentTemplate(comment);
                    //找到該貼文並把留言塞到該位置
                    var post_id = comment['post_id'];
                    $('#ig').find('.post[data-post_id="' + post_id + '"]').find('hr').before(commentListUI);

                    //顯示目前使用者帳號的留言編輯和刪除紐
                    var comment_name = comment['name'];
                    if ($('a.account').data('account') == comment_name) {
                        loadOwnEdit(comment_name);
                        loadOwnDelete(comment_name);
                    }
                });

                //將是目前使用者帳號的.post的comments.delete刪除按鍵顯示
                $.each(posts, function (index, post) {
                    if ($('a.account').data('account') == post['account']) {
                        loadAllDelete(post);
                    }
                });
                // $.each(data, function (index, post) {
                //     $('.post').find('h4.account').not('[data-account="' + post.account + '"]').closest('.post').remove();
                // })
            }
        );
    });

    $('.search').keydown(function (event) {

        // console.log(event.which);
        if (event.which == 13) {
            $('.searchResult').removeClass('show').html("");

            var search = $('.search').val();
            search = search.trim();
            if (search != '') {
                $.post("post/search.php", {
                        search: search
                    })
                    .done(function (data, textStatus, jqXHR) {
                        console.log(data);
                        console.log(typeof (data));
                        if (data == null) {
                            $('.post').remove();

                            $('.searchResult').addClass('show').html("找不到帳號為 " + search + " 的任何貼文");

                        } else {
                            $('.post').remove();
                            $('#Page').remove();
                            var postListUI = '';
                            $.each(data, function (index, post) {
                                post['img'] = "post/upload/" + post['img'];
                                postListUI = postListUI + postTemplate(post);
                            });
                            $('#board').find('.posts').append(postListUI);


                            //重新抓取並載入留言
                            $.each(data, function (index, post) {
                                var comment_post_id = post.post_id;
                                $.post("post/read comments.php", {
                                        comment_post_id: comment_post_id
                                    },
                                    function (data, textStatus, jqXHR) {

                                        $.each(data, function (index, comment) {
                                            var commentListUI = commentTemplate(comment);

                                            //找到該貼文並把留言塞到該位置
                                            var post_id = comment['post_id'];
                                            $('#ig').find('.post[data-post_id="' + post_id + '"]').find('hr').before(commentListUI);

                                            //顯示該帳號的留言編輯刪除紐
                                            var comment_name = comment['name'];
                                            if ($('a.account').data('account') == comment_name) {
                                                $('#ig').find('.edit[data-name="' + comment_name + '"]').addClass('show');
                                                $('#ig').find('.delete[data-name="' + comment_name + '"]').addClass('show');
                                            }

                                            //顯示自己的post的comment .delete刪除按鈕
                                            $.each(posts, function (index, post) {
                                                var owner = post['account'];

                                                if ($('a.account').data('account') == owner) {
                                                    $('#ig').find('h4.account[data-account="' + owner + '"]').closest('.post')
                                                        .find('.delete').addClass('show');
                                                }
                                            });

                                        });

                                    });
                            })
                        }

                        $('.search').val('').blur();
                    })
                    .fail(function (data, textStatus, jqXHR) {
                        console.log("空查詢");

                    })



            }

        }
    });



    $('#ig').on('click', '.page-link', function (e) {
        e.preventDefault();

        $('.page-item').removeClass('active');
        $(e.currentTarget).closest('.page-item').addClass('active');

        var page = $(e.currentTarget).html();
        console.log(page);

        $.post("post/page.php", {
            page: page
        }, function (data, textStatus, jqXHR) {


            $('.post').remove();
            var postListUI = '';
            $.each(data, function (index, post) {
                post['img'] = "post/upload/" + post['img'];
                postListUI = postListUI + postTemplate(post);
            });
            $('#board').find('.posts').append(postListUI);

            //把data.php準備好的comments塞回原本的.post內
            $.each(comments, function (index, comment) {
                var commentListUI = commentTemplate(comment);
                //找到該貼文並把留言塞到該位置
                var post_id = comment['post_id'];
                $('#ig').find('.post[data-post_id="' + post_id + '"]').find('hr').before(commentListUI);

                //顯示目前使用者帳號的留言編輯和刪除紐
                var comment_name = comment['name'];
                if ($('a.account').data('account') == comment_name) {
                    loadOwnEdit(comment_name);
                    loadOwnDelete(comment_name);
                }
            });

            //將是目前使用者帳號的.post的comments.delete刪除按鍵顯示
            $.each(posts, function (index, post) {
                if ($('a.account').data('account') == post['account']) {
                    loadAllDelete(post);
                }
            });
        }, "json");



    });



});