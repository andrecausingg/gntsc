$(document).ready(function(){
    // Search User
    $('#dashboardSendSearchUser').keyup(function(){
        var etnebID = $(this).val();
        if(etnebID != ''){
            setSearchUser(etnebID);
            $("#exampleDisplayUser").hide();
            $("#resultSearch").show();
            $("#dashboardSendCancel").show();
        }
        else{
            setSearchUser();
            $("#exampleDisplayUser").show();
            $("#dashboardSendCancel").hide();
        }
    });

    // Search User
    function setSearchUser(etnebID){
        $.ajax({
            url: 'http://localhost/etneb/app/php/dashboard-send-search-userMF.php', 
            method:"POST",
            data:{etnebID:etnebID},

            success:function(data){
                $('#resultSearch').html(data);
            }
        });
    }
});