$(document).ready(function(){
    $(document).on("submit", "#formEditRemarks" , function(e) {
        e.preventDefault();

        var dataId = $(".dataId").val();
        var dataIdUser = $(".dataIdUser").val();
        var remarksEdit = $("#remarksEdit").val();

        console.log(dataId);
        console.log(dataIdUser);
        console.log(remarksEdit);

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/edit-remarks.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                    dataIdUser: dataIdUser,
                    remarksEdit: remarksEdit,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    $(".displayRemarksData").html(data);
                    $(".editRemarksContainer").hide();
                    $(".successUpdateContainer").show();
                    $('.successUpdateContainer').delay(5000).fadeOut();

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