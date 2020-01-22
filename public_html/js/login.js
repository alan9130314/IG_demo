$(document).ready(function () {

    $('button.login').click(function (e) {
        e.preventDefault();
        console.log("press login");

        if ($('input.account').val() == "" || $('input.password').val() == "") {
            $('.error-msg').addClass('open')
                .find('.alert').text("帳號或密碼為空白!");
        } else {
            var data = $('#login').find('form').serialize();
            console.log(data);
            $.post("user/login.php", data)
                .done(function (jqXHR, textStatus, errorThrown) {
                    $('.error-msg').removeClass('alert-danger').addClass('alert-success')
                    .addClass('open').find('.alert').text("登入成功");
                    // window.location = 'index.php';    
                    setTimeout(function() {
                        window.location.href = "index.php";
                      }, 1000);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                    $('.error-msg').removeClass('alert-success').addClass('alert-danger')
                    .addClass('open').find('.alert').text(jqXHR.responseText);
                    // location.reload();
                    // window.location = 'index.php'
                });
            

        };
    });

    // var acpwd = {
    //     id:1,
    //     ac:'123',
    //     pwd:'456',
    // };

});