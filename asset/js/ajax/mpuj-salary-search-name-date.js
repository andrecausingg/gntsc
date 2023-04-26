$(document).ready(function(){
    $('#driverNameMpujSearch, #paoMpujSearch, #startDate, #endDate').on('change', function(){
        var mpuj = $("#driverNameMpujSearch").val();
        var pao = $("#paoMpujSearch").val();
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();

        console.log(mpuj);
        console.log(pao);

        $.ajax({
            url: './asset/php/main/mpuj-salary-search-name-date.php', // Backend Script
            type: 'POST', // Type POST 
            data: { 
                mpuj:mpuj,
                pao:pao,
                startDate:startDate,
                endDate:endDate,
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                $(".displaySalaryMpuj").html(data);
            }
        });
    });
});