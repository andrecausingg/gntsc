$(document).ready(function(){
    $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
    $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");

    $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
    $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");

    $('#formDispatchCttoNova').submit(function(e){
        e.preventDefault();
        
        var routeDispatch = $("#routeDispatch").val();
        var driverFullNameDispatch = $("#driverFullNameDispatch").val().toUpperCase();
        var paoFullNameDispatch = $("#paoFullNameDispatch").val().toUpperCase();
        var mpujNumDispatch = $("#mpujNumDispatch").val().toUpperCase();
        var plateNumDispatch = $("#plateNumDispatch").val().toUpperCase();
        // var destinationDispatch = $("#destinationDispatch").val().toUpperCase();
        var timeOfDepartureDispatch = $("#timeOfDepartureDispatch").val();
        var timeOfArrivalDispatch = $("#timeOfArrivalDispatch").val();


        errDateTimePickerEmpty();

        // console.log(driverFullNameDispatch);
        // console.log(paoFullNameDispatch);
        // console.log(mpujNumDispatch);
        // console.log(plateNumDispatch);
        // console.log(destinationDispatch);
        // console.log(timeOfDepartureDispatch);
        // console.log(timeOfArrivalDispatch);


        // Inserting Data on Database
        if(timeOfDepartureDispatch != "" && timeOfArrivalDispatch != ""){
            $.ajax({

                url: './asset/php/main/insert-dispatch-ct-to-nova.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    routeDispatch:routeDispatch,
                    driverFullNameDispatch: driverFullNameDispatch,
                    paoFullNameDispatch: paoFullNameDispatch,
                    mpujNumDispatch: mpujNumDispatch,
                    plateNumDispatch: plateNumDispatch,
                    // destinationDispatch: destinationDispatch,
                    timeOfDepartureDispatch: timeOfDepartureDispatch,
                    timeOfArrivalDispatch: timeOfArrivalDispatch,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
                        $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");
                        $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
                        $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");
                        $("#formDispatchCttoNova").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }


        // Error Function
        function errDateTimePickerEmpty(){
            if($(".datePicker").val() == ""){
                $(".datePicker").css('border', '1px solid red');
                $(".errDatePicker").show();
            }else{
                $(".datePicker").css('border', '1px solid black');
                $(".errDatePicker").hide();
            }
        }
    });
});