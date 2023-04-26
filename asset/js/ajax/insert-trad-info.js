$(document).ready(function(){
    $(".displayTrad").load("./asset/php/main/display-trad-info.php");

    $('#formTradInfo').submit(function(e){
        e.preventDefault();
        
        var plateNum = $("#plateNum").val().toUpperCase();

        // console.log(chasisNum);
        // console.log(plateNumber);
        // console.log(mpujNum);

        errPlateNum();

        // Inserting Data on Database
        if(plateNum != ""){
            $.ajax({
                url: './asset/php/main/insert-trad-info.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    plateNum: plateNum ,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayTrad").load("./asset/php/main/display-trad-info.php");
                        $("#formTradInfo").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
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
    });
});