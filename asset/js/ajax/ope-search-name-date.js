$(document).ready(function(){
    $('#searchName, #startDate, #endDate').on('keyup change', function(){
        var searchName = $("#searchName").val();
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();

        $.ajax({
            url: './asset/php/main/ope-search-name-date.php', // Backend Script
            type: 'POST', // Type POST 
            data: { 
                searchName:searchName,
                startDate:startDate,
                endDate:endDate,
            },
            
            // Displaying the return message on Backend Script
            success: function (data){
                $(".staffDisplayOpe").html(data);
            }
        });
    });
});