$(document).ready(function(){
    console.log("Asdasd");    

    $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");
    $(document).on("submit", "#formDelete" , function(e){
        e.preventDefault();

        var dataId = $("#dataIdDelete").val();

        // Inserting Data on database
        if($("#dataIdDelete").val() != ""){
            $.ajax({
                url: './asset/php/main/delete-salary-staff.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Delete"){
                        $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");
                        $(".deleteContainer").hide();
                        $(".successDeleteContainer").show();
                        $('.successDeleteContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    });
});