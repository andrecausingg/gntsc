$(document).ready(function(){
    $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
    $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
    $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
    $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
    $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");

    $(document).on("submit", "#formDelete" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-staff-all.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
                        $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
                        $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
                        $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
                        $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});