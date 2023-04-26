$(document).ready(function(){
    $(document).on('click',"#edit",function(){
        var dataId = $(this).attr('data-id');
        var dataRoleName = $(this).attr('data-role-name');

        $.ajax({
            url: './asset/php/main/display-edit-staff-puj-pao-ins.php', // Backend Script
            type: 'POST', // Type POST 

            data: { 
                dataId: dataId, 
                dataRoleName: dataRoleName,
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                // console.log(data);
                if(dataRoleName == "PUJ"){
                    $("#editPujContainerDisplay").html(data);
                }else if(dataRoleName == "PAO"){
                    $("#editPaoContainerDisplay").html(data);
                }else if(dataRoleName == "STA"){
                    $("#editInsContainerDisplay").html(data);
                }else if(dataRoleName == "OPE"){
                    $("#editOpeContainerDisplay").html(data);
                }else{
                    $("#editTraContainerDisplay").html(data);
                }
            }
        })
    });
});