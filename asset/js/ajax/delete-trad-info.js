$(document).ready(function(){
    $(".displayTrad").load("./asset/php/main/display-trad-info.php");

    $(document).on("submit", "#formDelete" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-trad-info.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".displayTrad").load("./asset/php/main/display-trad-info.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});