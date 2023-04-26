$(document).ready(function(){
    $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");

    // Prent type character
    $('.dailyButawTrad, .savingsTrad, .terminalFeeTrad, .monthlyButawTrad, .memberShipFeeTrad, .othersTrad').keypress(function (e) {    
        var charCode = (e.which) ? e.which : event.keyCode    
        if (String.fromCharCode(charCode).match(/[^0-9.]/g))    
            return false;                        
    });  

    $('#dailyButawTrad, #savingsTrad, #terminalFeeTrad, #monthlyButawTrad, #memberShipFeeTrad, #othersTrad').on('keyup propertychange paste', function(){

        var dailyButawTrad = parseFloat($("#dailyButawTrad").val()!=''?$("#dailyButawTrad").val():0);
        var savingsTrad = parseFloat($("#savingsTrad").val()!=''?$("#savingsTrad").val():0);
        var terminalFeeTrad = parseFloat($("#terminalFeeTrad").val()!=''?$("#terminalFeeTrad").val():0);
        var monthlyButawTrad = parseFloat($("#monthlyButawTrad").val()!=''?$("#monthlyButawTrad").val():0);
        var memberShipFeeTrad = parseFloat($("#memberShipFeeTrad").val()!=''?$("#memberShipFeeTrad").val():0);
        var othersTrad = parseFloat($("#othersTrad").val()!=''?$("#othersTrad").val():0);

        // Computation
        var totalRemarksTrad = dailyButawTrad + savingsTrad + terminalFeeTrad + monthlyButawTrad + memberShipFeeTrad + othersTrad;

        // Displaying Total Remarks
        if(!isNaN(totalRemarksTrad)){
            $("#totalRemarksTrad").val(totalRemarksTrad);
        }
    });

    $('#formSalaryTrad').submit(function(e){
        e.preventDefault();

        var driverNameTrad = $(".driverNameTrad").val();
        var plateNumTrad = $(".plateNumTrad").val();
        var dailyButawTrad = $(".dailyButawTrad").val();
        var savingsTrad = $(".savingsTrad").val();
        var terminalFeeTrad = $(".terminalFeeTrad").val();
        var monthlyButawTrad = $(".monthlyButawTrad").val();
        var memberShipFeeTrad = $(".memberShipFeeTrad").val();
        var othersTrad = $(".othersTrad").val();
        var totalRemarksTrad = $(".totalRemarksTrad").val();

        // var driverNameTrad = $("#driverNameTrad").val();
        // var plateNumTrad = $("#plateNumTrad").val();
        // var dailyButawTrad = parseFloat($("#dailyButawTrad").val());
        // var savingsTrad = parseFloat($("#savingsTrad").val());
        // var terminalFeeTrad = parseFloat($("#terminalFeeTrad").val());
        // var monthlyButawTrad = parseFloat($("#monthlyButawTrad").val());
        // var memberShipFeeTrad = parseFloat($("#memberShipFeeTrad").val());
        // var othersTrad = parseFloat($("#othersTrad").val());

        // Computation
        // var totalRemarksTrad = dailyButawTrad + savingsTrad + terminalFeeTrad + monthlyButawTrad + memberShipFeeTrad + othersTrad;

        // Error Functions
        errEmptyDriver();
        errEmptyPlate();
        errEmptyDailyButaw();
        errEmptySavings();
        errEmptyTerminalFee();
        errEmptyMonthlyButaw();
        errEmptyMemberShipFeeTrad();
        errEmptyOthers();

        // Displaying Total Remarks
        // if(!isNaN(totalRemarksTrad)){
        //     $("#totalRemarksTrad").val(totalRemarksTrad);
        // }

        // Inserting Data on Database
        if(driverNameTrad != "" && plateNumTrad != "" && dailyButawTrad != "" && savingsTrad != "" && terminalFeeTrad != "" && monthlyButawTrad != "" && memberShipFeeTrad != "" && othersTrad != "" && totalRemarksTrad != ""){

            $.ajax({
                url: './asset/php/main/insert-trad-salary.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    driverNameTrad:driverNameTrad,
                    plateNumTrad:plateNumTrad,
                    dailyButawTrad:dailyButawTrad,
                    savingsTrad:savingsTrad,
                    terminalFeeTrad:terminalFeeTrad,
                    monthlyButawTrad:monthlyButawTrad,
                    memberShipFeeTrad:memberShipFeeTrad,
                    othersTrad:othersTrad,
                    totalRemarksTrad:totalRemarksTrad,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayTradSalary").load("./asset/php/main/display-salary-trad.php");
                        $("#formSalaryTrad").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyDriver(){
            if($(".driverNameTrad").val() == ""){
                $(".driverNameTrad").css('border', '1px solid red');
                $(".errDriverNameTrad").show();
            }else{
                $(".driverNameTrad").css('border', '1px solid black');
                $(".errDriverNameTrad").hide();
            }
        }

        function errEmptyPlate(){
            if($(".plateNumTrad").val() == ""){
                $(".plateNumTrad").css('border', '1px solid red');
                $(".errPlateNumTrad").show();
            }else{
                $(".plateNumTrad").css('border', '1px solid black');
                $(".errPlateNumTrad").hide();
            }
        }

        function errEmptyDailyButaw(){
            if($(".dailyButawTrad").val() == ""){
                $(".dailyButawTrad").css('border', '1px solid red');
                $(".errdailyButawTrad").show();
            }else{
                $(".dailyButawTrad").css('border', '1px solid black');
                $(".errdailyButawTrad").hide();
            }
        }

        function errEmptySavings(){
            if($(".savingsTrad").val() == ""){
                $(".savingsTrad").css('border', '1px solid red');
                $(".errsavingsTrad").show();
            }else{
                $(".savingsTrad").css('border', '1px solid black');
                $(".errsavingsTrad").hide();
            }
        }

        function errEmptyTerminalFee(){
            if($(".terminalFeeTrad").val() == ""){
                $(".terminalFeeTrad").css('border', '1px solid red');
                $(".errterminalFeeTrad").show();
            }else{
                $(".terminalFeeTrad").css('border', '1px solid black');
                $(".errterminalFeeTrad").hide();
            }
        }

        function errEmptyMonthlyButaw(){
            if($(".monthlyButawTrad").val() == ""){
                $(".monthlyButawTrad").css('border', '1px solid red');
                $(".errmonthlyButawTrad").show();
            }else{
                $(".monthlyButawTrad").css('border', '1px solid black');
                $(".errmonthlyButawTrad").hide();
            }
        }

        function errEmptyMemberShipFeeTrad(){
            if($(".memberShipFeeTrad").val() == ""){
                $(".memberShipFeeTrad").css('border', '1px solid red');
                $(".errmemberShipFeeTrad").show();
            }else{
                $(".memberShipFeeTrad").css('border', '1px solid black');
                $(".errmemberShipFeeTrad").hide();
            }
        }

        function errEmptyOthers(){
            if($(".othersTrad").val() == ""){
                $(".othersTrad").css('border', '1px solid red');
                $(".errothersTrad").show();
            }else{
                $(".othersTrad").css('border', '1px solid black');
                $(".errothersTrad").hide();
            }
        }
    });
});