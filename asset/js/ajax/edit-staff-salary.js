$(document).ready(function(){
    $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");

    // Prent type character
    $('.numDaysStaffEdit, .rateStaffEdit').keypress(function (e) {    
        var charCode = (e.which) ? e.which : event.keyCode    
        if (String.fromCharCode(charCode).match(/[^0-9.]/g))    
            return false;                        
    });

    $(document).on("keyup propertychange paste", '#numDaysStaffEdit, #rateStaffEdit',function(){
    // $('#numDaysStaffEdit, #rateStaffEdit').on('keyup propertychange paste', function(){
        var numDaysStaff = parseFloat($("#numDaysStaffEdit").val()!=''?$("#numDaysStaffEdit").val():0);
        var rateStaff = parseFloat($("#rateStaffEdit").val()!=''?$("#rateStaffEdit").val():0);

        // Computation
        var amount = numDaysStaff * rateStaff;

        // Displaying Total Remarks
        if(!isNaN(amount)){
            $("#amountStaffEdit").val(amount);
        }
    });

    $(document).on("submit", "#formSalaryStaffEdit" , function(e) {
        e.preventDefault();
        
        var dataId = $(".dataIdEditStaff").val();
        var numDaysStaffEdit = parseFloat($(".numDaysStaffEdit").val());
        var rateStaffEdit = parseFloat($(".rateStaffEdit").val());
        var amountStaffEdit = parseFloat($(".amountStaffEdit").val());

        errEmptyDays();
        errEmptyRate();

        // Inserting Data on Database
        if(numDaysStaff != "" && rateStaff != ""){
            $.ajax({
                url: './asset/php/main/edit-salary-staff.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId ,
                    numDaysStaff: numDaysStaffEdit ,
                    rateStaff: rateStaffEdit ,
                    amountStaff: amountStaffEdit ,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    // console.log(data);
                    if(data == "Success Update"){
                        $(".displayStaffSalary").load("./asset/php/main/display-salary-staff.php");
                        $(".editStaffContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        function errEmptyDays(){
            if($(".numDaysStaffEdit").val() == ""){
                $(".numDaysStaffEdit").css('border', '1px solid red');
                $(".errNumDaysStaffEdit").show();
            }else{
                $(".numDaysStaffEdit").css('border', '1px solid black');
                $(".errNumDaysStaffEdit").hide();
            }
        }
    
        function errEmptyRate(){
            if($(".rateStaffEdit").val() == ""){
                $(".rateStaffEdit").css('border', '1px solid red');
                $(".errRateStaffEdit").show();
            }else{
                $(".rateStaffEdit").css('border', '1px solid black');
                $(".errRateStaffEdit").hide();
            }
        }
    });
});