$(document).ready(function(){
    // $(".displayRemarksData").load("./asset/php/main/display-view-crud.php");

    $(document).on("submit", "#formRemarks" , function(e) {
        e.preventDefault();
        
        var dataId = $("#dataId").val();
        var remarks = $("#remarks").val();

        // console.log(dataId);
        // console.log(remarks);

        errRemarks();

        // Inserting Data on Database
        if(remarks != ""){
            $.ajax({
                url: './asset/php/main/insert-remarks.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId ,
                    remarks: remarks,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    $(".displayRemarksData").html(data);
                    $("#formRemarks").trigger('reset'); 
                    $(".successAddContainer").show();
                    $('.successAddContainer').delay(5000).fadeOut();
                }
            });
        }
        

        function errRemarks(){
            if($(".remarks").val() == ""){
                $(".remarks").css('border', '1px solid red');
                $(".errRemarks").show();
            }else{
                $(".remarks").css('border', '1px solid black');
                $(".errRemarks").hide();
            }
        }
    });
});