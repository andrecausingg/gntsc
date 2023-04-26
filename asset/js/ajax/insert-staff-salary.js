$(document).ready(function(){
    $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");

    // Prent type character
    $('.numDaysStaff, .rateStaff').keypress(function (e) {    
        var charCode = (e.which) ? e.which : event.keyCode    
        if (String.fromCharCode(charCode).match(/[^0-9.]/g))    
            return false;                        
    });  

    $('#numDaysStaff, #rateStaff').on('keyup propertychange paste', function(){
        var numDaysStaff = parseFloat($("#numDaysStaff").val()!=''?$("#numDaysStaff").val():0);
        var rateStaff = parseFloat($("#rateStaff").val()!=''?$("#rateStaff").val():0);

        // Computation
        var amount = numDaysStaff * rateStaff;

        // Displaying Total Remarks
        if(!isNaN(amount)){
            $("#amountStaff").val(amount);
        }
    });

    $('#formSalaryStaff').submit(function(e){
        e.preventDefault();

        var driverNameStaff = $(".driverNameStaff").val();
        var numDaysStaff = $(".numDaysStaff").val();
        var rateStaff = $(".rateStaff").val();
        var amountStaff = $(".amountStaff").val();

        console.log(driverNameStaff);
        console.log(numDaysStaff);
        console.log(rateStaff);

        // Error Functions
        errEmptyDriver();
        errEmptyDays();
        errEmptyRate();


        // Inserting Data on Database
        if(driverNameTrad != "" && numDaysStaff != "" && rateStaff != ""){

            $.ajax({
                url: './asset/php/main/insert-staff-salary.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    driverNameStaff:driverNameStaff,
                    numDaysStaff:numDaysStaff,
                    rateStaff:rateStaff,
                    amountStaff:amountStaff,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");
                        $("#formSalaryStaff").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyDriver(){
            if($(".driverNameStaff").val() == ""){
                $(".driverNameStaff").css('border', '1px solid red');
                $(".errDriverNameStaff").show();
            }else{
                $(".driverNameStaff").css('border', '1px solid black');
                $(".errDriverNameStaff").hide();
            }
        }

        function errEmptyDays(){
            if($(".numDaysStaff").val() == ""){
                $(".numDaysStaff").css('border', '1px solid red');
                $(".errNumDaysStaff").show();
            }else{
                $(".numDaysStaff").css('border', '1px solid black');
                $(".errNumDaysStaff").hide();
            }
        }

        function errEmptyRate(){
            if($(".rateStaff").val() == ""){
                $(".rateStaff").css('border', '1px solid red');
                $(".errRateStaff").show();
            }else{
                $(".rateStaff").css('border', '1px solid black');
                $(".errRateStaff").hide();
            }
        }
    });
});