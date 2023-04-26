<?php
    require_once("./asset/php/helper/security/user-session.php");
    $classSecurity = new classSecurity();
    $classSecurity->sessionSecurity();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GNTSC - Dispatch</title>

    <!-- Css -->
    <link rel="stylesheet" href="./asset/scss/style.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/7aca08648e.js" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>

    
    <!-- datetime picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet"/>
</head>
<body>
    <header id="header" class="yot-header yot-hide-for-desktop yot-bg-white" style="z-index: 5;">
        <nav class="yot-flex yot-flex-ai-c-jc-sb yot-container yot-pa-16">
            <div>
                <h2 class="yot-tc-vibrant-orange">GNTSC</h1>
            </div>

            <div id="openHamburger" class="yot-hamburger yot-hide-for-desktop">
                <span></span><span></span><span></span>
            </div>
        </nav>
    </header>

    <!-- Full View Dispatch -->
    <div class="yot-overlay-mid" style="z-index: 99; display:none;" id="dispatchContainerFullView">
        <div class="yot-overlay-mid-child yot-container">
            <!-- Route -->
            <div class="yot-flex yot-flex-ai-c-jc-sb">
                <h1>Central Terminal to Novaliches</h1>
                
                <div>
                    <button id="closeBtnFullview" style="font-size: 20px;" class=" yot-btn-primary yot-mb-8">Close</button>
                </div>
            </div>
            <!-- Data -->
            <div style=" overflow-y: auto; height: 300px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th style="font-size: 18px;">Driver Name</th>
                            <th style="font-size: 18px;">Pao Name</th>
                            <th style="font-size: 18px;">Mpuj No.</th>
                            <th style="font-size: 18px;">Plate No.</th>
                            <th style="font-size: 18px;">Time of Departure</th>
                            <th style="font-size: 18px;">Expected arrival</th>
                        </tr>
                    </thead>

                    <tbody class="displayDispatchCtToNovaClassNoAct">

                    </tbody>

                    <?php
                        // require_once("./asset/php/main/display-dispatch.php");
                        // $classDisplayDispatch = new classDisplayDispatch();
                        // $classDisplayDispatch->displayNoActionDispatchCtToNova();
                    ?>
                </table>
            </div>

            
            <!-- Route -->
            <h1>Novaliches to Central Terminal</h1>
            <!-- Data -->
            <div style=" overflow-y: auto; height: 300px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th style="font-size: 18px;">Driver Name</th>
                            <th style="font-size: 18px;">Pao Name</th>
                            <th style="font-size: 18px;">Mpuj No.</th>
                            <th style="font-size: 18px;">Plate No.</th>
                            <th style="font-size: 18px;">Time of Departure</th>
                            <th style="font-size: 18px;">Expected arrival</th>
                        </tr>
                    </thead>

                    <tbody class="displayDispatchNovaToCtClassNoAct">
                    </tbody>

                    <?php
                        // require_once("./asset/php/main/display-dispatch.php");
                        // $classDisplayDispatch = new classDisplayDispatch();
                        // $classDisplayDispatch->displayNoActionDispatchNovaToCt();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Success Add -->
    <div class="successAddContainer yot-pa-24 yot-flex yot-flex-ai-c-jc-sb  yot-tc-white" style=" border-radius: 8px; background-color:green; z-index:99; position: fixed;top:20px; right: 20px; width: 300px; display: none;">
        <div>
            <h4>Inserted Successfully</h4>
        </div>
        <i class="closeBtnSuccess fa-solid fa-circle-xmark yot-text-fs-xxl yot-cursor-pointer"></i>
    </div>

    <!-- Success Add -->
    <div class="successUpdateContainer yot-pa-24 yot-flex yot-flex-ai-c-jc-sb  yot-tc-white" style=" border-radius: 8px; background-color:green; z-index:99; position: fixed;top:20px; right: 20px; width: 300px; display: none;">
        <div>
            <h4>Update Successfully</h4>
        </div>
        <i class="closeBtnSuccess fa-solid fa-circle-xmark yot-text-fs-xxl yot-cursor-pointer"></i>
    </div>

    <!-- Success Delete -->
    <div class="successDeleteContainer yot-pa-24 yot-flex yot-flex-ai-c-jc-sb  yot-tc-white" style=" border-radius: 8px; background-color:green; z-index:99; position: fixed;top:20px; right: 20px; width: 300px; display: none;">
        <div>
            <h4>Delete Successfully</h4>
        </div>
        <i class="closeBtnSuccess fa-solid fa-circle-xmark yot-text-fs-xxl yot-cursor-pointer"></i>
    </div>

    <div class="dashboard-container">
        <!-- Left Section -->
        <section id="navLeftContainer" class="yot-ma-16 yot-pa-16 yot-bg-sea-of-tears dashboard-right-section yot-hide-for-mobile yot-overlay-left" style="height: 95vh; width:300px; border-radius:10px; z-index: 5; overflow-y: auto;">
            <div class="yot-flex yot-flex-fd-c">
                <!-- Logo and Hamburger -->
                <div class="yot-flex yot-flex-ai-c-jc-sb dashboard-logo">
                    <div class="yot-flex yot-flex-ai-c-jc-c">
                        <img class="yot-mr-4" src="./asset/images/logo.jpg" alt="logo" width="36" height="36">
                        <h2 class="yot-tc-white yot-ml-4">GNTSC</h1>
                    </div>

                    <div id="closeHamburger" class="yot-hamburger yot-hamburger-open yot-hide-for-desktop">
                        <span></span><span></span><span></span>
                    </div>
                </div>

                <!-- Seperator -->
                <div class="yot-mtb-8"></div>

                <!-- Dashboard-->
                <div>
                    <div class="yot-flex yot-flex-ai-c-jc-c yot-bg-vibrant-orange yot-pa-16" style="border-radius: 8px;">
                        <i class="fa-solid fa-table-columns yot-text-fs-m yot-mlr-8"></i>
                        <h4><b>Dashboard</b></h4>
                    </div>
                    
                    <div class="yot-flex yot-flex-fd-c-ai-c yot-mtb-16">
                        <a href="home" class="yot-text-fs-l yot-mb-16 yot-tc-white">Home</a>
                        <a href="manage-driver" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Mpuj Driver</a>
                        <a href="manage-trad-driver" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Trad Driver</a>
                        <a href="manage-pao" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Mpuj Pao</a>
                        <a href="manage-staff" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Staff</a>
                        <a href="manage-operator" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Mpuj Operators</a>
                        <a href="mpuj" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Mpuj</a>
                        <a href="trad" class="yot-text-fs-l yot-tc-white yot-mb-16">Manage Trad</a>
                        <a href="dispatch" class="yot-text-fs-l yot-tc-white yot-nav-active">Manage Dispatch</a>
                    </div>
                </div>

                <!-- Reports-->
                <div>
                    <div class="yot-flex yot-flex-ai-c-jc-c yot-bg-vibrant-orange yot-pa-16" style="border-radius: 8px;">
                        <i class="fa-solid fa-cash-register yot-text-fs-m yot-mlr-8"></i>
                        <h4><b>Reports</b></h4>
                    </div>
                    
                    <div class="yot-flex yot-flex-fd-c-ai-c yot-mtb-16">
                        <a href="salary-mpuj" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Mpuj Salary </a>
                        <a href="salary-trad" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Butaw</a>
                        <a href="salary-staff" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Staff Salary</a>
                        <a href="log" class="yot-text-fs-l yot-tc-white">Logs</a>
                        <!--<a href="attendance" class="yot-text-fs-l yot-tc-white">View Attendance</a>-->
                    </div>
                </div>

                <!-- Settings-->
                <div>
                    <div class="yot-flex yot-flex-ai-c-jc-c yot-bg-vibrant-orange yot-pa-16" style="border-radius: 8px;">
                        <i class="fa-solid fa-gear yot-text-fs-m yot-mlr-8"></i>
                        <h4><b>Settings</b></h4>
                    </div>
                    
                    <div class="yot-flex yot-flex-fd-c-ai-c yot-mtb-16">

                        <a href="accounts" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Users</a>
                        <a href="logout" class="yot-text-fs-l yot-tc-white">Logout</a>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Right Section -->
        <section style="width: 100%; margin-top: 80px; position: relative; z-index: 2;" class="dashboard-section-rightF yot-container yot-right-container">
            <div class="dashboard-logo-container yot-hide-for-mobile">
                <img src="./asset/images/logo.jpg" alt="">
            </div>

            <div class="yot-text-center yot-mb-16 yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                <h2>Grotto-Novaliches Transport Service Cooperative</h2>
            </div>

            <!-- File Path and Time Date -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-fs-xl yot-mb-16">
                <div class="yot-flex yot-flex-ai-c">
                    <h2>Manage-dispatch</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <!-- Central Terminal To Nova -->
            <!-- Btn -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-end yot-text-fs-xl yot-mt-16">
                <div>
                    <button id="btnCreateCtToNova" style="font-size: 20px;" class="yot-btn-primary yot-mb-8">Create Dispatch</button>
                </div>

                <div>
                    <button id="btnFullviewDispatch" style="font-size: 20px;" class="yot-btn-primary yot-mb-8">Full View</button>
                </div>
            </div>
            <!-- Inserting Dispatch Info Central Terminal to Novaliches-->
            <div id="dispatchContainerCtToNova" class="dashboard-edit-update-container yot-bg-white" style="display: none;">
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Adding Dispatch Info</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>

                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h4>Central Terminal to Novaliches</h5> <br>
                    </div>
                </div>

                <!-- Form -->
                <form id="formDispatchCttoNova" style=" overflow-x: auto;margin-top:24px; height:500px;">
                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Route</b></label>
                            <select class="yot-form-input" name="routeDispatch" id="routeDispatch" style="width: 250px;">
                                <option value="1">Central Terminal To Novaliches</option>
                                <option value="2">Novaliches to Central Terminal</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Driver</b></label>
                            <select class="yot-form-input" name="driverFullNameDispatch" id="driverFullNameDispatch" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-puj-pao.php");
                                    $classDisplayPujPao = new classDisplayPujPao();
                                    $classDisplayPujPao->displayPujNameOnly();
                                ?>
                            </select>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>PAO </b></label>
                            <select class="yot-form-input" name="paoFullNameDispatch" id="paoFullNameDispatch" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-puj-pao.php");
                                    $classDisplayPujPao = new classDisplayPujPao();
                                    $classDisplayPujPao->displayPaoNameOnly();
                                ?>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Mpuj No.</b></label>
                            <select class="yot-form-input" name="mpujNumDispatch" id="mpujNumDispatch" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-mpujnum-platenum.php");
                                    $classDisplayMpujNumPlateNum = new classDisplayMpujNumPlateNum();
                                    $classDisplayMpujNumPlateNum->displayMpujNum();
                                ?>
                            </select>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Plate No. </b></label>
                            <select class="yot-form-input" name="plateNumDispatch" id="plateNumDispatch" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-mpujnum-platenum.php");
                                    $classDisplayMpujNumPlateNum = new classDisplayMpujNumPlateNum();
                                    $classDisplayMpujNumPlateNum->displayPlateNum();
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- <hr>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Destination</b></label>
                            <select class="yot-form-input" name="destinationDispatch" id="destinationDispatch" style="width: 250px;">
                                <option value="STARMALL">STARMALL</option>
                                <option value="BSU SARMIENTO">BSU SARMIENTO</option>
                                <option value="AREA E">AREA E</option>
                                <option value="SAMPOL">SAMPOL</option>
                            </select>
                        </div>
                    </div> -->

                    
                    <hr>
                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Time of Departure</b></label>
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <span>Day/Month/Year</span>
                                <span>Hour:Minute</span>
                            </div>
                            <input class="yot-form-input datePicker" type="text" id="timeOfDepartureDispatch">
                            <span class="yot-tc-red errDatePicker" style="display: none;"><b>The Time of Departure field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Time of Arrival</b></label>
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <span>Day/Month/Year</span>
                                <span>Hour:Minute</span>
                            </div>
                            <input class="yot-form-input datePicker" type="text" id="timeOfArrivalDispatch">
                            <span class="yot-tc-red errDatePicker" style="display: none;"><b>The Time of Arrival field is required.</b></span>
                        </div>
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-text-center">
                        <!-- <button  id="compute">Compute</button> -->
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <!-- Edit Dispatch Info-->
            <div id="editContainerCtToNova"></div>
            <!-- Delete Dispatch Info -->
            <div id="deleteContainerCtToNova"></div>
            <!-- Route -->
            <h1>Central Terminal to Novaliches</h1>
            <!-- Data -->
            <div style=" overflow-y: auto; height: 200px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th>Driver Name</th>
                            <th>Pao Name</th>
                            <th>Mpuj No.</th>
                            <th>Plate No.</th>
                            <!-- <th>Destination</th> -->
                            <th>Time of Departure</th>
                            <th>Expected arrival</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="displayDispatchCtToNovaClass">
                    </tbody>

                    <?php
                        // require_once("./asset/php/main/display-dispatch.php");
                        // $classDisplayDispatch = new classDisplayDispatch();
                        // $classDisplayDispatch->displayDispatchCtToNova();
                    ?>
                </table>
            </div>

            <!-- Route -->
            <h1>Novaliches to Central Terminal</h1>
            <!-- Data -->
            <div style=" overflow-y: auto; height: 200px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th>Driver Name</th>
                            <th>Pao Name</th>
                            <th>Mpuj No.</th>
                            <th>Plate No.</th>
                            <!-- <th>Destination</th> -->
                            <th>Time of Departure</th>
                            <th>Expected arrival</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="displayDispatchNovaToCtClass">
                    </tbody>

                    <?php
                        // require_once("./asset/php/main/display-dispatch.php");
                        // $classDisplayDispatch = new classDisplayDispatch();
                        // $classDisplayDispatch->displayDispatchNovatoCt();
                    ?>
                </table>
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

    <!-- Central Terminal To Nova -->
    <script src="./asset/js/ajax/insert-dispatch-cttonova.js"></script>
    <script src="./asset/js/ajax/edit-dispatch-cttonova.js"></script>
    <script src="./asset/js/ajax/delete-dispatch-cttonova.js"></script>

    <script src="./asset/js/ajax/display-edit-dispatch-cttonova.js"></script>
    <script src="./asset/js/ajax/display-delete-dispatch-cttonova.js"></script>
    
</body>
</html>