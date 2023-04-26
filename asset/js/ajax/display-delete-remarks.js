$(document).ready(function(){
    $(document).on('click',"#delete",function(){
        var dataId = $(this).attr('data-id');

        $.ajax({
            url: './asset/php/main/display-delete-remarks.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                // console.log(data);
                if(data != ""){
                    $.ajax({
                        url: './asset/php/main/display-remarks.php', // Backend Script
                        type: 'POST', // Type POST 
            
                        data: { 
                            dataId: dataId, 
                        },
                        
                        // Displaying the return message on Backend Script
                        success: function (data){
                            // console.log(data);
                            $("#displayRemarksData").html(data);
                        }
                    })
                    
                    $("#deleteRemarksContainer").html(data);
                }
            }
        })
    });
});