$(document).ready(function(){
    $("#currentDate").html(GetTodayDate());

    function GetTodayDate() {
        // var tdate = new Date();
        // var dd = tdate.getDate(); //yields day
        // var MM = tdate.getMonth(); //yields month
        // var yyyy = tdate.getFullYear(); //yields year
        // var currentDate= dd + "-" +( MM+1) + "-" + yyyy;
        const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

        var currentdate = new Date(); 
        var datetime = month[(currentdate.getMonth())] + " "
                    + currentdate.getDate()  + " " 
                    + currentdate.getFullYear() + " |"  
                    + currentdate.toLocaleTimeString() + " " 
        return datetime;
     }

    $(".datePicker").datetimepicker({
        format:"d/m/y h:i a",
        formatTime:"h:i a",
        step:05,
        validateOnBlur:false
    });
});

