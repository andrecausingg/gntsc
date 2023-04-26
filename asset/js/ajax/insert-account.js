$(document).ready(function(){
    $(".displayAccounts").load("./asset/php/main/display-accounts.php");

    $('#formAccount').submit(function(e){
        e.preventDefault();
        var lastName = $("#lastName").val().toUpperCase();
        var middleName = $("#middleName").val().toUpperCase();
        var firstName = $("#firstName").val().toUpperCase();
        var username = $("#username").val();
        var password = $("#password").val();

        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(username);
        // console.log(password);

        // Error Functions
        errEmptyLname();
        errEmptyFname();
        errEmptyUserName();
        errEmptyPassword();
        errNotStrongPassword();

        // Inserting Data on Database
        if(lastName != "" && middleName != "" && firstName != "" && username != "" && password != "" && passwordLessMore() > 7){
            $.ajax({
                url: './asset/php/main/insert-accounts.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    lastName:   lastName ,
                    middleName: middleName ,
                    firstName:  firstName ,
                    username:   username ,
                    password:   password ,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayAccounts").load("./asset/php/main/display-accounts.php");
                        $("#formAccount").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyLname(){
            if($(".lName").val() == ""){
                $(".lName").css('border', '1px solid red');
                $(".errLname").show();
            }else{
                $(".lName").css('border', '1px solid black');
                $(".errLname").hide();
            }
        }

        function errEmptyFname(){
            if($(".fName").val() == ""){
                $(".fName").css('border', '1px solid red');
                $(".errFname").show();
            }else{
                $(".fName").css('border', '1px solid black');
                $(".errFname").hide();
            }
        }

        function errEmptyUserName(){
            if($(".username").val() == ""){
                $(".username").css('border', '1px solid red');
                $(".errUsername").show();
            }else{
                $(".username").css('border', '1px solid black');
                $(".errUsername").hide();
            }
        }

        function errEmptyPassword(){
            if($(".password").val() == ""){
                $(".password").css('border', '1px solid red');
                $(".errPassword").show();
            }else{
                $(".password").css('border', '1px solid black');
                $(".errPassword").hide();
            }
        }

        function errNotStrongPassword(){
            if(passwordLessMore() < 8){
                $(".password").css('border', '1px solid red');
                $(".errPasswordlength").show();
            }else{
                $(".password").css('border', '1px solid black');
                $(".errPasswordlength").hide();
            }
        }

        // Function Compute
        function passwordLessMore(){
            var a = $(".password").val().length;
            return a;
        }
    });
});