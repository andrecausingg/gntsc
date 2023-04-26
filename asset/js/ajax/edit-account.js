$(document).ready(function(){
    $(".displayAccounts").load("./asset/php/main/display-accounts.php");

    $(document).on("submit", "#formAccountEdit" , function(e) {
        e.preventDefault();
        
        var dataId = $("#dataIdAccountEdit").val();
        var lastName = $("#lastNameEdit").val().toUpperCase();
        var middleName = $("#middleNameEdit").val().toUpperCase();
        var firstName = $("#firstNameEdit").val().toUpperCase();
        var username = $("#usernameEdit").val();
        var password = $("#passwordEdit").val();

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
            console.log("asdasd");
            $.ajax({
                url: './asset/php/main/edit-account.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                    lastName:   lastName ,
                    middleName: middleName ,
                    firstName:  firstName ,
                    username:   username ,
                    password:   password ,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Update"){
                        $(".displayAccounts").load("./asset/php/main/display-accounts.php");
                        $(".createAccountContainerEdit").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyLname(){
            if($(".lNameEdit").val() == ""){
                $(".lNameEdit").css('border', '1px solid red');
                $(".errLnameEdit").show();
            }else{
                $(".lNameEdit").css('border', '1px solid black');
                $(".errLnameEdit").hide();
            }
        }

        function errEmptyFname(){
            if($(".fNameEdit").val() == ""){
                $(".fNameEdit").css('border', '1px solid red');
                $(".errFnameEdit").show();
            }else{
                $(".fNameEdit").css('border', '1px solid black');
                $(".errFnameEdit").hide();
            }
        }

        function errEmptyUserName(){
            if($(".usernameEdit").val() == ""){
                $(".usernameEdit").css('border', '1px solid red');
                $(".errUsernameEdit").show();
            }else{
                $(".usernameEdit").css('border', '1px solid black');
                $(".errUsernameEdit").hide();
            }
        }

        function errEmptyPassword(){
            if($(".passwordEdit").val() == ""){
                $(".passwordEdit").css('border', '1px solid red');
                $(".errPasswordEdit").show();
            }else{
                $(".passwordEdit").css('border', '1px solid black');
                $(".errPasswordEdit").hide();
            }
        }

        function errNotStrongPassword(){
            if(passwordLessMore() < 8){
                $(".passwordEdit").css('border', '1px solid red');
                $(".errPasswordlengthEdit").show();
            }else{
                $(".passwordEdit").css('border', '1px solid black');
                $(".errPasswordlengthEdit").hide();
            }
        }

        // Function Compute
        function passwordLessMore(){
            var a = $(".passwordEdit").val().length;
            return a;
        }
    });
});