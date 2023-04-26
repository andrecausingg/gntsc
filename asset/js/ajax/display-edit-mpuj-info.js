$(document).ready(function(){
    $(document).on('click',"#edit",function(){
        var dataId = $(this).attr('data-id');


        $.ajax({
            url: './asset/php/main/display-edit-mpuj-info.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                // console.log(data);
                if(data != ""){
                    $("#editMpujContainer").html(data);
                }
            }
        })
    });
});