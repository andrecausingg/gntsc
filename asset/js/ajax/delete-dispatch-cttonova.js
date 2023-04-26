$(document).ready(function(){
    $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
    $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");
    $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
    $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");

    $(document).on("submit", "#formDelete" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-dispatch-cttonova.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
                        $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");
                        $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
                        $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});