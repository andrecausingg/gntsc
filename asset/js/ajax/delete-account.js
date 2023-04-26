$(document).ready(function(){
    $(".displayAccounts").load("./asset/php/main/display-accounts.php");

    $(document).on("submit", "#formDelete" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-account.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".displayAccounts").load("./asset/php/main/display-accounts.php");

                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});