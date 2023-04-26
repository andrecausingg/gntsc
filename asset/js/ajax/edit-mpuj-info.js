$(document).ready(function(){
    $(".displayMpuj").load("./asset/php/main/display-mpuj-info.php");

    $(document).on("submit", "#formMpujInfoEdit" , function(e) {
        e.preventDefault();
        
        var dataId = $("#dataIdMpujEdit").val();
        var chasisNum = $("#chasisNumEdit").val();
        var plateNum = $("#plateNumEdit").val();
        var mpujNum = $("#mpujNumEdit").val();
        var engineNum = $("#engineNumEdit").val();
        var status = $("#statusEdit").val();

        // Error Functions
        errEngineNum();
        errChasisNum();
        errPlateNum();
        errMpujNum();

        // Inserting Data on Database
        if(status != "" && chasisNum != "" && plateNum != "" && mpujNum){
            $.ajax({
                url: './asset/php/main/edit-mpuj-info.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId ,
                    chasisNum: chasisNum ,
                    plateNum: plateNum ,
                    mpujNum:  mpujNum ,
                    engineNum:engineNum,
                    status:status,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Update"){
                        $(".displayMpuj").load("./asset/php/main/display-mpuj-info.php");
                        $("#editMpujInfoContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEngineNum(){
            if($(".engineNumEdit").val() == ""){
                $(".engineNumEdit").css('border', '1px solid red');
                $(".errEngineNumEdit").show();
            }else{
                $(".engineNumEdit").css('border', '1px solid black');
                $(".errEngineNumEdit").hide();
            }
        }

        function errChasisNum(){
            if($(".chasisNumEdit").val() == ""){
                $(".chasisNumEdit").css('border', '1px solid red');
                $(".errchasisNumEdit").show();
            }else{
                $(".chasisNumEdit").css('border', '1px solid black');
                $(".errchasisNumEdit").hide();
            }
        }

        function errPlateNum(){
            if($(".plateNumEdit").val() == ""){
                $(".plateNumEdit").css('border', '1px solid red');
                $(".errPlateNumEdit").show();
            }else{
                $(".plateNumEdit").css('border', '1px solid black');
                $(".errPlateNumEdit").hide();
            }
        }

        function errMpujNum(){
            if($(".mpujNumEdit").val() == ""){
                $(".mpujNumEdit").css('border', '1px solid red');
                $(".errmpujNumEdit").show();
            }else{
                $(".mpujNumEdit").css('border', '1px solid black');
                $(".errmpujNumEdit").hide();
            }
        }
    });
});