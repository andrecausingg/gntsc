$(document).ready(function(){
    $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");
    $(document).on("submit", "#formDelete" , function(e){
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            $.ajax({
                url: './asset/php/main/delete-salary-trad.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});