$(document).ready(function(){
    $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
    $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
    $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
    $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
    $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");

    $('#formPuj').submit(function(e){
        e.preventDefault();

        var roleName = $("#roleName").val().toUpperCase();
        var lastName = $("#lastName").val().toUpperCase();
        var middleName = $("#middleName").val().toUpperCase();
        var firstName = $("#firstName").val().toUpperCase();
        var birthMonth = $("#birthMonth").val().toUpperCase();
        var birthDay = $("#birthDay").val();
        var birthYear = $("#birthYear").val();
        var birthPlace = $("#birthPlace").val().toUpperCase();
        var gender = $("#gender").val().toUpperCase();
        var civilStatus = $("#civilStatus").val().toUpperCase();
        var address = $("#address").val().toUpperCase();
        var contactNumber = $("#contactNumber").val();
        var licenseNumber = $("#licenseNumber").val();
        var licenseExpMon = $("#licenseExpMon").val().toUpperCase();
        var licenseExpday = $("#licenseExpday").val();
        var licenseExpYear = $("#licenseExpYear").val();

        // Errors
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        errEmptyLicenseNumber();    

        // Inserting Data on database
        if(roleName != ""  && lastName != ""  && firstName != "" && birthMonth != "" && birthDay != "" && ageRestriction() > 17 && birthPlace != "" && gender != "" && civilStatus != "" && address != "" && contactNumber != "" && contactNumberLessMore() == 11 && licenseNumber != "" && licenseExpMon != "" && licenseExpday != "" && licenseExpYear != ""){
            
        
            $.ajax({
                url: './asset/php/main/insert-puj.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    roleName: roleName,
                    lastName: lastName,
                    middleName: middleName,
                    firstName:firstName,
                    birthMonth: birthMonth,
                    birthDay: birthDay,
                    birthYear: birthYear,
                    birthPlace:birthPlace,
                    gender: gender,
                    civilStatus: civilStatus,
                    address: address,
                    contactNumber:contactNumber,
                    licenseNumber: licenseNumber,
                    licenseExpMon: licenseExpMon,
                    licenseExpday: licenseExpday,
                    licenseExpYear:licenseExpYear,
                },
                error: function (request, error) {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    // console.log(data);
                    if(data == "Success Insert"){
                        $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
                        $("#formPuj").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errEmptyLname(){
            if($(".lName").val() == ""){
                $(".lName").css('border', '1px solid red');
                $(".errLname").show();
            }else{
                $(".lName").css('border', '1px solid black');
                $(".errLname").hide();
            }
        }

        function errEmptyFname(){
            if($(".fName").val() == ""){
                $(".fName").css('border', '1px solid red');
                $(".errFname").show();
            }else{
                $(".fName").css('border', '1px solid black');
                $(".errFname").hide();
            }
        }

        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYear").css('border', '1px solid red');
                $(".errAge").show();
            }else{
                $(".birthYear").css('border', '1px solid black');
                $(".errAge").hide();
            }

            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }

        function errEmptyBirthPlace(){
            if($(".birthPlace").val() == ""){
                $(".birthPlace").css('border', '1px solid red');
                $(".errBirthPlace").show();
            }else{
                $(".birthPlace").css('border', '1px solid black');
                $(".errBirthPlace").hide();
            }
        }

        function errEmptyAddress(){
            if($(".address").val() == ""){
                $(".address").css('border', '1px solid red');
                $(".errAddress").show();
            }else{
                $(".address").css('border', '1px solid black');
                $(".errAddress").hide();
            }
        }

        function errEmptyContactNumber(){
            if($(".contactNumber").val() == ""){
                $(".contactNumber").css('border', '1px solid red');
                $(".errContactNumber").show();
            }else{
                $(".contactNumber").css('border', '1px solid black');
                $(".errContactNumber").hide();
            }
        }

        function errLessAndMoreContactNumber(){
            if($(".contactNumber").val().length != 11){
                $(".errContactNumberLessMorethan").show();
            }else{
                $(".errContactNumberLessMorethan").hide();
            }
        }

        function errEmptyLicenseNumber(){
            if($(".licenseNumber").val() == ""){
                $(".licenseNumber").css('border', '1px solid red');
                $(".errLicenseNumber").show();
            }else{
                $(".licenseNumber").css('border', '1px solid black');
                $(".errLicenseNumber").hide();
            }
        }

        // Condition Functions
        function ageRestriction(){
            var tdate = new Date();
            var year = tdate.getFullYear();

            var resultAge =  year - birthYear;

            return resultAge;
        }

        function contactNumberLessMore(){
            var a = $(".contactNumber").val().length;
            return a;
        }
    });

    $('#formPao').submit(function(e){
        e.preventDefault();
        
        var roleName = $("#roleNamePao").val().toUpperCase();
        var lastName = $("#lastNamePao").val().toUpperCase();
        var middleName = $("#middleNamePao").val().toUpperCase();
        var firstName = $("#firstNamePao").val().toUpperCase();
        var birthMonth = $("#birthMonthPao").val().toUpperCase();
        var birthDay = $("#birthDayPao").val();
        var birthYear = $("#birthYearPao").val();
        var birthPlace = $("#birthPlacePao").val().toUpperCase();
        var gender = $("#genderPao").val().toUpperCase();
        var civilStatus = $("#civilStatusPao").val().toUpperCase();
        var address = $("#addressPao").val().toUpperCase();
        var contactNumber = $("#contactNumberPao").val();


        // Errors
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        

        // Inserting Data on database
        if($("#roleNamePao").val() != ""  && $("#lastNamePao").val() != ""  && $("#firstNamePao").val() != "" && $("#birthMonthPao").val() != "" && $("#birthDayPao").val() != "" && ageRestriction() > 17 && $("#birthPlacePao").val() != "" && $("#genderPao").val() != "" && $("#civilStatusPao").val() != "" && $("#addressPao").val() != "" && $("#contactNumberPao").val() != "" && contactNumberLessMore() == 11){
        //    console.log("Asdasd");
        //     console.log(roleName);
        //     console.log(lastName);
        //     console.log(middleName);
        //     console.log(firstName);
        //     console.log(birthMonth);
        //     console.log(birthDay);
        //     console.log(birthYear);
        //     console.log(birthPlace);
        //     console.log(gender);
        //     console.log(civilStatus);
        //     console.log(address);
        //     console.log(contactNumber);
           
            $.ajax({
                url: './asset/php/main/insert-pao.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    roleName: roleName,
                    lastName: lastName,
                    middleName: middleName,
                    firstName:firstName,
                    birthMonth: birthMonth,
                    birthDay: birthDay,
                    birthYear: birthYear,
                    birthPlace:birthPlace,
                    gender: gender,
                    civilStatus: civilStatus,
                    address: address,
                    contactNumber:contactNumber,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
                        $("#formPao").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errEmptyLname(){
            if($(".lNamePao").val() == ""){
                $(".lNamePao").css('border', '1px solid red');
                $(".errLnamePao").show();
            }else{
                $(".lNamePao").css('border', '1px solid black');
                $(".errLnamePao").hide();
            }
        }

        function errEmptyFname(){
            if($(".fNamePao").val() == ""){
                $(".fNamePao").css('border', '1px solid red');
                $(".errFnamePao").show();
            }else{
                $(".fNamePao").css('border', '1px solid black');
                $(".errFnamePao").hide();
            }
        }

        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearPao").css('border', '1px solid red');
                $(".errAgePao").show();
            }else{
                $(".birthYearPao").css('border', '1px solid black');
                $(".errAgePao").hide();
            }

            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }

        function errEmptyBirthPlace(){
            if($(".birthPlacePao").val() == ""){
                $(".birthPlacePao").css('border', '1px solid red');
                $(".errBirthPlacePao").show();
            }else{
                $(".birthPlacePao").css('border', '1px solid black');
                $(".errBirthPlacePao").hide();
            }
        }

        function errEmptyAddress(){
            if($(".addressPao").val() == ""){
                $(".addressPao").css('border', '1px solid red');
                $(".errAddressPao").show();
            }else{
                $(".addressPao").css('border', '1px solid black');
                $(".errAddressPao").hide();
            }
        }

        function errEmptyContactNumber(){
            if($(".contactNumberPao").val() == ""){
                $(".contactNumberPao").css('border', '1px solid red');
                $(".errContactNumberPao").show();
            }else{
                $(".contactNumberPao").css('border', '1px solid black');
                $(".errContactNumberPao").hide();
            }
        }

        function errLessAndMoreContactNumber(){
            if($(".contactNumberPao").val().length != 11){
                $(".errContactNumberLessMorethanPao").show();
            }else{
                $(".errContactNumberLessMorethanPao").hide();
            }
        }

        // Condition Functions
        function ageRestriction(){
            var tdate = new Date();
            var year = tdate.getFullYear();

            var resultAge =  year - birthYear;

            return resultAge;
        }

        function contactNumberLessMore(){
            var a = $(".contactNumberPao").val().length;
            return a;
        }
    });

    $('#formIns').submit(function(e){
        e.preventDefault();
        
        var roleName = $("#roleNameIns").val().toUpperCase();
        var position = $("#positionIns").val().toUpperCase();
        var lastName = $("#lastNameIns").val().toUpperCase();
        var middleName = $("#middleNameIns").val().toUpperCase();
        var firstName = $("#firstNameIns").val().toUpperCase();
        var birthMonth = $("#birthMonthIns").val().toUpperCase();
        var birthDay = $("#birthDayIns").val();
        var birthYear = $("#birthYearIns").val();
        var birthPlace = $("#birthPlaceIns").val().toUpperCase();
        var gender = $("#genderIns").val().toUpperCase();
        var civilStatus = $("#civilStatusIns").val().toUpperCase();
        var address = $("#addressIns").val().toUpperCase();
        var contactNumber = $("#contactNumberIns").val();
    
    
        // Errors
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        errEmptyPosition();
        
    
        // Inserting Data on database
        if($("#positionIns").val() != "" && $("#roleNameIns").val() != ""  && $("#lastNameIns").val() != ""  && $("#firstNameIns").val() != "" && $("#birthMonthIns").val() != "" && $("#birthDayIns").val() != "" && ageRestriction() > 17 && $("#birthPlaceIns").val() != "" && $("#genderIns").val() != "" && $("#civilStatusIns").val() != "" && $("#addressIns").val() != "" && $("#contactNumberIns").val() != "" && contactNumberLessMore() == 11){
        //    console.log("Asdasd");
        //     console.log(roleName);
        //     console.log(lastName);
        //     console.log(middleName);
        //     console.log(firstName);
        //     console.log(birthMonth);
        //     console.log(birthDay);
        //     console.log(birthYear);
        //     console.log(birthPlace);
        //     console.log(gender);
        //     console.log(civilStatus);
        //     console.log(address);
        //     console.log(contactNumber);
           
            $.ajax({
                url: './asset/php/main/insert-ins.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    roleName: roleName,
                    position: position,
                    lastName: lastName,
                    middleName: middleName,
                    firstName:firstName,
                    birthMonth: birthMonth,
                    birthDay: birthDay,
                    birthYear: birthYear,
                    birthPlace:birthPlace,
                    gender: gender,
                    civilStatus: civilStatus,
                    address: address,
                    contactNumber:contactNumber,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
                        $("#formIns").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    
        // Error Function
        function errEmptyPosition(){
            if($(".positionIns").val() == ""){
                $(".positionIns").css('border', '1px solid red');
                $(".errPositionIns").show();
            }else{
                $(".positionIns").css('border', '1px solid black');
                $(".errPositionIns").hide();
            }
        }

        function errEmptyLname(){
            if($(".lNameIns").val() == ""){
                $(".lNameIns").css('border', '1px solid red');
                $(".errLnameIns").show();
            }else{
                $(".lNameIns").css('border', '1px solid black');
                $(".errLnameIns").hide();
            }
        }
    
        function errEmptyFname(){
            if($(".fNameIns").val() == ""){
                $(".fNameIns").css('border', '1px solid red');
                $(".errFnameIns").show();
            }else{
                $(".fNameIns").css('border', '1px solid black');
                $(".errFnameIns").hide();
            }
        }
    
        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearIns").css('border', '1px solid red');
                $(".errAgeIns").show();
            }else{
                $(".birthYearIns").css('border', '1px solid black');
                $(".errAgeIns").hide();
            }
    
            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }
    
        function errEmptyBirthPlace(){
            if($(".birthPlaceIns").val() == ""){
                $(".birthPlaceIns").css('border', '1px solid red');
                $(".errBirthPlaceIns").show();
            }else{
                $(".birthPlaceIns").css('border', '1px solid black');
                $(".errBirthPlaceIns").hide();
            }
        }
    
        function errEmptyAddress(){
            if($(".addressIns").val() == ""){
                $(".addressIns").css('border', '1px solid red');
                $(".errAddressIns").show();
            }else{
                $(".addressIns").css('border', '1px solid black');
                $(".errAddressIns").hide();
            }
        }
    
        function errEmptyContactNumber(){
            if($(".contactNumberIns").val() == ""){
                $(".contactNumberIns").css('border', '1px solid red');
                $(".errContactNumberIns").show();
            }else{
                $(".contactNumberIns").css('border', '1px solid black');
                $(".errContactNumberIns").hide();
            }
        }
    
        function errLessAndMoreContactNumber(){
            if($(".contactNumberIns").val().length != 11){
                $(".errContactNumberLessMorethanIns").show();
            }else{
                $(".errContactNumberLessMorethanIns").hide();
            }
        }
    
        // Condition Functions
        function ageRestriction(){
            var tdate = new Date();
            var year = tdate.getFullYear();
    
            var resultAge =  year - birthYear;
    
            return resultAge;
        }
    
        function contactNumberLessMore(){
            var a = $(".contactNumberIns").val().length;
            return a;
        }
    });

    $('#formOpe').submit(function(e){
        e.preventDefault();
        
        var roleName = $("#roleNameOpe").val().toUpperCase();
        var lastName = $("#lastNameOpe").val().toUpperCase();
        var middleName = $("#middleNameOpe").val().toUpperCase();
        var firstName = $("#firstNameOpe").val().toUpperCase();
        var birthMonth = $("#birthMonthOpe").val().toUpperCase();
        var birthDay = $("#birthDayOpe").val();
        var birthYear = $("#birthYearOpe").val();
        var birthPlace = $("#birthPlaceOpe").val().toUpperCase();
        var gender = $("#genderOpe").val().toUpperCase();
        var civilStatus = $("#civilStatusOpe").val().toUpperCase();
        var address = $("#addressOpe").val().toUpperCase();
        var contactNumber = $("#contactNumberOpe").val();
        var plateNum = $("#plateNumOpe").val();
    
    
        // Errors
        errEmptyPlateNum();
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        
    
        // Opeerting Data on database
        if($("#roleNameOpe").val() != ""  && $("#lastNameOpe").val() != ""  && $("#firstNameOpe").val() != "" && $("#birthMonthOpe").val() != "" && $("#birthDayOpe").val() != "" && ageRestriction() > 17 && $("#birthPlaceOpe").val() != "" && $("#genderOpe").val() != "" && $("#civilStatusOpe").val() != "" && $("#addressOpe").val() != "" && $("#contactNumberOpe").val() != "" && contactNumberLessMore() == 11){
        //    console.log("Asdasd");
        //     console.log(roleName);
        //     console.log(lastName);
        //     console.log(middleName);
        //     console.log(firstName);
        //     console.log(birthMonth);
        //     console.log(birthDay);
        //     console.log(birthYear);
        //     console.log(birthPlace);
        //     console.log(gender);
        //     console.log(civilStatus);
        //     console.log(address);
        //     console.log(contactNumber);
           
            $.ajax({
                url: './asset/php/main/insert-ope.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    roleName: roleName,
                    lastName: lastName,
                    middleName: middleName,
                    firstName:firstName,
                    birthMonth: birthMonth,
                    birthDay: birthDay,
                    birthYear: birthYear,
                    birthPlace:birthPlace,
                    gender: gender,
                    civilStatus: civilStatus,
                    address: address,
                    contactNumber:contactNumber,
                    plateNum:plateNum,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    console.log(data);
                    if(data == "Success Insert"){
                        $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
                        $("#formOpe").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    
        // Error Function
        function errEmptyPlateNum(){
            if($(".plateNumOpe").val() == ""){
                $(".plateNumOpe").css('border', '1px solid red');
                $(".errPlateNumOpe").show();
            }else{
                $(".plateNumOpe").css('border', '1px solid black');
                $(".errPlateNumOpe").hide();
            }
        }

        function errEmptyLname(){
            if($(".lNameOpe").val() == ""){
                $(".lNameOpe").css('border', '1px solid red');
                $(".errLnameOpe").show();
            }else{
                $(".lNameOpe").css('border', '1px solid black');
                $(".errLnameOpe").hide();
            }
        }
    
        function errEmptyFname(){
            if($(".fNameOpe").val() == ""){
                $(".fNameOpe").css('border', '1px solid red');
                $(".errFnameOpe").show();
            }else{
                $(".fNameOpe").css('border', '1px solid black');
                $(".errFnameOpe").hide();
            }
        }
    
        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearOpe").css('border', '1px solid red');
                $(".errAgeOpe").show();
            }else{
                $(".birthYearOpe").css('border', '1px solid black');
                $(".errAgeOpe").hide();
            }
    
            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }
    
        function errEmptyBirthPlace(){
            if($(".birthPlaceOpe").val() == ""){
                $(".birthPlaceOpe").css('border', '1px solid red');
                $(".errBirthPlaceOpe").show();
            }else{
                $(".birthPlaceOpe").css('border', '1px solid black');
                $(".errBirthPlaceOpe").hide();
            }
        }
    
        function errEmptyAddress(){
            if($(".addressOpe").val() == ""){
                $(".addressOpe").css('border', '1px solid red');
                $(".errAddressOpe").show();
            }else{
                $(".addressOpe").css('border', '1px solid black');
                $(".errAddressOpe").hide();
            }
        }
    
        function errEmptyContactNumber(){
            if($(".contactNumberOpe").val() == ""){
                $(".contactNumberOpe").css('border', '1px solid red');
                $(".errContactNumberOpe").show();
            }else{
                $(".contactNumberOpe").css('border', '1px solid black');
                $(".errContactNumberOpe").hide();
            }
        }
    
        function errLessAndMoreContactNumber(){
            if($(".contactNumberOpe").val().length != 11){
                $(".errContactNumberLessMorethanOpe").show();
            }else{
                $(".errContactNumberLessMorethanOpe").hide();
            }
        }
    
        // Condition Functions
        function ageRestriction(){
            var tdate = new Date();
            var year = tdate.getFullYear();
    
            var resultAge =  year - birthYear;
    
            return resultAge;
        }
    
        function contactNumberLessMore(){
            var a = $(".contactNumberOpe").val().length;
            return a;
        }
    });

    $('#formTra').submit(function(e){
        e.preventDefault();

        var roleName = $("#roleName").val().toUpperCase();
        var lastName = $("#lastName").val().toUpperCase();
        var middleName = $("#middleName").val().toUpperCase();
        var firstName = $("#firstName").val().toUpperCase();
        var birthMonth = $("#birthMonth").val().toUpperCase();
        var birthDay = $("#birthDay").val();
        var birthYear = $("#birthYear").val();
        var birthPlace = $("#birthPlace").val().toUpperCase();
        var gender = $("#gender").val().toUpperCase();
        var civilStatus = $("#civilStatus").val().toUpperCase();
        var address = $("#address").val().toUpperCase();
        var contactNumber = $("#contactNumber").val();
        var licenseNumber = $("#licenseNumber").val();
        var licenseExpMon = $("#licenseExpMon").val().toUpperCase();
        var licenseExpday = $("#licenseExpday").val();
        var licenseExpYear = $("#licenseExpYear").val();

        // Errors
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        errEmptyLicenseNumber();    

        // Inserting Data on database
        if($("#roleName").val() != ""  && $("#lastName").val() != ""  && $("#firstName").val() != "" && $("#birthMonth").val() != "" && $("#birthDay").val() != "" && ageRestriction() > 17 && $("#birthPlace").val() != "" && $("#gender").val() != "" && $("#civilStatus").val() != "" && $("#address").val() != "" && $("#contactNumber").val() != "" && contactNumberLessMore() == 11 && $("#licenseNumber").val() != "" && $("#licenseExpMon").val() != "" && $("#licenseExpday").val() != "" && $("#licenseExpYear").val() != ""){
            $.ajax({
                url: './asset/php/main/insert-trad-puj.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    roleName: roleName,
                    lastName: lastName,
                    middleName: middleName,
                    firstName:firstName,
                    birthMonth: birthMonth,
                    birthDay: birthDay,
                    birthYear: birthYear,
                    birthPlace:birthPlace,
                    gender: gender,
                    civilStatus: civilStatus,
                    address: address,
                    contactNumber:contactNumber,
                    licenseNumber: licenseNumber,
                    licenseExpMon: licenseExpMon,
                    licenseExpday: licenseExpday,
                    licenseExpYear:licenseExpYear,
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    // console.log(data);
                    if(data == "Success Insert"){
                        $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");
                        $("#formTra").trigger('reset'); 
                        $(".successAddContainer").show();
                        $('.successAddContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errEmptyLname(){
            if($(".lName").val() == ""){
                $(".lName").css('border', '1px solid red');
                $(".errLname").show();
            }else{
                $(".lName").css('border', '1px solid black');
                $(".errLname").hide();
            }
        }

        function errEmptyFname(){
            if($(".fName").val() == ""){
                $(".fName").css('border', '1px solid red');
                $(".errFname").show();
            }else{
                $(".fName").css('border', '1px solid black');
                $(".errFname").hide();
            }
        }

        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYear").css('border', '1px solid red');
                $(".errAge").show();
            }else{
                $(".birthYear").css('border', '1px solid black');
                $(".errAge").hide();
            }

            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }

        function errEmptyBirthPlace(){
            if($(".birthPlace").val() == ""){
                $(".birthPlace").css('border', '1px solid red');
                $(".errBirthPlace").show();
            }else{
                $(".birthPlace").css('border', '1px solid black');
                $(".errBirthPlace").hide();
            }
        }

        function errEmptyAddress(){
            if($(".address").val() == ""){
                $(".address").css('border', '1px solid red');
                $(".errAddress").show();
            }else{
                $(".address").css('border', '1px solid black');
                $(".errAddress").hide();
            }
        }

        function errEmptyContactNumber(){
            if($(".contactNumber").val() == ""){
                $(".contactNumber").css('border', '1px solid red');
                $(".errContactNumber").show();
            }else{
                $(".contactNumber").css('border', '1px solid black');
                $(".errContactNumber").hide();
            }
        }

        function errLessAndMoreContactNumber(){
            if($(".contactNumber").val().length != 11){
                $(".errContactNumberLessMorethan").show();
            }else{
                $(".errContactNumberLessMorethan").hide();
            }
        }

        function errEmptyLicenseNumber(){
            if($(".licenseNumber").val() == ""){
                $(".licenseNumber").css('border', '1px solid red');
                $(".errLicenseNumber").show();
            }else{
                $(".licenseNumber").css('border', '1px solid black');
                $(".errLicenseNumber").hide();
            }
        }

        // Condition Functions
        function ageRestriction(){
            var tdate = new Date();
            var year = tdate.getFullYear();

            var resultAge =  year - birthYear;

            return resultAge;
        }

        function contactNumberLessMore(){
            var a = $(".contactNumber").val().length;
            return a;
        }
    });
});