$(document).ready(function () {
    $('.startDatePdf,.endDatePdf').change(function() {
        var startDate = $(".startDatePdf").val();
        var endDate = $(".endDatePdf").val();

        if(startDate != "" && endDate != ""){
            $(".btnFormSubmitButaw").show();
            $(".submitContainerFormPdf").show();
        }
    });
});