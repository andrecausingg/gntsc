$(document).ready(function(){
    $(document).on('click',"#view",function(){
        var dataId = $(this).attr('data-id');

        $.ajax({
            url: './asset/php/main/display-view-crud.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                $("#remarksCRUD").html(data);
            }
        })
        
        $.ajax({
            url: './asset/php/main/display-remarks.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                // console.log(data);
                $(".displayRemarksData").html(data);
            }
        })
    });
});