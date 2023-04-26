$(document).ready(function(){
    $(".displaySalaryMpujReport").load("./asset/php/main/display-salary-mpuj-report.php");

    $('#driverNameMpuj,#paoNameMpuj,#dateNow').change(function() {
        var driverNameMpuj = $("#driverNameMpuj").val();
        var paoNameMpuj = $("#paoNameMpuj").val();
        var dateNow = $("#dateNow").val();

        // Date Explode
        var dateNowExp = dateNow; 
        var result=dateNowExp.split('-');
        var yearNow = result[0];
        var monthNow = result[1];
        var dayNow = result[2];
        var finalDateNow = dayNow + "/" + monthNow + "/" + yearNow;

        $.ajax({
            url: './asset/php/main/display-salary-mpuj-report-checkbox.php', // Backend Script
            type: 'POST', // Type POST 
            async: false,
            data: { 
                driverNameMpuj:driverNameMpuj,
                paoNameMpuj:paoNameMpuj,
                finalDateNow:finalDateNow,
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                // console.log(data);
                $(".displaySalaryMpujReportInsert").html(data);
            }
        });
        

    });

    $('#formMpujSalaryReport').submit(function(e){
        e.preventDefault();
        var arr = [];
        var i = 0;

        $('.selectSalaryReport:checked').each(function () {
            arr[i++] = $(this).val();
            if(arr[6]){
                $(".alertSixRounds").show();
            }
        });

        var roundOne = arr[0];
        var roundTwo = arr[1];
        var roundThree = arr[2];
        var roundFour = arr[3];
        var roundFive = arr[4];
        var roundSix = arr[5];


        if(!arr[6] || arr[0] <= arr[5]){
            if(roundSix == null || roundSix == undefined){
                roundSix  = 0;
            }

            if(roundFive == null || roundFive == undefined){
                roundFive  = 0;
            }

            if(roundFour == null || roundFour == undefined){
                roundFour  = 0;
            }

            if(roundThree == null || roundThree == undefined){
                roundThree  = 0;
            }

            if(roundTwo == null || roundTwo == undefined){
                roundTwo  = 0;
            }

            if(roundOne == null || roundOne == undefined){
                roundOne  = 0;
            }

            // console.log(roundOne);
            // console.log(roundTwo);
            // console.log(roundThree);
            // console.log(roundFour);
            // console.log(roundFive);
            // console.log(roundSix);

            $.ajax({
                url: './asset/php/main/insert-mpuj-salary-report.php', // Backend Script
                type: 'POST', // Type POST 
                async: false,
                data: { 
                    roundOne:roundOne,
                    roundTwo:roundTwo,
                    roundThree:roundThree,
                    roundFour:roundFour,
                    roundFive:roundFive,
                    roundSix:roundSix,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displaySalaryMpujReport").load("./asset/php/main/display-salary-mpuj-report.php");
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                        $(".saveMpuj").hide();
                    }
                }
            });
        }
    });
});