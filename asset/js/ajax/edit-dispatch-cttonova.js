$(document).ready(function(){
    $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
    $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");
    $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
    $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");
    $(document).on("submit", "#formDispatchCttoNovaEdit" , function(e) {
        e.preventDefault();

        var dataId = $("#dataId").val()
        var driverFullNameDispatch = $("#driverFullNameDispatchEdit").val().toUpperCase();
        var paoFullNameDispatch = $("#paoFullNameDispatchEdit").val().toUpperCase();
        var mpujNumDispatch = $("#mpujNumDispatchEdit").val().toUpperCase();
        var plateNumDispatch = $("#plateNumDispatchEdit").val();
        // var destinationDispatch = $("#destinationDispatchEdit").val().toUpperCase();
        var timeOfDepartureDispatch = $(".datePickerTimeOfDepatureEdit").val();
        var timeOfArrivalDispatch = $(".datePickerTimeOfArrivalEdit").val();


        errDateTimePickerEmpty();

        // console.log(dataId);
        // console.log(driverFullNameDispatch);
        // console.log(paoFullNameDispatch);
        // console.log(mpujNumDispatch);
        // console.log(plateNumDispatch);
        // console.log(destinationDispatch);
        // console.log(timeOfDepartureDispatch);
        // console.log(timeOfArrivalDispatch);


        // Inserting Data on Database
        if(timeOfDepartureDispatch != "" && timeOfArrivalDispatch){
            $.ajax({
                url: './asset/php/main/edit-dispatch-ct-to-nova.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
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
                    if(data == "Success Update"){
                        $(".displayDispatchCtToNovaClass").load("./asset/php/main/display-dispatch-cttonova.php");
                        $(".displayDispatchNovaToCtClass").load("./asset/php/main/display-dispatch-novatoct.php");
                        $(".displayDispatchCtToNovaClassNoAct").load("./asset/php/main/display-dispatch-cttonovanoact.php");
                        $(".displayDispatchNovaToCtClassNoAct").load("./asset/php/main/display-dispatch-novatoctnoact.php");
                        $(".dispatchContainerCtToNovaEdit").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errDateTimePickerEmpty(){
            if($(".datePickerTimeOfDepatureEdit").val() == ""){
                $(".datePickerTimeOfDepatureEdit").css('border', '1px solid red');
                $(".errDatePickerEdit").show();
            }else{
                $(".datePickerTimeOfDepatureEdit").css('border', '1px solid black');
                $(".errDatePickerEdit").hide();
            }
        }
    });
});