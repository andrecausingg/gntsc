$(document).ready(function(){
    $(".displayTrad").load("./asset/php/main/display-trad-info.php");

    $(document).on("submit", "#formTradInfoEdit" , function(e) {
        e.preventDefault();
        
        var dataId = $("#dataIdTradEdit").val();
        var plateNum = $("#plateNumEdit").val();

        errPlateNum();

        // Inserting Data on Database
        if(plateNum != ""){
            $.ajax({
                url: './asset/php/main/edit-trad-info.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId ,
                    plateNum: plateNum ,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Update"){
                        $(".displayTrad").load("./asset/php/main/display-trad-info.php");
                        $("#editTradInfoContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
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
    });
});