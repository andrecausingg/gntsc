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
    <title>GNTSC - Logs</title>

    <!-- Css -->
    <link rel="stylesheet" href="./asset/scss/style.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/7aca08648e.js" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>

</head>
<body>
    <!-- Header -->
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

    <!-- Main Container -->
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
                        <a href="salary-trad" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Butaw</a>
                        <a href="salary-staff" class="yot-text-fs-l yot-mb-16 yot-tc-white">Manage Staff Salary</a>
                        <a href="log" class="yot-text-fs-l yot-tc-white yot-nav-active">Logs</a>
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
        <section style="width: 100%; margin-top: 80px; position: relative;" class="dashboard-section-rightF yot-container yot-right-container">
            <div class="dashboard-logo-container yot-hide-for-mobile">
                <img src="./asset/images/logo.jpg" alt="">
            </div>

            <div class="yot-text-center yot-mb-16 yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                <h2>Grotto-Novaliches Transport Service Cooperative</h2>
            </div>

            <!-- File Path and Time Date -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-fs-xl yot-mb-16">
                <div class="yot-flex yot-flex-ai-c">
                    <h2>Logs</h2>
                </div>

                <div class="yot-text-end" id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <!-- Search Input and Search Date -->
            <div class="yot-row yot-flex-ai-c-jc-sb yot-text-fs-xl ">
                <!-- Input Search -->
                <!-- <div>
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-l yot-text-start"><b>Search</b></label>
                        <input class="yot-form-input" type="text" name="searchName" id="searchName" placeholder="Search Full Name">
                    </div>
                </div> -->

                <!-- Date Search -->
                <!-- <div class="yot-flex">
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-m yot-text-start"><b>Start Date</b></label>
                        <input class="yot-form-input startDate" type="date" name="startDate" id="startDate">
                    </div>

                    <div class="yot-form-group yot-ml-8">
                        <label for="" class="yot-text-fs-m yot-text-start"><b>End Date</label>
                        <input class="yot-form-input endDate" type="date" name="endDate" id="endDate">
                        <span class="yot-tc-red errEndDate" style="display: none;"><b>The End Date field is required.</b></span>
                    </div>
                </div>   -->
            </div>

            <!-- Data -->
            <div style=" overflow-y: auto; height: 500px;" class="displayLogs">
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

    <script src="./asset/js/ajax/display-logs.js"></script>
    <script src="./asset/js/ajax/log-search-name-date.js"></script>
</body>
</html>