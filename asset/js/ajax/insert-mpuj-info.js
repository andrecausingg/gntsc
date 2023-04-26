$(document).ready(function(){
    $(".displayMpuj").load("./asset/php/main/display-mpuj-info.php");

    $('#formMpujInfo').submit(function(e){
        e.preventDefault();
        
        var chasisNum = $("#chasisNum").val().toUpperCase();
        var plateNum = $("#plateNum").val().toUpperCase();
        var mpujNum = $("#mpujNum").val().toUpperCase();
        var engineNum = $("#engineNum").val().toUpperCase();
        var status = $("#status").val().toUpperCase();

        // console.log(chasisNum);
        // console.log(plateNumber);
        // console.log(mpujNum);

        // Error Functions
        errEngineNum();
        errChasisNum();
        errPlateNum();
        errMpujNum();

        // Inserting Data on Database
        if(status != "" && chasisNum != "" && plateNum != "" && mpujNum){
            $.ajax({
                url: './asset/php/main/insert-mpuj-info.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    chasisNum:   chasisNum ,
                    plateNum: plateNum ,
                    mpujNum:  mpujNum ,
                    engineNum:engineNum,
                    status:status,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayMpuj").load("./asset/php/main/display-mpuj-info.php");
                        $("#formMpujInfo").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEngineNum(){
            if($(".engineNum").val() == ""){
                $(".engineNum").css('border', '1px solid red');
                $(".errEngineNum").show();
            }else{
                $(".engineNum").css('border', '1px solid black');
                $(".errEngineNum").hide();
            }
        }

        function errChasisNum(){
            if($(".chasisNum").val() == ""){
                $(".chasisNum").css('border', '1px solid red');
                $(".errchasisNum").show();
            }else{
                $(".chasisNum").css('border', '1px solid black');
                $(".errchasisNum").hide();
            }
        }

        function errPlateNum(){
            if($(".plateNum").val() == ""){
                $(".plateNum").css('border', '1px solid red');
                $(".errPlateNum").show();
            }else{
                $(".plateNum").css('border', '1px solid black');
                $(".errPlateNum").hide();
            }
        }

        function errMpujNum(){
            if($(".mpujNum").val() == ""){
                $(".mpujNum").css('border', '1px solid red');
                $(".errmpujNum").show();
            }else{
                $(".mpujNum").css('border', '1px solid black');
                $(".errmpujNum").hide();
            }
        }
    });
});