$(document).ready(function(){
    // Staff Btn
    $("#btnPuj").click(function(){
        $("#addPujContainer").fadeIn()
        $("#addPujContainer").show();
    });

    $("#btnPao").click(function(){
        $("#addPaoContainer").fadeIn()
        $("#addPaoContainer").show();
    });

    $("#btnIns").click(function(){
        $("#addInsContainer").fadeIn()
        $("#addInsContainer").show();
    });

    //  Close btn in Inserting Container
    $(".closeBtn").click(function(){
        // Puj Pao Ins 
        $("#addPujContainer").hide();
        $("#addPaoContainer").hide();
        $("#addInsContainer").hide();

        // Salary
        $("#salaryMpujCompute").hide();
        $("#salaryTradCompute").hide();

        // Create Account
        $("#createAccountContainer").hide();

        // Dispatch
        $("#dispatchContainerCtToNova").hide();
        $("#dispatchContainerNovaToCt").hide();

        // Butaw
        $(".butawFormPdfContainer").hide();
        
        // Mpuj
        $(".mpujFormPdfContainer").hide();

        $(".mpujSalaryReportFormPdfContainer").hide();

        // Staff
        $("#salaryStaffCompute").hide();
        
        // Account
        $(".createAccountContainer").hide();
    });

    // Salary MPUJ
    $("#btnComputeMpuj").click(function(){
        $("#salaryMpujCompute").fadeIn()
        $("#salaryMpujCompute").show();
    });

    // Salary TRAD
    $("#btnComputeTrad").click(function(){
        $("#salaryTradCompute").fadeIn()
        $("#salaryTradCompute").show();
    });

    // Accounts
    $("#btnCreateAccount").click(function(){
        $("#createAccountContainer").fadeIn()
        $("#createAccountContainer").show();
    });

    // Staff
    $("#btnComputeStaff").click(function(){
        $("#salaryStaffCompute").fadeIn()
        $("#salaryStaffCompute").show();
    });
    
    // Dispatch
        // Central Terminal to Nova
        $("#btnCreateCtToNova").click(function(){
            $("#dispatchContainerCtToNova").fadeIn()
            $("#dispatchContainerCtToNova").show();
        });

        // Nova to Central Terminal
        $("#btnCreateNovaToCt").click(function(){
            $("#dispatchContainerNovaToCt").fadeIn()
            $("#dispatchContainerNovaToCt").show();
        });

        // Open Full View
        $("#btnFullviewDispatch").click(function(){
            $("#dispatchContainerFullView").fadeIn()
            $("#dispatchContainerFullView").show();
        });

        // Close Full View
        $("#closeBtnFullview").click(function(){
            $("#dispatchContainerFullView").fadeOut()
            $("#dispatchContainerFullView").hide();
        });

    // Pdf
    $(".btnPdf").click(function(){
        $(".butawFormPdfContainer").show();
        $(".mpujFormPdfContainer").show();

        $(".mpujSalaryReportFormPdfContainer").show();
    });
});