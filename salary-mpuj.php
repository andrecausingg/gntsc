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
    <title>GNTSC - Salary MPUJ</title>

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
                        <a href="salary-mpuj" class="yot-text-fs-l yot-mb-16 yot-tc-white yot-nav-active">Manage Mpuj Salary </a>
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
                    <h2>Salary-mpuj</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <!-- Search Input and Search Date -->
            <div class="yot-row yot-flex-ai-c-jc-sb yot-text-fs-xl ">
                <div class="yot-form-group">
                    <label for="" class="yot-text-fs-m"><b>Driver</b></label>
                    <select class="yot-form-input driverNameMpujSearch" name="driverNameMpujSearch" id="driverNameMpujSearch" style="width: 250px;">
                        <?php
                            require_once("./asset/php/main/display-puj-pao.php");
                            $classDisplayPujPao = new classDisplayPujPao();
                            $classDisplayPujPao->displayPuj();
                        ?>
                    </select>
                    <span class="yot-tc-red errDriverNameMpuj" style="display: none;"><b>The Driver field is required.</b></span>
                </div>

                <div class="yot-form-group">
                    <label for="" class="yot-text-fs-m"><b>PAO </b></label>
                    <select class="yot-form-input paoMpujSearch" name="paoMpujSearch" id="paoMpujSearch" style="width: 250px;">
                        <?php
                            require_once("./asset/php/main/display-puj-pao.php");
                            $classDisplayPujPao = new classDisplayPujPao();
                            $classDisplayPujPao->displayPao();
                        ?>
                    </select>
                    <span class="yot-tc-red errPaoNameMpuj" style="display: none;"><b>The Pao field is required.</b></span>
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
                        <button id="btnComputeMpuj" style="font-size: 20px;" class="yot-btn-primary">Compute</button>
                    </div>
                </div>
            </div>

            <!-- Salary Computation MPUJ-->
            <div id="salaryMpujCompute" class="dashboard-edit-update-container yot-bg-white" style="display: none;">
                <!-- Computation MPUJ -->
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Salary Computation for MPUJ</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>

                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <div>
                            <h4>Inserting Salary</h4>
                        </div>

                        <div class="yot-mt-8 saveMpuj saveMpujSalary" style="display: none;">
                            <button style="font-size: 16px;" class="yot-btn-primary">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form id="formMpujSalary" style=" overflow-x: auto; height: 550px; margin-top:24px;">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Driver</b></label>
                            <select class="yot-form-input driverMpuj" name="driverNameMpuj" id="driverNameMpuj" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-puj-pao.php");
                                    $classDisplayPujPao = new classDisplayPujPao();
                                    $classDisplayPujPao->displayPuj();
                                ?>
                            </select>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>PAO </b></label>
                            <select class="yot-form-input paoMpuj" name="paoNameMpuj" id="paoNameMpuj" style="width: 250px;">
                                <?php
                                    require_once("./asset/php/main/display-puj-pao.php");
                                    $classDisplayPujPao = new classDisplayPujPao();
                                    $classDisplayPujPao->displayPao();
                                ?>
                            </select>
                        </div>
                    </div>
            
                    <hr class="yot-mb-16">
                    
                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Rounds 1</b>  <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujOne" type="number" name="roundsMpujOne" id="roundsMpujOne" value="0">
                            <span class="yot-tc-red errRoundMpujOne" style="display: none;"><b>The Rounds No.1 field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Rounds 2</b> <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujTwo" type="number" name="roundsMpujTwo" id="roundsMpujTwo" value="0">
                            <span class="yot-tc-red errRoundMpujTwo" style="display: none;"><b>The Rounds No.2 field is required.</b></span>
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Rounds 3</b> <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujThree" type="number" name="roundsMpujThree" id="roundsMpujThree" value="0">
                            <span class="yot-tc-red errRoundMpujThree" style="display: none;"><b>The Rounds No.3 field is required.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Rounds 4</b> <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujFour" type="number" name="roundsMpujFour" id="roundsMpujFour" value="0">
                            <span class="yot-tc-red errRoundMpujFour" style="display: none;"><b>The Rounds No.4 field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Rounds 5</b> <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujFive" type="number" name="roundsMpujFive" id="roundsMpujFive" value="0">
                            <span class="yot-tc-red errRoundMpujFive" style="display: none;"><b>The Rounds No.5 field is required.</b></span>
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Rounds 6</b> <br> <span class="yot-text-fs-sm">(Cash render)</span></label>
                            <input class="yot-form-input roundsMpujSix" type="number" name="roundsMpujSix" id="roundsMpujSix" value="0">
                            <span class="yot-tc-red errRoundMpujSix" style="display: none;"><b>The Rounds No.6 field is required.</b></span>
                        </div>
                    </div>

                    <hr class="yot-mb-16">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Expenses </b></label>
                            <input class="yot-form-input expensesMpuj" type="number" name="expensesMpuj" id="expensesMpuj">
                            <span class="yot-tc-red errExpensesMpuj" style="display: none;"><b>The Expenses field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Boundary </b></label>
                            <input class="yot-form-input boundaryMpuj" type="number" name="boundaryMpuj" id="boundaryMpuj">
                            <span class="yot-tc-red errBoundaryMpuj" style="display: none;"><b>The Boundary field is required.</b></span>
                        </div>

                        <div class="yot-form-group ">
                            <label for="" class="yot-text-fs-m"><b>Diesel </b></label>
                            <input class="yot-form-input dieselMpuj" type="number" name="dieselMpuj" id="dieselMpuj">
                            <span class="yot-tc-red errDieselMpuj" style="display: none;"><b>The Diesel field is required.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">

                    </div>

                    <hr class="yot-mb-16">

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Cash</b></label>
                            <input class="yot-form-input cashMpuj" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="cashMpuj" id="cashMpuj" disabled>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Hand Held</b></label>
                            <input class="yot-form-input handHeldMpuj" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="handHeld" id="handHeld" disabled>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Total Amount</b></label>
                            <input class="yot-form-input totalAmountMpuj" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="totalAmountMpuj" id="totalAmountMpuj" disabled>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Driver Income </b></label>
                            <input class="yot-form-input driverIncomeMpuj" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="driverIncomeMpuj" id="driverIncomeMpuj" disabled>
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Pao Income </b></label>
                            <input class="yot-form-input paoIncomeMpuj" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="paoIncomeMpuj" id="paoIncomeMpuj" disabled>
                        </div>
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-text-center">
                        <!-- <button  id="compute">Compute</button> -->
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary compute" type="submit" value="Save">
                    </div>
                </form>
            </div>

            <!-- Edit Salary Computation MPUJ-->
            <div id="salaryMpujComputeEdit"></div>
            
            <!-- Delete Salary Computation MPUJ -->
            <div id="deleteContainerMpuj"></div>

            <!-- Data -->
            <div style=" overflow-y: auto; height: 500px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th>Pao FullName</th>
                            <th>Driver FullName</th>
                            <th>Rounds No.1</th>
                            <th>Rounds No.2</th>
                            <th>Rounds No.3</th>
                            <th>Rounds No.4</th>
                            <th>Rounds No.5</th>
                            <th>Rounds No.6</th>
                            <th>Cash</th>
                            <th>Expenses</th>
                            <th>Handeld</th>
                            <th>Boundary</th>
                            <th>Diesel</th>
                            <th>Total Amount</th>
                            <th>Pao Income</th>
                            <th>Driver Income</th>
                            <th>Time Created</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="displaySalaryMpuj">
                    </tbody>
                </table>
            </div>

            <!-- Pdf Butaw-->
            <div class="mpujFormPdfContainer dashboard-edit-update-container yot-bg-white" style="display: none;">
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Creating Mpuj Report</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>
                </div>

                <!-- Form -->
                <form method="post" action="./asset/php/helper/pdf/pdf-salary-mpuj-all.php">
                <!-- <form method="post" action="" > -->
                    <div class="yot-flex-tab yot-flex-jc-c">
                        <div class="yot-form-group" style="width: 255px;">
                            <label for="" class="yot-text-fs-m"><b>Start Date</b></label>
                            <input class="yot-form-input startDatePdf" type="date" name="startDate" id="startDatePdf">
                            <span class="yot-tc-red errStartDate" style="display: none;"><b>The Start Date field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator" style="width: 255px;">
                            <label for="" class="yot-text-fs-m"><b>End Date</label>
                            <input class="yot-form-input endDatePdf" type="date" name="endDate" id="endDatePdf">
                            <span class="yot-tc-red errEndDate" style="display: none;"><b>The End Date field is required.</b></span>
                        </div>
                    </div>
            
                    <hr class="yot-mb-8">
    
                    <!-- Submit btn -->
                    <div class="yot-text-center btnFormSubmitButaw" style="display: none;">
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary btnFormSubmitButaw" id="pdfSubmit" type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

    <script src="./asset/js/ajax/insert-mpuj-salary.js"></script>
    <script src="./asset/js/ajax/edit-mpuj-salary.js"></script>
    <script src="./asset/js/ajax/delete-salary-mpuj.js"></script>

    <script src="./asset/js/ajax/display-edit-salary-mpuj.js"></script>
    <script src="./asset/js/ajax/display-delete-salary-mpuj.js"></script>
    
    <script src="./asset/js/ajax/mpuj-salary-search-name-date.js"></script>
    <script src="./asset/js/ajax/pdf.js"></script>
</body>
</html>