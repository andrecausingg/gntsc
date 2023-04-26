$(document).ready(function(){
    $(".displaySalaryMpuj").load("./asset/php/main/display-salary.php");
    $(document).on("submit", "#formDelete" , function(e){
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            // console.log(dataId)

            $.ajax({
                url: './asset/php/main/delete-salary-mpuj-report.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Delete"){
                        $(".displaySalaryMpujReport").load("./asset/php/main/display-salary-mpuj-report.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});