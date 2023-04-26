$(document).ready(function(){
    $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
    $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
    $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
    $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
    $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");

    $(document).on("submit", "#formPujEdit" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdEditPuj").val();
        var roleName = $("#roleNameEditPuj").val().toUpperCase();
        var roleName = $("#roleNameEditPuj").val().toUpperCase();
        var lastName = $("#lastNameEditPuj").val().toUpperCase();
        var middleName = $("#middleNameEditPuj").val().toUpperCase();
        var firstName = $("#firstNameEditPuj").val().toUpperCase();
        var birthMonth = $("#birthMonthEditPuj").val().toUpperCase();
        var birthDay = $("#birthDayEditPuj").val();
        var birthYear = $("#birthYearEditPuj").val();
        var birthPlace = $("#birthPlaceEditPuj").val().toUpperCase();
        var gender = $("#genderEditPuj").val().toUpperCase();
        var civilStatus = $("#civilStatusEditPuj").val().toUpperCase();
        var address = $("#addressEditPuj").val().toUpperCase();
        var contactNumber = $("#contactNumberEditPuj").val();
        var licenseNumber = $("#licenseNumberEditPuj").val();
        var licenseExpMon = $("#licenseExpMonEditPuj").val().toUpperCase();
        var licenseExpday = $("#licenseExpdayEditPuj").val();
        var licenseExpYear = $("#licenseExpYearEditPuj").val();

        // console.log(dataId);
        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(birthMonth);
        // console.log(birthDay);
        // console.log(birthYear);
        // console.log(birthPlace);
        // console.log(gender);
        // console.log(civilStatus);
        // console.log(address);
        // console.log(contactNumber);
        // console.log(licenseNumber);
        // console.log(licenseExpMon);
        // console.log(licenseExpday);
        // console.log(licenseExpYear);

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
        if($("#roleNameEditPuj").val() != ""  && $("#lastNameEditPuj").val() != ""  && $("#firstNameEditPuj").val() != "" && $("#birthMonthEditPuj").val() != "" && $("#birthDayEditPuj").val() != "" && ageRestriction() > 17 && $("#birthPlaceEditPuj").val() != "" && $("#genderEditPuj").val() != "" && $("#civilStatusEditPuj").val() != "" && $("#addressEditPuj").val() != "" && $("#contactNumberEditPuj").val() != "" && contactNumberLessMore() >= 11 && $("#licenseNumberEditPuj").val() != "" && $("#licenseExpMonEditPuj").val() != "" && $("#licenseExpdayEditPuj").val() != "" && $("#licenseExpYearEditPuj").val() != ""){
            
            $.ajax({
                url: './asset/php/main/edit-puj.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
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
                    console.log(data);
                    if(data == "Success Update"){
                        $(".staffDisplayPuj").load("./asset/php/main/display-staff-puj.php");
                        $(".editPujContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errEmptyLname(){
            if($(".lNameEditPuj").val() == ""){
                $(".lNameEditPuj").css('border', '1px solid red');
                $(".errLnameEditPuj").show();
            }else{
                $(".lNameEditPuj").css('border', '1px solid black');
                $(".errLnameEditPuj").hide();
            }
        }

        function errEmptyFname(){
            if($(".fNameEditPuj").val() == ""){
                $(".fNameEditPuj").css('border', '1px solid red');
                $(".errFnameEditPuj").show();
            }else{
                $(".fNameEditPuj").css('border', '1px solid black');
                $(".errFnameEditPuj").hide();
            }
        }

        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearEditPuj").css('border', '1px solid red');
                $(".errAgeEditPuj").show();
            }else{
                $(".birthYearEditPuj").css('border', '1px solid black');
                $(".errAgeEditPuj").hide();
            }

            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }

        function errEmptyBirthPlace(){
            if($(".birthPlaceEditPuj").val() == ""){
                $(".birthPlaceEditPuj").css('border', '1px solid red');
                $(".errBirthPlaceEditPuj").show();
            }else{
                $(".birthPlaceEditPuj").css('border', '1px solid black');
                $(".errBirthPlaceEditPuj").hide();
            }
        }

        function errEmptyAddress(){
            if($(".addressEditPuj").val() == ""){
                $(".addressEditPuj").css('border', '1px solid red');
                $(".errAddressEditPuj").show();
            }else{
                $(".addressEditPuj").css('border', '1px solid black');
                $(".errAddressEditPuj").hide();
            }
        }

        function errEmptyContactNumber(){
            if($(".contactNumberEditPuj").val() == ""){
                $(".contactNumberEditPuj").css('border', '1px solid red');
                $(".errContactNumberEditPuj").show();
            }else{
                $(".contactNumberEditPuj").css('border', '1px solid black');
                $(".errContactNumberEditPuj").hide();
            }
        }

        function errLessAndMoreContactNumber(){
            if($(".contactNumberEditPuj").val().length < 11){
                $(".errContactNumberLessMorethanEditPuj").show();
            }else{
                $(".errContactNumberLessMorethanEditPuj").hide();
            }
        }

        function errEmptyLicenseNumber(){
            if($(".licenseNumberEditPuj").val() == ""){
                $(".licenseNumberEditPuj").css('border', '1px solid red');
                $(".errLicenseNumberEditPuj").show();
            }else{
                $(".licenseNumberEditPuj").css('border', '1px solid black');
                $(".errLicenseNumberEditPuj").hide();
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
            var a = $(".contactNumberEditPuj").val().length;
            return a;
        }
    });

    $(document).on("submit", "#formPaoEdit" , function(e) {
        e.preventDefault();

        var dataId = $("#dataIdEditPao").val();
        var roleName = $("#roleNameEditPao").val().toUpperCase();
        var roleName = $("#roleNameEditPao").val().toUpperCase();
        var lastName = $("#lastNameEditPao").val().toUpperCase();
        var middleName = $("#middleNameEditPao").val().toUpperCase();
        var firstName = $("#firstNameEditPao").val().toUpperCase();
        var birthMonth = $("#birthMonthEditPao").val().toUpperCase();
        var birthDay = $("#birthDayEditPao").val();
        var birthYear = $("#birthYearEditPao").val();
        var birthPlace = $("#birthPlaceEditPao").val().toUpperCase();
        var gender = $("#genderEditPao").val().toUpperCase();
        var civilStatus = $("#civilStatusEditPao").val().toUpperCase();
        var address = $("#addressEditPao").val().toUpperCase();
        var contactNumber = $("#contactNumberEditPao").val();

        // console.log(dataId);
        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(birthMonth);
        // console.log(birthDay);
        // console.log(birthYear);
        // console.log(birthPlace);
        // console.log(gender);
        // console.log(civilStatus);
        // console.log(address);
        // console.log(contactNumber);
        // console.log(licenseNumber);
        // console.log(licenseExpMon);
        // console.log(licenseExpday);
        // console.log(licenseExpYear);

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
        if($("#roleNameEditPao").val() != ""  && $("#lastNameEditPao").val() != ""  && $("#firstNameEditPao").val() != "" && $("#birthMonthEditPao").val() != "" && $("#birthDayEditPao").val() != "" && ageRestriction() > 17 && $("#birthPlaceEditPao").val() != "" && $("#genderEditPao").val() != "" && $("#civilStatusEditPao").val() != "" && $("#addressEditPao").val() != "" && $("#contactNumberEditPao").val() != "" && contactNumberLessMore() >= 11){
            
            $.ajax({
                url: './asset/php/main/edit-Pao.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
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
                    // console.log(data);
                    if(data == "Success Update"){
                        $(".staffDisplayPao").load("./asset/php/main/display-staff-pao.php");
                        $(".editPaoContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }

        // Error Function
        function errEmptyLname(){
            if($(".lNameEditPao").val() == ""){
                $(".lNameEditPao").css('border', '1px solid red');
                $(".errLnameEditPao").show();
            }else{
                $(".lNameEditPao").css('border', '1px solid black');
                $(".errLnameEditPao").hide();
            }
        }

        function errEmptyFname(){
            if($(".fNameEditPao").val() == ""){
                $(".fNameEditPao").css('border', '1px solid red');
                $(".errFnameEditPao").show();
            }else{
                $(".fNameEditPao").css('border', '1px solid black');
                $(".errFnameEditPao").hide();
            }
        }

        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearEditPao").css('border', '1px solid red');
                $(".errAgeEditPao").show();
            }else{
                $(".birthYearEditPao").css('border', '1px solid black');
                $(".errAgeEditPao").hide();
            }

            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }

        function errEmptyBirthPlace(){
            if($(".birthPlaceEditPao").val() == ""){
                $(".birthPlaceEditPao").css('border', '1px solid red');
                $(".errBirthPlaceEditPao").show();
            }else{
                $(".birthPlaceEditPao").css('border', '1px solid black');
                $(".errBirthPlaceEditPao").hide();
            }
        }

        function errEmptyAddress(){
            if($(".addressEditPao").val() == ""){
                $(".addressEditPao").css('border', '1px solid red');
                $(".errAddressEditPao").show();
            }else{
                $(".addressEditPao").css('border', '1px solid black');
                $(".errAddressEditPao").hide();
            }
        }

        function errEmptyContactNumber(){
            if($(".contactNumberEditPao").val() == ""){
                $(".contactNumberEditPao").css('border', '1px solid red');
                $(".errContactNumberEditPao").show();
            }else{
                $(".contactNumberEditPao").css('border', '1px solid black');
                $(".errContactNumberEditPao").hide();
            }
        }

        function errLessAndMoreContactNumber(){
            if($(".contactNumberEditPao").val().length < 11){
                $(".errContactNumberLessMorethanEditPao").show();
            }else{
                $(".errContactNumberLessMorethanEditPao").hide();
            }
        }

        function errEmptyLicenseNumber(){
            if($(".licenseNumberEditPao").val() == ""){
                $(".licenseNumberEditPao").css('border', '1px solid red');
                $(".errLicenseNumberEditPao").show();
            }else{
                $(".licenseNumberEditPao").css('border', '1px solid black');
                $(".errLicenseNumberEditPao").hide();
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
            var a = $(".contactNumberEditPao").val().length;
            return a;
        }
    });

    $(document).on("submit", "#formInsEdit" , function(e) {
        e.preventDefault();
    
        var dataId = $("#dataIdEditIns").val();
        var roleName = $("#roleNameEditIns").val().toUpperCase();
        var position = $("#positionInsEdit").val().toUpperCase();
        var lastName = $("#lastNameEditIns").val().toUpperCase();
        var middleName = $("#middleNameEditIns").val().toUpperCase();
        var firstName = $("#firstNameEditIns").val().toUpperCase();
        var birthMonth = $("#birthMonthEditIns").val().toUpperCase();
        var birthDay = $("#birthDayEditIns").val();
        var birthYear = $("#birthYearEditIns").val();
        var birthPlace = $("#birthPlaceEditIns").val().toUpperCase();
        var gender = $("#genderEditIns").val().toUpperCase();
        var civilStatus = $("#civilStatusEditIns").val().toUpperCase();
        var address = $("#addressEditIns").val().toUpperCase();
        var contactNumber = $("#contactNumberEditIns").val();
    
        // console.log(dataId);
        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(birthMonth);
        // console.log(birthDay);
        // console.log(birthYear);
        // console.log(birthPlace);
        // console.log(gender);
        // console.log(civilStatus);
        // console.log(address);
        // console.log(contactNumber);
        // console.log(licenseNumber);
        // console.log(licenseExpMon);
        // console.log(licenseExpday);
        // console.log(licenseExpYear);
    
        // Errors
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        errEmptyLicenseNumber();    
        errEmptyPosition();

    
        // Inserting Data on database
        if($("#positionInsEdit").val() != ""  && $("#roleNameEditIns").val() != ""  && $("#lastNameEditIns").val() != ""  && $("#firstNameEditIns").val() != "" && $("#birthMonthEditIns").val() != "" && $("#birthDayEditIns").val() != "" && ageRestriction() > 17 && $("#birthPlaceEditIns").val() != "" && $("#genderEditIns").val() != "" && $("#civilStatusEditIns").val() != "" && $("#addressEditIns").val() != "" && $("#contactNumberEditIns").val() != "" && contactNumberLessMore() >= 11){
            $.ajax({
                url: './asset/php/main/edit-ins.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
                    position: position,
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
                    // console.log(data);
                    if(data == "Success Update"){
                        $(".staffDisplayIns").load("./asset/php/main/display-staff-ins.php");
                        $(".editInsContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
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
            if($(".lNameEditIns").val() == ""){
                $(".lNameEditIns").css('border', '1px solid red');
                $(".errLnameEditIns").show();
            }else{
                $(".lNameEditIns").css('border', '1px solid black');
                $(".errLnameEditIns").hide();
            }
        }
    
        function errEmptyFname(){
            if($(".fNameEditIns").val() == ""){
                $(".fNameEditIns").css('border', '1px solid red');
                $(".errFnameEditIns").show();
            }else{
                $(".fNameEditIns").css('border', '1px solid black');
                $(".errFnameEditIns").hide();
            }
        }
    
        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearEditIns").css('border', '1px solid red');
                $(".errAgeEditIns").show();
            }else{
                $(".birthYearEditIns").css('border', '1px solid black');
                $(".errAgeEditIns").hide();
            }
    
            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }
    
        function errEmptyBirthPlace(){
            if($(".birthPlaceEditIns").val() == ""){
                $(".birthPlaceEditIns").css('border', '1px solid red');
                $(".errBirthPlaceEditIns").show();
            }else{
                $(".birthPlaceEditIns").css('border', '1px solid black');
                $(".errBirthPlaceEditIns").hide();
            }
        }
    
        function errEmptyAddress(){
            if($(".addressEditIns").val() == ""){
                $(".addressEditIns").css('border', '1px solid red');
                $(".errAddressEditIns").show();
            }else{
                $(".addressEditIns").css('border', '1px solid black');
                $(".errAddressEditIns").hide();
            }
        }
    
        function errEmptyContactNumber(){
            if($(".contactNumberEditIns").val() == ""){
                $(".contactNumberEditIns").css('border', '1px solid red');
                $(".errContactNumberEditIns").show();
            }else{
                $(".contactNumberEditIns").css('border', '1px solid black');
                $(".errContactNumberEditIns").hide();
            }
        }
    
        function errLessAndMoreContactNumber(){
            if($(".contactNumberEditIns").val().length < 11){
                $(".errContactNumberLessMorethanEditIns").show();
            }else{
                $(".errContactNumberLessMorethanEditIns").hide();
            }
        }
    
        function errEmptyLicenseNumber(){
            if($(".licenseNumberEditIns").val() == ""){
                $(".licenseNumberEditIns").css('border', '1px solid red');
                $(".errLicenseNumberEditIns").show();
            }else{
                $(".licenseNumberEditIns").css('border', '1px solid black');
                $(".errLicenseNumberEditIns").hide();
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
            var a = $(".contactNumberEditIns").val().length;
            return a;
        }
    });

    $(document).on("submit", "#formOpeEdit" , function(e) {
        e.preventDefault();
    
        var dataId = $("#dataIdEditOpe").val();
        var roleName = $("#roleNameEditOpe").val().toUpperCase();
        var roleName = $("#roleNameEditOpe").val().toUpperCase();
        var lastName = $("#lastNameEditOpe").val().toUpperCase();
        var middleName = $("#middleNameEditOpe").val().toUpperCase();
        var firstName = $("#firstNameEditOpe").val().toUpperCase();
        var birthMonth = $("#birthMonthEditOpe").val().toUpperCase();
        var birthDay = $("#birthDayEditOpe").val();
        var birthYear = $("#birthYearEditOpe").val();
        var birthPlace = $("#birthPlaceEditOpe").val().toUpperCase();
        var gender = $("#genderEditOpe").val().toUpperCase();
        var civilStatus = $("#civilStatusEditOpe").val().toUpperCase();
        var address = $("#addressEditOpe").val().toUpperCase();
        var contactNumber = $("#contactNumberEditOpe").val();
        var plateNum = $("#plateNumOpeEdit").val();
    
        // console.log(dataId);
        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(birthMonth);
        // console.log(birthDay);
        // console.log(birthYear);
        // console.log(birthPlace);
        // console.log(gender);
        // console.log(civilStatus);
        // console.log(address);
        // console.log(contactNumber);
        // console.log(licenseNumber);
        // console.log(licenseExpMon);
        // console.log(licenseExpday);
        // console.log(licenseExpYear);
    
        // Errors
        errEmptyPlateNum();
        errEmptyLname();
        errEmptyFname();
        errBelow18();
        errEmptyBirthPlace();
        errEmptyAddress();
        errEmptyContactNumber();
        errLessAndMoreContactNumber();
        errEmptyLicenseNumber();    
    
        // Opeerting Data on database
        if($("#roleNameEditOpe").val() != ""  && $("#lastNameEditOpe").val() != ""  && $("#firstNameEditOpe").val() != "" && $("#birthMonthEditOpe").val() != "" && $("#birthDayEditOpe").val() != "" && ageRestriction() > 17 && $("#birthPlaceEditOpe").val() != "" && $("#genderEditOpe").val() != "" && $("#civilStatusEditOpe").val() != "" && $("#addressEditOpe").val() != "" && $("#contactNumberEditOpe").val() != "" && contactNumberLessMore() >= 11){
            
            $.ajax({
                url: './asset/php/main/edit-ope.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
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
                    plateNum:plateNum
                },
                
                // Displaying the return message on Backend Script
                success: function (data){
                    // console.log(data);
                    if(data == "Success Update"){
                        $(".staffDisplayOpe").load("./asset/php/main/display-staff-ope.php");
                        $(".editOpeContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    
        // Error Function
        function errEmptyPlateNum(){
            if($(".plateNumOpeEdit").val() == ""){
                $(".plateNumOpeEdit").css('border', '1px solid red');
                $(".errPlateNumOpeEdit").show();
            }else{
                $(".plateNumOpeEdit").css('border', '1px solid black');
                $(".errPlateNumOpeEdit").hide();
            }
        }

        function errEmptyLname(){
            if($(".lNameEditOpe").val() == ""){
                $(".lNameEditOpe").css('border', '1px solid red');
                $(".errLnameEditOpe").show();
            }else{
                $(".lNameEditOpe").css('border', '1px solid black');
                $(".errLnameEditOpe").hide();
            }
        }
    
        function errEmptyFname(){
            if($(".fNameEditOpe").val() == ""){
                $(".fNameEditOpe").css('border', '1px solid red');
                $(".errFnameEditOpe").show();
            }else{
                $(".fNameEditOpe").css('border', '1px solid black');
                $(".errFnameEditOpe").hide();
            }
        }
    
        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearEditOpe").css('border', '1px solid red');
                $(".errAgeEditOpe").show();
            }else{
                $(".birthYearEditOpe").css('border', '1px solid black');
                $(".errAgeEditOpe").hide();
            }
    
            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }
    
        function errEmptyBirthPlace(){
            if($(".birthPlaceEditOpe").val() == ""){
                $(".birthPlaceEditOpe").css('border', '1px solid red');
                $(".errBirthPlaceEditOpe").show();
            }else{
                $(".birthPlaceEditOpe").css('border', '1px solid black');
                $(".errBirthPlaceEditOpe").hide();
            }
        }
    
        function errEmptyAddress(){
            if($(".addressEditOpe").val() == ""){
                $(".addressEditOpe").css('border', '1px solid red');
                $(".errAddressEditOpe").show();
            }else{
                $(".addressEditOpe").css('border', '1px solid black');
                $(".errAddressEditOpe").hide();
            }
        }
    
        function errEmptyContactNumber(){
            if($(".contactNumberEditOpe").val() == ""){
                $(".contactNumberEditOpe").css('border', '1px solid red');
                $(".errContactNumberEditOpe").show();
            }else{
                $(".contactNumberEditOpe").css('border', '1px solid black');
                $(".errContactNumberEditOpe").hide();
            }
        }
    
        function errLessAndMoreContactNumber(){
            if($(".contactNumberEditOpe").val().length < 11){
                $(".errContactNumberLessMorethanEditOpe").show();
            }else{
                $(".errContactNumberLessMorethanEditOpe").hide();
            }
        }
    
        function errEmptyLicenseNumber(){
            if($(".licenseNumberEditOpe").val() == ""){
                $(".licenseNumberEditOpe").css('border', '1px solid red');
                $(".errLicenseNumberEditOpe").show();
            }else{
                $(".licenseNumberEditOpe").css('border', '1px solid black');
                $(".errLicenseNumberEditOpe").hide();
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
            var a = $(".contactNumberEditOpe").val().length;
            return a;
        }
    });

    $(document).on("submit", "#formTraEdit" , function(e) {
        e.preventDefault();
    
        var dataId = $("#dataIdEditTra").val();
        var roleName = $("#roleNameEditTra").val().toUpperCase();
        var roleName = $("#roleNameEditTra").val().toUpperCase();
        var lastName = $("#lastNameEditTra").val().toUpperCase();
        var middleName = $("#middleNameEditTra").val().toUpperCase();
        var firstName = $("#firstNameEditTra").val().toUpperCase();
        var birthMonth = $("#birthMonthEditTra").val().toUpperCase();
        var birthDay = $("#birthDayEditTra").val();
        var birthYear = $("#birthYearEditTra").val();
        var birthPlace = $("#birthPlaceEditTra").val().toUpperCase();
        var gender = $("#genderEditTra").val().toUpperCase();
        var civilStatus = $("#civilStatusEditTra").val().toUpperCase();
        var address = $("#addressEditTra").val().toUpperCase();
        var contactNumber = $("#contactNumberEditTra").val();
        var licenseNumber = $("#licenseNumberEditTra").val();
        var licenseExpMon = $("#licenseExpMonEditTra").val().toUpperCase();
        var licenseExpday = $("#licenseExpdayEditTra").val();
        var licenseExpYear = $("#licenseExpYearEditTra").val();
    
        // console.log(dataId);
        // console.log(lastName);
        // console.log(middleName);
        // console.log(firstName);
        // console.log(birthMonth);
        // console.log(birthDay);
        // console.log(birthYear);
        // console.log(birthPlace);
        // console.log(gender);
        // console.log(civilStatus);
        // console.log(address);
        // console.log(contactNumber);
        // console.log(licenseNumber);
        // console.log(licenseExpMon);
        // console.log(licenseExpday);
        // console.log(licenseExpYear);
    
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
        if($("#roleNameEditTra").val() != ""  && $("#lastNameEditTra").val() != ""  && $("#firstNameEditTra").val() != "" && $("#birthMonthEditTra").val() != "" && $("#birthDayEditTra").val() != "" && ageRestriction() > 17 && $("#birthPlaceEditTra").val() != "" && $("#genderEditTra").val() != "" && $("#civilStatusEditTra").val() != "" && $("#addressEditTra").val() != "" && $("#contactNumberEditTra").val() != "" && contactNumberLessMore() >= 11 && $("#licenseNumberEditTra").val() != "" && $("#licenseExpMonEditTra").val() != "" && $("#licenseExpdayEditTra").val() != "" && $("#licenseExpYearEditTra").val() != ""){
            
            $.ajax({
                url: './asset/php/main/edit-trad-driver.php', // Backend Script
                type: 'POST', // Type POST 
                data: { 
                    dataId: dataId,
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
                    if(data == "Success Update"){
                        $(".staffDisplayTra").load("./asset/php/main/display-staff-puj-trad.php");
                        $(".editTraContainer").hide();
                        $(".successUpdateContainer").show();
                        $('.successUpdateContainer').delay(5000).fadeOut();
                    }
                }
            });
        }
    
        // Error Function
        function errEmptyLname(){
            if($(".lNameEditTra").val() == ""){
                $(".lNameEditTra").css('border', '1px solid red');
                $(".errLnameEditTra").show();
            }else{
                $(".lNameEditTra").css('border', '1px solid black');
                $(".errLnameEditTra").hide();
            }
        }
    
        function errEmptyFname(){
            if($(".fNameEditTra").val() == ""){
                $(".fNameEditTra").css('border', '1px solid red');
                $(".errFnameEditTra").show();
            }else{
                $(".fNameEditTra").css('border', '1px solid black');
                $(".errFnameEditTra").hide();
            }
        }
    
        function errBelow18(){
            // Birth Date Error
            if((ageRestriction() < 18)){
                $(".birthYearEditTra").css('border', '1px solid red');
                $(".errAgeEditTra").show();
            }else{
                $(".birthYearEditTra").css('border', '1px solid black');
                $(".errAgeEditTra").hide();
            }
    
            function ageRestriction(){
                var tdate = new Date();
                var year = tdate.getFullYear();
    
                var resultAge =  year - birthYear;
    
                return resultAge;
            }
        }
    
        function errEmptyBirthPlace(){
            if($(".birthPlaceEditTra").val() == ""){
                $(".birthPlaceEditTra").css('border', '1px solid red');
                $(".errBirthPlaceEditTra").show();
            }else{
                $(".birthPlaceEditTra").css('border', '1px solid black');
                $(".errBirthPlaceEditTra").hide();
            }
        }
    
        function errEmptyAddress(){
            if($(".addressEditTra").val() == ""){
                $(".addressEditTra").css('border', '1px solid red');
                $(".errAddressEditTra").show();
            }else{
                $(".addressEditTra").css('border', '1px solid black');
                $(".errAddressEditTra").hide();
            }
        }
    
        function errEmptyContactNumber(){
            if($(".contactNumberEditTra").val() == ""){
                $(".contactNumberEditTra").css('border', '1px solid red');
                $(".errContactNumberEditTra").show();
            }else{
                $(".contactNumberEditTra").css('border', '1px solid black');
                $(".errContactNumberEditTra").hide();
            }
        }
    
        function errLessAndMoreContactNumber(){
            if($(".contactNumberEditTra").val().length < 11){
                $(".errContactNumberLessMorethanEditTra").show();
            }else{
                $(".errContactNumberLessMorethanEditTra").hide();
            }
        }
    
        function errEmptyLicenseNumber(){
            if($(".licenseNumberEditTra").val() == ""){
                $(".licenseNumberEditTra").css('border', '1px solid red');
                $(".errLicenseNumberEditTra").show();
            }else{
                $(".licenseNumberEditTra").css('border', '1px solid black');
                $(".errLicenseNumberEditTra").hide();
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
            var a = $(".contactNumberEditTra").val().length;
            return a;
        }
    });

});