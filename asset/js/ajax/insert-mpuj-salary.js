$(document).ready(function(){
    $(".displaySalaryMpuj").load("./asset/php/main/display-salary.php");

    $('#roundsMpujOne, #roundsMpujTwo, #roundsMpujThree, #roundsMpujFour, #roundsMpujFive, #roundsMpujSix, #expensesMpuj,#boundaryMpuj,#dieselMpuj').on('keyup propertychange paste', function(){
        var roundsMpujOne = parseFloat($("#roundsMpujOne").val()!=''?$("#roundsMpujOne").val():0);
        var roundsMpujTwo = parseFloat($("#roundsMpujTwo").val()!=''?$("#roundsMpujTwo").val():0);
        var roundsMpujThree = parseFloat($("#roundsMpujThree").val()!=''?$("#roundsMpujThree").val():0);
        var roundsMpujFour = parseFloat($("#roundsMpujFour").val()!=''?$("#roundsMpujFour").val():0);
        var roundsMpujFive = parseFloat($("#roundsMpujFive").val()!=''?$("#roundsMpujFive").val():0);
        var roundsMpujSix = parseFloat($("#roundsMpujSix").val()!=''?$("#roundsMpujSix").val():0);
        
        var expensesMpuj = parseFloat($("#expensesMpuj").val()!=''?$("#expensesMpuj").val():0);
        var boundaryMpuj = parseFloat($("#boundaryMpuj").val()!=''?$("#boundaryMpuj").val():0);
        var dieselMpuj = parseFloat($("#dieselMpuj").val()!=''?$("#dieselMpuj").val():0);

        var cashMpuj = + roundsMpujOne + roundsMpujTwo + roundsMpujThree + roundsMpujFour + roundsMpujFive + roundsMpujSix;
        var handHeld = cashMpuj + expensesMpuj;
        var totalAmountHBD = handHeld - (boundaryMpuj + dieselMpuj);
        var paoIncomeDec = totalAmountHBD * .45;
        var pujIncomeDec = totalAmountHBD * .55;
        var paoIncome = paoIncomeDec.toFixed(2);
        var pujIncome = pujIncomeDec.toFixed(2);
        
        if(!isNaN(cashMpuj) && !isNaN(totalAmountHBD) && !isNaN(paoIncome) && !isNaN(pujIncome)){
            $("#cashMpuj").val(cashMpuj);
            $("#handHeld").val(handHeld);
            $("#totalAmountMpuj").val(totalAmountHBD);
            $("#driverIncomeMpuj").val(pujIncome);
            $("#paoIncomeMpuj").val(paoIncome);
        }
    });

    $('#formMpujSalary').submit(function(e){
        e.preventDefault();

        var driverMpuj = $(".driverMpuj").val();
        var paoMpuj = $(".paoMpuj").val();
        var roundsMpujOne = $(".roundsMpujOne").val();
        var roundsMpujTwo = $(".roundsMpujTwo").val();
        var roundsMpujThree = $(".roundsMpujThree").val();
        var roundsMpujFour = $(".roundsMpujFour").val();
        var roundsMpujFive = $(".roundsMpujFive").val();
        var roundsMpujSix = $(".roundsMpujSix").val();
        var cashMpuj = $(".cashMpuj").val();
        var expensesMpuj = $(".expensesMpuj").val();
        var boundaryMpuj = $(".boundaryMpuj").val();
        var dieselMpuj = $(".dieselMpuj").val();
        var handHeldMpuj = $(".handHeldMpuj").val();
        var totalAmountMpuj = $(".totalAmountMpuj").val();
        var driverIncomeMpuj = $(".driverIncomeMpuj").val();
        var paoIncomeMpuj = $(".paoIncomeMpuj").val();

        // Error Functions
        errEmptyDriver();
        errEmptyPao();
        errEmptyRounds();
        errEmptyExpenses();
        errEmptyBoundary();
        errEmptyDesiel();

        // // Displaying Income
        // if(!isNaN(totalAmountHBD) && !isNaN(paoIncome) && !isNaN(pujIncome)){
        //     $("#handHeld").val(handHeld);
        //     $("#totalAmountMpuj").val(totalAmountHBD);
        //     $("#driverIncomeMpuj").val(pujIncome);
        //     $("#paoIncomeMpuj").val(paoIncome);
        // }

        // // Inserting Data on Database
        if(driverMpuj != "" && paoMpuj != ""){
            console.log("Driver: " + driverMpuj);
            console.log("Pao: " + paoMpuj);
            console.log("roundsMpujOne: " + roundsMpujOne);
            console.log("roundsMpujTwo: " + roundsMpujTwo);
            console.log("roundsMpujThree: " + roundsMpujThree);
            console.log("roundsMpujFour: " + roundsMpujFour);
            console.log("roundsMpujFive: " + roundsMpujFive);
            console.log("roundsMpujSix: " + roundsMpujSix);
            console.log("cashMpuj: " + cashMpuj);
            console.log("expensesMpuj: " + expensesMpuj);
            console.log("boundaryMpuj: " + boundaryMpuj);
            console.log("dieselMpuj: " + dieselMpuj);
            console.log("handHeldMpuj: " + handHeldMpuj);
            console.log("totalAmountMpuj: " + totalAmountMpuj);
            console.log("driverIncomeMpuj: " + driverIncomeMpuj);
            console.log("paoIncomeMpuj: " + paoIncomeMpuj);


            if(roundsMpujOne == null){
                roundsMpujOne = 0;
            }

            if(roundsMpujTwo == null){
                roundsMpujTwo = 0;
            }

            if(roundsMpujThree == null){
                roundsMpujThree = 0;
            }

            if(roundsMpujFour == null){
                roundsMpujFour = 0;
            }

            if(roundsMpujFive == null){
                roundsMpujFive = 0;
            }

            if(roundsMpujSix == null){
                roundsMpujSix = 0;
            }

            $.ajax({
                url: './asset/php/main/insert-mpuj-salary.php', // Backend Script
                type: 'POST', // Type POST 
                async: false,
                data: { 
                    driverNameMpuj:driverMpuj,
                    paoNameMpuj:paoMpuj,
                    roundsMpujOne:roundsMpujOne,
                    roundsMpujTwo:roundsMpujTwo,
                    roundsMpujThree:roundsMpujThree,
                    roundsMpujFour:roundsMpujFour,
                    roundsMpujFive:roundsMpujFive,
                    roundsMpujSix:roundsMpujSix,
                    cashMpuj:cashMpuj,
                    expensesMpuj:expensesMpuj,
                    handHeldMpuj:handHeldMpuj,
                    boundaryMpuj:boundaryMpuj,
                    dieselMpuj:dieselMpuj,
                    paoIncome:paoIncomeMpuj,
                    pujIncome:driverIncomeMpuj,
                    totalAmountMpuj:totalAmountMpuj,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Insert"){
                        $(".displaySalaryMpuj").load("./asset/php/main/display-salary.php");
                        $("#formMpujSalary").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                        $(".saveMpuj").hide();
                    }
                }
            });
        }

        // Error Function
        function errEmptyDriver(){
            if($(".driverMpuj").val() == ""){
                $(".driverMpuj").css('border', '1px solid red');
                $(".errDriverNameMpuj").show();
            }else{
                $(".driverMpuj").css('border', '1px solid black');
                $(".errDriverNameMpuj").hide();
            }
        }

        function errEmptyPao(){
            if($(".paoMpuj").val() == ""){
                $(".paoMpuj").css('border', '1px solid red');
                $(".errPaoNameMpuj").show();
            }else{
                $(".paoMpuj").css('border', '1px solid black');
                $(".errPaoNameMpuj").hide();
            }
        }

        function errEmptyRounds(){
            if($(".roundMpuj").val() == ""){
                $(".roundMpuj").css('border', '1px solid red');
                $(".errRoundMpuj").show();
            }else{
                $(".roundMpuj").css('border', '1px solid black');
                $(".errRoundMpuj").hide();
            }
        }

        function errEmptyCash(){
            if($(".cashMpuj").val() == ""){
                $(".cashMpuj").css('border', '1px solid red');
                $(".errCashMpuj").show();
            }else{
                $(".cashMpuj").css('border', '1px solid black');
                $(".errCashMpuj").hide();
            }
        }

        function errEmptyExpenses(){
            if($(".expensesMpuj").val() == ""){
                $(".expensesMpuj").css('border', '1px solid red');
                $(".errExpensesMpuj").show();
            }else{
                $(".expensesMpuj").css('border', '1px solid black');
                $(".errExpensesMpuj").hide();
            }
        }

        function errEmptyBoundary(){
            if($(".boundaryMpuj").val() == ""){
                $(".boundaryMpuj").css('border', '1px solid red');
                $(".errBoundaryMpuj").show();
            }else{
                $(".boundaryMpuj").css('border', '1px solid black');
                $(".errBoundaryMpuj").hide();
            }
        }

        function errEmptyDesiel(){
            if($(".dieselMpuj").val() == ""){
                $(".dieselMpuj").css('border', '1px solid red');
                $(".errDieselMpuj").show();
            }else{
                $(".dieselMpuj").css('border', '1px solid black');
                $(".errDieselMpuj").hide();
            }
        }
    });
   

});