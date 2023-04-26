$(document).ready(function(){
    $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");

    // Prent type character
    // $(document).on("keypress propertychange paste", '.dailyButawTradEdit, .savingsTradEdit, .terminalFeeTradEdit, .monthlyButawTradEdit, .memberShipFeeTradEdit, .othersTradEdit' ,function(){
    //     var charCode = (e.which) ? e.which : event.keyCode    
    //     if (String.fromCharCode(charCode).match(/[^0-9.]/g))    
    //         return false;                        
    // });  

    $(document).on("keyup propertychange paste", '#dailyButawTradEdit,#savingsTradEdit,#terminalFeeTradEdit,#monthlyButawTradEdit,#memberShipFeeTradEdit,#othersTradEdit' ,function(){
        var dailyButawTrad = parseFloat($("#dailyButawTradEdit").val()!=''?$("#dailyButawTradEdit").val():0);
        var savingsTrad = parseFloat($("#savingsTradEdit").val()!=''?$("#savingsTradEdit").val():0);
        var terminalFeeTrad = parseFloat($("#terminalFeeTradEdit").val()!=''?$("#terminalFeeTradEdit").val():0);
        var monthlyButawTrad = parseFloat($("#monthlyButawTradEdit").val()!=''?$("#monthlyButawTradEdit").val():0);
        var memberShipFeeTrad = parseFloat($("#memberShipFeeTradEdit").val()!=''?$("#memberShipFeeTradEdit").val():0);
        var othersTrad = parseFloat($("#othersTradEdit").val()!=''?$("#othersTradEdit").val():0);

        // Computation
        var totalRemarksTrad = dailyButawTrad + savingsTrad + terminalFeeTrad + monthlyButawTrad + memberShipFeeTrad + othersTrad;

        // Displaying Total Remarks     
        if(!isNaN(totalRemarksTrad)){
            $("#totalRemarksTradEdit").val(totalRemarksTrad);
        }
    });

    $(document).on("submit", "#formSalaryTradEdit" , function(e) {
        e.preventDefault();

        var dataIdTradEdit = $(".dataIdEditTrad").val();
        var plateNumTradEdit = $(".plateNumTradEdit").val();
        var dailyButawTradEdit = parseFloat($(".dailyButawTradEdit").val());
        var savingsTradEdit = parseFloat($(".savingsTradEdit").val());
        var terminalFeeTradEdit = parseFloat($(".terminalFeeTradEdit").val());
        var monthlyButawTradEdit = parseFloat($(".monthlyButawTradEdit").val());
        var memberShipFeeTradEdit = parseFloat($(".memberShipFeeTradEdit").val());
        var othersTradEdit = parseFloat($(".othersTradEdit").val());
        var totalRemarksTradEdit = parseFloat($(".totalRemarksTradEdit").val());

        // Error Functions
        errEmptyPlate();
        errEmptyDailyButaw();
        errEmptySavings();
        errEmptyTerminalFee();
        errEmptyMonthlyButaw();
        errEmptyMemberShipFeeTradEdit();
        errEmptyOthers();

        // Inserting Data on Database
        if(totalRemarksTradEdit != ""){
            $.ajax({
                url: './asset/php/main/edit-salary-trad.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataIdTradEdit:dataIdTradEdit,
                    plateNumTradEdit:plateNumTradEdit,
                    dailyButawTradEdit:dailyButawTradEdit,
                    savingsTradEdit:savingsTradEdit,
                    terminalFeeTradEdit:terminalFeeTradEdit,
                    monthlyButawTradEdit:monthlyButawTradEdit,
                    memberShipFeeTradEdit:memberShipFeeTradEdit,
                    totalRemarksTrad:totalRemarksTradEdit,
                    othersTradEdit:othersTradEdit,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Update"){
                        $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                        $("#saveTradSalaryBtnEdit").hide();
                        $(".salaryTradComputeEdit").hide();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyPlate(){
            if($(".plateNumTradEdit").val() == ""){
                $(".plateNumTradEdit").css('border', '1px solid red');
                $(".errPlateNumTradEdit").show();
            }else{
                $(".plateNumTradEdit").css('border', '1px solid black');
                $(".errPlateNumTradEdit").hide();
            }
        }

        function errEmptyDailyButaw(){
            if($(".dailyButawTradEdit").val() == ""){
                $(".dailyButawTradEdit").css('border', '1px solid red');
                $(".errdailyButawTradEdit").show();
            }else{
                $(".dailyButawTradEdit").css('border', '1px solid black');
                $(".errdailyButawTradEdit").hide();
            }
        }

        function errEmptySavings(){
            if($(".savingsTradEdit").val() == ""){
                $(".savingsTradEdit").css('border', '1px solid red');
                $(".errsavingsTradEdit").show();
            }else{
                $(".savingsTradEdit").css('border', '1px solid black');
                $(".errsavingsTradEdit").hide();
            }
        }

        function errEmptyTerminalFee(){
            if($(".terminalFeeTradEdit").val() == ""){
                $(".terminalFeeTradEdit").css('border', '1px solid red');
                $(".errterminalFeeTradEdit").show();
            }else{
                $(".terminalFeeTradEdit").css('border', '1px solid black');
                $(".errterminalFeeTradEdit").hide();
            }
        }

        function errEmptyMonthlyButaw(){
            if($(".monthlyButawTradEdit").val() == ""){
                $(".monthlyButawTradEdit").css('border', '1px solid red');
                $(".errmonthlyButawTradEdit").show();
            }else{
                $(".monthlyButawTradEdit").css('border', '1px solid black');
                $(".errmonthlyButawTradEdit").hide();
            }
        }

        function errEmptyMemberShipFeeTradEdit(){
            if($(".memberShipFeeTradEdit").val() == ""){
                $(".memberShipFeeTradEdit").css('border', '1px solid red');
                $(".errmemberShipFeeTradEdit").show();
            }else{
                $(".memberShipFeeTradEdit").css('border', '1px solid black');
                $(".errmemberShipFeeTradEdit").hide();
            }
        }

        function errEmptyOthers(){
            if($(".othersTradEdit").val() == ""){
                $(".othersTradEdit").css('border', '1px solid red');
                $(".errothersTradEdit").show();
            }else{
                $(".othersTradEdit").css('border', '1px solid black');
                $(".errothersTradEdit").hide();
            }
        }
    });
});