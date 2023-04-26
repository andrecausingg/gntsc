$(document).ready(function(){
    $("#openHamburger").click(function(){
        $("#header").hide();
        $("#navLeftContainer").toggleClass("yot-hide-for-mobile");
        $("body").css("overflow", "hidden");
    });

    $("#closeHamburger").click(function(){
        $("#header").show();
        $("#navLeftContainer").toggleClass("yot-hide-for-mobile");
        $("body").css("overflow", "auto");
    });

    $("#successAddCloseBtn").click(function(){
        $("#successAddContainer").hide();
    });

    $("closeBtn")
    
});