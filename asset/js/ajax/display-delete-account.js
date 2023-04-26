$(document).ready(function(){
    $(document).on('click',"#delete",function(){
        var dataId = $(this).attr('data-id');

        $.ajax({
            url: './asset/php/main/display-delete-account.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                if(data != ""){
                    $("#deleteAccountContainer").html(data);
                }
            }
        })
    });
});