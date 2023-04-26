$(document).ready(function(){
    $(".displaySalaryMpuj").load("./asset/php/main/display-salary.php");
    
    // $('#cashMpuj,#expensesMpuj,#boundaryMpuj,#dieselMpuj').on('input propertychange paste', function(){
    $(document).on("keyup propertychange paste", '.roundsMpujOneEdit,.roundsMpujTwoEdit,.roundsMpujThreeEdit,.roundsMpujFourEdit,.roundsMpujFiveEdit,.roundsMpujSixEdit,.expensesMpujEdit,.boundaryMpujEdit,.dieselMpujEdit' ,function(){
        var roundsMpujOne = parseFloat($(".roundsMpujOneEdit").val()!=''?$(".roundsMpujOneEdit").val():0);
        var roundsMpujTwo = parseFloat($(".roundsMpujTwoEdit").val()!=''?$(".roundsMpujTwoEdit").val():0);
        var roundsMpujThree = parseFloat($(".roundsMpujThreeEdit").val()!=''?$(".roundsMpujThreeEdit").val():0);
        var roundsMpujFour = parseFloat($(".roundsMpujFourEdit").val()!=''?$(".roundsMpujFourEdit").val():0);
        var roundsMpujFive = parseFloat($(".roundsMpujFiveEdit").val()!=''?$(".roundsMpujFiveEdit").val():0);
        var roundsMpujSix = parseFloat($(".roundsMpujSixEdit").val()!=''?$(".roundsMpujSixEdit").val():0);
        var expensesMpuj = parseInt($(".expensesMpujEdit").val()!=''?$(".expensesMpujEdit").val():0);
        var boundaryMpuj = parseInt($(".boundaryMpujEdit").val()!=''?$(".boundaryMpujEdit").val():0);
        var dieselMpuj = parseInt($(".dieselMpujEdit").val()!=''?$(".dieselMpujEdit").val():0);

        // console.log(roundsMpujOne);
        // console.log(roundsMpujTwo);
        // console.log(roundsMpujThree);
        // console.log(roundsMpujFour);
        // console.log(roundsMpujFive);
        // console.log(roundsMpujSix);
        

        var cashMpuj = roundsMpujOne + roundsMpujTwo + roundsMpujThree + roundsMpujFour + roundsMpujFive + roundsMpujSix;
        var handHeld = cashMpuj + expensesMpuj;
        var totalAmountHBD = handHeld - (boundaryMpuj + dieselMpuj);
        var paoIncomeDec = totalAmountHBD * .45;
        var pujIncomeDec = totalAmountHBD * .55;
        var paoIncome = paoIncomeDec.toFixed(2);
        var pujIncome = pujIncomeDec.toFixed(2);

        if(!isNaN(cashMpuj) && !isNaN(totalAmountHBD) && !isNaN(paoIncome) && !isNaN(pujIncome)){
            $("#cashMpujEdit").val(cashMpuj);
            $("#handHeldMpujEdit").val(handHeld);
            $("#totalAmountMpujEdit").val(totalAmountHBD);
            $("#driverIncomeMpujEdit").val(pujIncome);
            $("#paoIncomeMpujEdit").val(paoIncome);
        }
    });

    $(document).on("submit", "#formMpujSalaryEdit" , function(e) {
        e.preventDefault();

        var dataIdMpuj = $("#dataIdMpujEdit").val();
        var roundsMpujOneEdit = $(".roundsMpujOneEdit").val();
        var roundsMpujTwoEdit = $(".roundsMpujTwoEdit").val();
        var roundsMpujThreeEdit = $(".roundsMpujThreeEdit").val();
        var roundsMpujFourEdit = $(".roundsMpujFourEdit").val();
        var roundsMpujFiveEdit = $(".roundsMpujFiveEdit").val();
        var roundsMpujSixEdit = $(".roundsMpujSixEdit").val();
        var cashMpujEdit = $(".cashMpujEdit").val();
        var expensesMpujEdit = $(".expensesMpujEdit").val();
        var boundaryMpujEdit = $(".boundaryMpujEdit").val();
        var dieselMpujEdit = $(".dieselMpujEdit").val();
        var handHeldMpujEdit = $(".handHeldMpujEdit").val();
        var totalAmountMpujEdit = $(".totalAmountMpujEdit").val();
        var driverIncomeMpujEdit = $(".driverIncomeMpujEdit").val();
        var paoIncomeMpujEdit = $(".paoIncomeMpujEdit").val();

        // Error Functions
        errEmptyRounds();
        errEmptyExpenses();
        errEmptyBoundary();
        errEmptyDesiel();

        if(cashMpujEdit != "" && expensesMpujEdit != "" && boundaryMpujEdit != "" && dieselMpujEdit != "" && handHeldMpujEdit != "" && totalAmountMpujEdit != "" && driverIncomeMpujEdit !="" && paoIncomeMpujEdit != ""){
            
            $.ajax({
                url: './asset/php/main/edit-salary-mpuj.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataIdMpuj:dataIdMpuj,
                    roundsMpujOne:roundsMpujOneEdit,
                    roundsMpujTwo:roundsMpujTwoEdit,
                    roundsMpujThree:roundsMpujThreeEdit,
                    roundsMpujFour:roundsMpujFourEdit,
                    roundsMpujFive:roundsMpujFiveEdit,
                    roundsMpujSix:roundsMpujSixEdit,
                    cashMpuj:cashMpujEdit,
                    expensesMpuj:expensesMpujEdit,
                    handHeldMpuj:handHeldMpujEdit,
                    boundaryMpuj:boundaryMpujEdit,
                    dieselMpuj:dieselMpujEdit,
                    paoIncome:paoIncomeMpujEdit,
                    pujIncome:driverIncomeMpujEdit,
                    totalAmountMpuj:totalAmountMpujEdit,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    if(data == "Success Update"){
                        $(".displaySalaryMpuj").load("./asset/php/main/display-salary.php");
                        $(".salaryMpujComputeEdit").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                        $(".saveEditMpuj").hide();
                    }
                }
            });
        }
        
        // Error Function
        function errEmptyRounds(){
            if($(".roundMpujEdit").val() == ""){
                $(".roundMpujEdit").css('border', '1px solid red');
                $(".errRoundMpujEdit").show();
            }else{
                $(".roundMpujEdit").css('border', '1px solid black');
                $(".errRoundMpujEdit").hide();
            }
        }

        function errEmptyCash(){
            if($(".cashMpujEdit").val() == ""){
                $(".cashMpujEdit").css('border', '1px solid red');
                $(".errCashMpujEdit").show();
            }else{
                $(".cashMpujEdit").css('border', '1px solid black');
                $(".errCashMpujEdit").hide();
            }
        }

        function errEmptyExpenses(){
            if($(".expensesMpujEdit").val() == ""){
                $(".expensesMpujEdit").css('border', '1px solid red');
                $(".errExpensesMpujEdit").show();
            }else{
                $(".expensesMpujEdit").css('border', '1px solid black');
                $(".errExpensesMpujEdit").hide();
            }
        }

        function errEmptyBoundary(){
            if($(".boundaryMpujEdit").val() == ""){
                $(".boundaryMpujEdit").css('border', '1px solid red');
                $(".errBoundaryMpujEdit").show();
            }else{
                $(".boundaryMpujEdit").css('border', '1px solid black');
                $(".errBoundaryMpujEdit").hide();
            }
        }

        function errEmptyDesiel(){
            if($(".dieselMpujEdit").val() == ""){
                $(".dieselMpujEdit").css('border', '1px solid red');
                $(".errDieselMpujEdit").show();
            }else{
                $(".dieselMpujEdit").css('border', '1px solid black');
                $(".errDieselMpujEdit").hide();
            }
        }
    });
});