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
    <title>GNTSC - Butaw</title>

    <!-- Css -->
    <link rel="stylesheet" href="./asset/scss/style.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/7aca08648e.js" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>

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
                        <a href="dispatch" class="yot-text-fs-l yot-tc-white">Manage Dispatch</a>
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
                        <a href="salary-trad" class="yot-text-fs-l yot-mb-16 yot-tc-white yot-nav-active">Manage Butaw</a>
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
                    <h2>Manage-butaw</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <!-- Search Input and Search Date -->
            <div class="yot-row yot-flex-ai-c-jc-sb yot-text-fs-xl ">
                <!-- Input Search -->
                <div>
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-l yot-text-start"><b>Search</b></label>
                        <input class="yot-form-input" type="text" name="searchName" id="searchName" placeholder="Search Driver Name">
                    </div>
                </div>

                <!-- Date Search -->
                <div class="yot-flex">
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-m yot-text-start"><b>Start Date</b></label>
                        <input class="yot-form-input startDate" type="date" name="startDate" id="startDate">
                    </div>

                    <div class="yot-form-group yot-ml-8">
                        <label for="" class="yot-text-fs-m yot-text-start"><b>End Date</label>
                        <input class="yot-form-input endDate" type="date" name="endDate" id="endDate">
                        <span class="yot-tc-red errEndDate" style="display: none;"><b>The End Date field is required.</b></span>
                    </div>
                </div>  

                <!-- Add Btn Staff -->
                <div class="yot-flex">
                    <!-- PDF -->
                    <div class="yot-ml-8">
                        <button style="font-size: 20px;" class="yot-btn-primary btnPdf">PDF</button>
                    </div>

                    <div class="yot-ml-8">
                        <button id="btnComputeTrad" style="font-size: 20px;" class="yot-btn-primary">Compute</button>
                    </div>
                </div>
            </div>

            <!-- Salary Computation Trad-->
            <div id="salaryTradCompute" class="dashboard-edit-update-container yot-bg-white" style="display: none;">
                <!-- Computation Trad -->
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Computation for Butaw</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>

                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <div id="saveTradSalary" class="yot-mt-8 saveTrad" style="display: none;">
                            <button style="font-size: 16px;" class="yot-btn-primary">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form id="formSalaryTrad" style=" overflow-x: auto; height: 550px; margin-top:24px;">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Driver</b></label>
                            <select class="yot-form-input driverNameTrad" name="driverNameTrad" id="driverNameTrad" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-puj-pao.php");
                                    $classDisplayPujPao = new classDisplayPujPao();
                                    $classDisplayPujPao->displayTra();
                                ?>
                            </select>
                            <span class="yot-tc-red errDriverNameTrad" style="display: none;"><b>The Driver field is required.</b></span>
                        </div>
                    </div>
            
                    <hr class="yot-mb-16">
                    
                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Plate No.</b></label>
                            <input class="yot-form-input plateNumTrad" type="text" name="plateNumTrad" id="plateNumTrad">
                            <span class="yot-tc-red errPlateNumTrad" style="display: none;"><b>The Plate No. field is required.</b></span>
                        </div>
                    </div>

                    <hr class="yot-mb-16">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Daily Butaw</b></label>
                            <input class="yot-form-input dailyButawTrad" type="text" name="dailyButawTrad" id="dailyButawTrad">
                            <span class="yot-tc-red errdailyButawTrad" style="display: none;"><b>The Daily Butaw field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Savings</b></label>
                            <input class="yot-form-input savingsTrad" type="text" name="savingsTrad" id="savingsTrad">
                            <span class="yot-tc-red errsavingsTrad" style="display: none;"><b>The Expenses field is required.</b></span>
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Terminal Fee </b></label>
                            <input class="yot-form-input terminalFeeTrad" type="text" name="terminalFeeTrad" id="terminalFeeTrad">
                            <span class="yot-tc-red errterminalFeeTrad" style="display: none;"><b>The Terminal Fee field is required.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Monthly Butaw </b></label>
                            <input class="yot-form-input monthlyButawTrad" type="text" name="monthlyButawTrad" id="monthlyButawTrad">
                            <span class="yot-tc-red errmonthlyButawTrad" style="display: none;"><b>The Monthly Butaw field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Membership fee </b></label>
                            <input class="yot-form-input memberShipFeeTrad" type="text" name="memberShipFeeTrad" id="memberShipFeeTrad">
                            <span class="yot-tc-red errmemberShipFeeTrad" style="display: none;"><b>The Membership Fee field is required.</b></span>
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Others</b></label>
                            <input class="yot-form-input othersTrad" type="text" name="othersTrad" id="othersTrad">
                            <span class="yot-tc-red errothersTrad" style="display: none;"><b>The Membership Fee field is required.</b></span>
                        </div>
                    </div>

                    <hr class="yot-mb-16">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Total Remarks</b></label>
                            <input class="yot-form-input totalRemarksTrad" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="totalRemarksTrad" id="totalRemarksTrad" disabled>
                        </div>
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-text-center">
                        <!-- <button  id="compute">Compute</button> -->
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary" type="submit" value="Save">
                    </div>
                </form>
            </div>

            <!-- Edit Salary Computation Trad-->
            <div id="salaryTradComputeEdit"></div>
            
            <!-- Delete Salary Computation Trad -->
            <div id="deleteContainerTrad"></div>

            <!-- Data -->
            <div style=" overflow-y: auto; height: 500px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th>Driver Name</th>
                            <th>Plate No.</th>
                            <th>Daily Butaw</th>
                            <th>Savings</th>
                            <th>Terminal Fee</th>
                            <th>Monthly Butaw</th>
                            <th>Membership</th>
                            <th>Others</th>
                            <th>Total Remarks</th>
                            <th>Time Created</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="displayTradSalary">
                    </tbody>
                </table>
            </div>


            <!-- Pdf Butaw-->
            <div class="butawFormPdfContainer dashboard-edit-update-container yot-bg-white" style="display: none;">
                <!-- Computation MPUJ -->
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Creating Butaw Report</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>
                </div>

                <!-- Form -->
                <form method="post" action="./asset/php/helper/pdf/pdf-salary-butaw.php">
                <!-- <form method="post" action="" > -->
                    <div class="yot-flex-tab yot-flex-jc-c">
                        <div class="yot-form-group" style="width: 255px;">
                            <label for="" class="yot-text-fs-m"><b>Start Date</b></label>
                            <input class="yot-form-input startDatePdf" type="date" name="startDate" id="startDatePdf">
                            <span class="yot-tc-red errStartDate" style="display: none;"><b>The Start Date field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator" style="width: 255px;">
                            <label for="" class="yot-text-fs-m"><b>End Date</label>
                            <input class="yot-form-input endDatePdf" type="date" name="endDate" id="endDatePdf" >
                            <span class="yot-tc-red errEndDate" style="display: none;"><b>The End Date field is required.</b></span>
                        </div>
                    </div>
            
                    <hr class="yot-mb-8">
    
                    <!-- Submit btn -->
                    <div class="yot-text-center btnFormSubmitButaw" style="display: none;">
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary btnFormSubmitButaw" id="pdfSubmit" type="submit" name="submit" value="Submit" >
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

     <script src="./asset/js/ajax/insert-trad-salary.js"></script>
     <script src="./asset/js/ajax/edit-trad-salary.js"></script>
     <script src="./asset/js/ajax/delete-salary-trad.js"></script>

     <script src="./asset/js/ajax/display-edit-salary-trad.js"></script>
     <script src="./asset/js/ajax/display-delete-salary-trad.js"></script>
     
     <script src="./asset/js/ajax/butaw-salary-search-name-date.js"></script>
     <script src="./asset/js/ajax/pdf.js"></script>
</body>
</html>