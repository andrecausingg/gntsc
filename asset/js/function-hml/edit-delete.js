$(document).ready(function(){
    // Close Btn For Edit Container
    $(document).on("click", ".closeBtn" , function() {
        $(".editPujContainer").hide();
        $(".editPaoContainer").hide();
        $(".editInsContainer").hide();
        $(".editOpeContainer").hide();
        $(".editTraContainer").hide();

        // Salary
        $(".salaryMpujComputeEdit").hide();
        $(".salaryTradComputeEdit").hide();
        
        // Account
        $(".createAccountContainerEdit").hide();

        // Mpuj Info
        $("#editMpujInfoContainer").hide();

        // Trad Info
        $("#editTradInfoContainer").hide();

        // Insert Salary Container
        $("#salaryTradCompute").hide();

        // Dispatch
        $("#dispatchContainerCtToNovaEdit").hide();

        // Remarks
        $(".editRemarksContainerWithForm").hide();
        
        // Staff
        $(".editStaffContainer").hide();

    });

    // Cancel Btn For Delete Container
    $(document).on("click", ".cancelBtn" , function() {
        $(".deleteContainer").hide();
    });

    $(document).on("click", ".closeBtnSuccess" , function() {
        $(".successAddContainer").hide();
        $(".successUpdateContainer").hide();
        $(".successDeleteContainer").hide();

        // 
        $(".alertSixRounds").hide();
    });


    // Remarks Container
    $(document).on("click", ".closeRemarksContainer" , function() {
        $(".remarksContainer").hide();
    });

    // Remarks Form Container
    $(document).on("click", ".closeAddRemarks" , function() {
        $("#addRemarksContainer").hide();
    });

    // Remarks Form Container
    $(document).on("click", "#btnRemarks" , function() {
        $("#addRemarksContainer").show();
    });
});
