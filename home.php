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
    <title>GNTSC - Home</title>

    <!-- Css -->
    <link rel="stylesheet" href="./asset/scss/style.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/7aca08648e.js" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>

</head>
<body>
    <header id="header" class="yot-header yot-hide-for-desktop yot-bg-white" style="z-index: 3;">
        <nav class="yot-flex yot-flex-ai-c-jc-sb yot-container yot-pa-16">
            <div>
                <h2 class="yot-tc-vibrant-orange">GNTSC</h1>
            </div>

            <div id="openHamburger" class="yot-hamburger yot-hide-for-desktop">
                <span></span><span></span><span></span>
            </div>
        </nav>
    </header>

    <div class="dashboard-container">
        <!-- Left Section -->
        <section id="navLeftContainer" class="yot-ma-16 yot-pa-16 yot-bg-sea-of-tears dashboard-right-section yot-hide-for-mobile yot-overlay-left" style="height: 95vh; width:300px; border-radius:10px; z-index: 2; overflow-y: auto;">
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
                        <a href="home" class="yot-text-fs-l yot-mb-16 yot-tc-white yot-nav-active">Home</a>
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
        <section style="width: 100%; margin-top: 80px;  position: relative;" class="yot-container yot-right-container dashboard-section-rightF">
            <div class="dashboard-logo-container yot-hide-for-mobile">
                <img src="./asset/images/logo.jpg" alt="">
            </div>

            <div class="yot-text-center yot-mb-16 yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                <h2>Grotto-Novaliches Transport Service Cooperative</h2>
            </div>

            <!-- File Path and Time Date -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-fs-xl yot-mb-16">
                <div class="yot-flex yot-flex-ai-c">
                    <h2>Home</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <div class="yot-row dashboard-container-item yot-tc-white">
                <div style="border-top: 2px solid red; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/employee.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Driver</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayPuj();
                            ?>
                        </h3>
                    </div>
                </div>

                <div style="border-top: 2px solid purple; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/employee.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Public Assistants Officer</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayPao();
                            ?>
                        </h3>
                    </div>
                </div>

                <div style="border-top: 2px solid green; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/employee.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Staff</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayIns();
                            ?>
                        </h3>
                    </div>
                </div>
                
                <div style="border-top: 2px solid blue; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/employee.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Operator</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayOpe();
                            ?>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="yot-row dashboard-container-item yot-tc-white">
                <div style="border-top: 2px solid red; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/user.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Accounts</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayAccountNum();
                            ?>
                        </h3>
                    </div>
                </div>

                <div style="border-top: 2px solid green; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/traditional-jeep.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">MPUJ</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayMpujNum();
                            ?>
                        </h3>
                    </div>
                </div>
                
                <div style="border-top: 2px solid blue; border-radius: 10px;" class="yot-col-25 yot-bg-rapsody-blue yot-pa-16 yot-mb-16 yot-bg-white yot-flex yot-flex-ai-c-jc-sb">   
                    <div>
                        <img src="./asset/images/icons/mpuj.png" alt="">
                    </div>
                    
                    <div class="yot-text-end">
                        <span class="yot-text-fs-m">Traditional Jeep</span>
                        <h3>
                            <?php
                                require_once("./asset/php/main/display-count.php");
                                $classCount = new classCount();
                                $classCount->displayTradNum();
                            ?>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="yot-row dashboard-container-item-b-exp yot-jc-c">
                <div class="dashboard-notification-container yot-bg-rapsody-blue yot-mb-16 yot-pa-16" style="border-radius: 8px;">
                    <h2 class="yot-mb-16 yot-tc-white yot-text-center">Birth Day</h2>

                    <div id="#style-1" style="height:250px; overflow-x: auto;">
                        <?php
                            require_once("./asset/php/main/display-birthday-today.php");
                            $classDisplayBirthDayToday = new classDisplayBirthDayToday();
                            $classDisplayBirthDayToday->displayBirthDayToday();
                        ?>
                    </div>
                </div>  

                <div class="dashboard-notification-container yot-bg-rapsody-blue yot-mb-16 yot-pa-16" style="border-radius: 8px;">
                    <h2 class="yot-mb-16 yot-tc-white yot-text-center">License Expiration Alert</h2>

                    <div id="#style-1" style="height:250px; overflow-x: auto;">
                        <?php
                            require_once("./asset/php/main/display-expire-license.php");
                            $classDisplayExpLicense = new classDisplayExpLicense();
                            $classDisplayExpLicense->displayExpLicense();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/time-date.js"></script>
</body>
</html>