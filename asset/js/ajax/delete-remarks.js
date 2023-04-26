$(document).ready(function(){
    $(document).on("submit", "#formDeleteRemarks" , function(e) {
        e.preventDefault();

        var dataId = $(".dataIdDeleteRemarks").val();
        var dataIdUser = $(".dataIdUserDeleteRemarks").val();
        
        console.log(dataId);
        console.log(dataIdUser);

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-remarks.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                    dataIdUser: dataIdUser,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    $(".displayRemarksData").html(data);
                    $(".deleteContainer").hide();
                    $(".successDeleteContainer").show();
                    $('.successDeleteContainer').delay(5000).fadeOut();

                    // if(data == "Success Delete"){
                    //     $(".deleteContainer").hide();
                    //     $(".successDeleteContainer").show();
                    //     $('.successDeleteContainer').delay(5000).fadeOut();
                    // }
                }
            });
        }
    });
});