$(document).ready(function () {

    $('button.signUp').click(function (e) {
        e.preventDefault();
        console.log("press sign up");

        if ($('input.account').val() == "" || $('input.password').val() == "") {
            alert("使用者名稱或密碼不能為空！");
        }else{
            var data = $('#signUp').find('form').serialize();
            console.log(data);
    
            $.post("user/registered.php", data)
                .done(function (data, textStatus, jqXHR) {
                    console.log('done');
                    
                    console.log(jqXHR.responseText);
                    $('.error-msg').removeClass('alert-danger').addClass('alert-success')
                    .addClass('open').find('.alert').text("帳號註冊成功");
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log('fail');
                    console.log(jqXHR.responseText);
                    $('.error-msg').removeClass('alert-success').addClass('alert-danger')
                    .addClass('open').find('.alert').text(jqXHR.responseText);
    
                });
        }

      

    });


    // var acpwd = {
    //     id:1,
    //     ac:'123',
    //     pwd:'456',
    // };

});