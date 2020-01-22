$(document).ready(function () {

    

    var panel = {
        el: '#post-panel',
        selectedPost: null,
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

    $('.write_post').click(function (e) {
        panel.open();
        $(panel.el).addClass('new').removeClass('update');
    });


    $(panel.el)
        .on('click', 'button.create', function (e) {
            if ($(this).is('.create') || $(this).is('.update')) {
                if ($(this).is('.create'))
                    var action = "post/create.php";
                if ($(this).is('.update'))
                    var action = "post/update.php"

                var file_data = $('#inputGroupFile01').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);

                if ($('#inputGroupFile01').get(0).files.length === 0 &&
                    $('input#file').val().length === 0) {
                    console.log("no files selected");
                    alert('未選擇圖片');
                } else if (document.getElementById("inputGroupFile01").files.length != 0 ||
                    $('input#file').val().length === 0) {
                    var selectedFile = $('#inputGroupFile01').prop('files')['0']['name'];
                    // console.log(selectedFile);
                    $('input#file').val(selectedFile);

                    $.ajax({
                        url: "post/upload.php", // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (php_script_response) {
                            // alert(php_script_response); // display response from the PHP script, if any
                        }
                    });
                }



            }



            if ($(this).is('.cancel')) {
                panel.close();

            }
            if ($(this).is('.delete')) {
                var result = confirm('delete this post?');

                if (result) {
                    var id = panel.selectedPost.data('id');
                    panel.selectedPost.remove();
                    panel.close();
                    // $.post("post/delete.php", {id:id})
                    //     .done(function() {
                    //         panel.selectedPost.remove();
                    //         panel.close();
                    //     });
                }
            }
        })
        .on('click', 'button.update', function (e) {
            var file_data = $('#inputGroupFile01').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: "post/upload.php", // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (php_script_response) {
                    // alert(php_script_response); // display response from the PHP script, if any



                }
            });

            if ($(this).is('.cancel')) {
                panel.close();

            }
            if ($(this).is('.delete')) {
                var result = confirm('delete this post?');

                if (result) {
                    var id = panel.selectedPost.data('id');
                    panel.selectedPost.remove();
                    panel.close();
                    // $.post("post/delete.php", {id:id})
                    //     .done(function() {
                    //         panel.selectedPost.remove();
                    //         panel.close();
                    //     });
                }
            }
        })
        .on('click', '.close', function (e) {
            $('button.cancel').click();
        });



});