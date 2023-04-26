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
    <title>GNTSC - Attendance</title>

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
                        <a href="attendance" class="yot-text-fs-l yot-tc-white yot-nav-active">View Attendance</a>
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
        <section style="width: 100%; margin-top: 80px; position: relative; z-index: 2;" class="yot-container yot-right-container">
            <div class="dashboard-logo-container yot-hide-for-mobile">
                <img src="./asset/images/logo.jpg" alt="">
            </div>

            <div class="yot-text-center yot-mb-16 yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                <h2>Grotto-Novaliches Transport Service Cooperative</h2>
            </div>
            <!-- File Path and Time Date -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-fs-xl yot-mb-16">
                <div class="yot-flex yot-flex-ai-c">
                    <h2>Attendance</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <div class="yot-flex yot-flex-ai-c-jc-e yot-text-end yot-text-fs-xl yot-mt-16">
                <!-- PDF -->
                <div>
                    <a target="_blank" href="./asset/php/helper/pdf/pdf-attendance" style="font-size: 18px;" class="yot-btn-primary remove-hover">Print PDF</a>
                </div>

                <div class="yot-mlr-8">
                    <button id="btnCreateAccount" style="font-size: 20px;" class="yot-btn-primary">Upload Attendance</button>
                </div>
            </div>

             <!-- Inserting Mpuj Info-->
             <div id="createAccountContainer" class="dashboard-edit-update-container yot-bg-white" style="display: none;">
                <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                        <h3>Upload Attendance</h3> <br>
                        <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                    </div>
                </div>

                <!-- Form -->
                <form method="post" action="import" enctype="multipart/form-data" style=" overflow-x: auto;margin-top:24px;">
                    <div class="yot-form-group" style="justify-content: center;">
                        <label for="" class="yot-text-fs-m"><b>Attendance File</b></label>
                        <input type="file" name="file" id="file" class="yot-form-input">
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-text-center">
                        <button style="font-size: 20px; width: 50%;" type="submit" id="submit" name="Import" class="yot-btn-secondary" data-loading-text="Loading...">Upload</button>
                        <!-- <input style="font-size: 20px; width: 50%;"  type="submit" value="Submit"> -->
                    </div>
                </form>
            </div>

            <!-- Edit Mpuj Info-->
            <div id="editMpujContainer"></div>

            <!-- Delete Mpuj Info -->
            <div id="deleteMpujContainer"></div>
            
            <!-- Data -->
            <div style=" overflow-y: auto; height: 500px;">
                <table class="yot-styled-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Driver Full Name</th>
                            <th>Pao Full Name</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require_once("./asset/php/main/display-attendance.php");
                            $classDisplayAttendance = new classDisplayAttendance();
                            $classDisplayAttendance->displayAttendance();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

    <script src="./asset/js/ajax/insert-mpuj-info.js"></script>
    <script src="./asset/js/ajax/edit-mpuj-info.js"></script>
    <script src="./asset/js/ajax/delete-mpuj-info.js"></script>

    <script src="./asset/js/ajax/display-edit-mpuj-info.js"></script>
    <script src="./asset/js/ajax/display-delete-mpuj-info.js"></script>
</body>
</html>