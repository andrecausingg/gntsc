$(document).ready(function () {
    // ID on form signUp
    $('#logInForm').submit(function(e){
        e.preventDefault();

        // Get the value and put in Variable
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: './asset/php/main/login.php', // Backend Script on loginMF.php
            type: 'POST', // Type POST 
            data: { 
                    username: username,
                    password: password,
            },
            
            // Displaying the return message on Backend Script on loginMF.php
            success: function (data){
                $("#errUserPass").html(data);
            }
        })
    });
});
