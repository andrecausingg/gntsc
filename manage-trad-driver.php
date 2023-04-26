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
    <title>GNTSC - Manage Driver</title>

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
                        <a href="manage-trad-driver" class="yot-text-fs-l yot-tc-white yot-mb-16 yot-nav-active">Manage Trad Driver</a>
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
        <section style="width: 100%; margin-top: 80px; position: relative;" class="yot-container yot-right-container dashboard-section-rightF">
            <div class="dashboard-logo-container yot-hide-for-mobile">
                <img src="./asset/images/logo.jpg" alt="">
            </div>

            <div class="yot-text-center yot-mb-16 yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                <h2>Grotto-Novaliches Transport Service Cooperative</h2>
            </div>

            <!-- File Path and Time Date -->
            <div class="yot-flex yot-flex-ai-c-jc-sb yot-text-fs-xl yot-mb-16">
                <div class="yot-flex yot-flex-ai-c">
                    <h2>Manage-trad-driver</h2>
                </div>

                <div id="currentDate" style="font-weight: bolder;"></div>
            </div>

            <!-- Search Input and Search Date BTN PDF-->
            <div class="yot-row yot-flex-ai-c-jc-sb yot-text-fs-xl ">
                <!-- Input Search -->
                <div>
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-l yot-text-start"><b>Search</b></label>
                        <input class="yot-form-input" type="text" name="searchName" id="searchName" placeholder="Search Full Name">
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
                    <div class="yot-mr-8">
                        <a target="_blank" href="./asset/php/helper/pdf/pdf-staff-puj-trad.php" style="font-size: 18px;" class="yot-btn-primary remove-hover">Print PDF</a>
                    </div>

                    <!-- Btn Puj -->
                    <div>
                        <button id="btnPuj" style="font-size: 16.5px;" class="yot-btn-primary">Add Driver</button>
                    </div>
                </div>
            </div>

            <!-- Add Tra-->
            <div id="addPujContainer" class="dashboard-edit-update-container yot-bg-white" style="display: none;">
                <div class="yot-bg-vibrant-orange yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                    <div>
                        <h4>Adding Trad Driver Information</h4>
                    </div>

                    <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                </div>

                <!-- Form -->
                <form id="formTra" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                    <div class="yot-flex-tab">
                    <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Role</b></label>
                            <input class="yot-form-input" type="text" value="Driver" disabled>
                        </div>

                        <div class="yot-form-group" style="display: none;">
                            <label for="" class="yot-text-fs-m"><b>Role</b></label>
                            <input class="yot-form-input" type="text" name="roleName" id="roleName" value="TRA" disabled>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                            <input class="yot-form-input lName" type="text" name="lastName" id="lastName">
                            <span class="yot-tc-red errLname" style="display: none;"><b>The Last Name field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                            <input class="yot-form-input" type="text" name="middleName" id="middleName">
                        </div>

                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                            <input class="yot-form-input fName" type="text" name="firstName" id="firstName">
                            <span class="yot-tc-red errFname" style="display: none;"><b>The First Name field is required.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                            <div class="yot-flex">
                                <select class="yot-form-input" name="birthMonth" id="birthMonth" style="width: 150px;">
                                    <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                </select>

                                <select class="yot-form-input yot-form-select-seperator" name="birthDay" id="birthDay" style="width: 150px;">
                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                                </select>

                                <select class="yot-form-input birthYear" name="birthYear" id="birthYear" style="width: 150px;">
                                    <option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                                </select>
                            </div>
                            <span class="yot-tc-red errAge" style="display: none;"><b>The Age Must 18 Above.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                            <input class="yot-form-input birthPlace" type="text" name="birthPlace" id="birthPlace">
                            <span class="yot-tc-red errBirthPlace" style="display: none;"><b>The Birth Place field is required.</b></span>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                            <select class="yot-form-input" name="gender" id="gender" style="width: 150px;">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                            <select class="yot-form-input" name="civilStatus" id="civilStatus" style="width: 150px;">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Seperated">Seperated</option>
                            </select>
                        </div>

                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>Address</b></label>
                            <input class="yot-form-input address" type="text" name="address" id="address">
                            <span class="yot-tc-red errAddress" style="display: none;"><b>The Address field is required.</b></span>
                        </div>

                        <div class="yot-form-group ">
                            <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                            <input class="yot-form-input contactNumber" type="text" name="contactNumber" id="contactNumber">
                            <span class="yot-tc-red errContactNumber" style="display: none;"><b>The Contact Number field is required.</b></span>
                            <span class="yot-tc-red errContactNumberLessMorethan" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                        </div>
                    </div>

                    <div class="yot-flex-tab">
                        <div class="yot-form-group">
                            <label for="" class="yot-text-fs-m"><b>License Number</b></label>
                            <input class="yot-form-input licenseNumber" type="text" name="licenseNumber" id="licenseNumber">
                            <span class="yot-tc-red errLicenseNumber" style="display: none;"><b>The License Number field is required.</b></span>
                        </div>
                        
                        <div class="yot-form-group yot-form-input-seperator">
                            <label for="" class="yot-text-fs-m"><b>License Expired Date</b></label>
                            <div class="yot-flex">
                                <select class="yot-form-input" name="licenseExpMon" id="licenseExpMon" style="width: 100px;">
                                    <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                </select>

                                <select class="yot-form-input yot-form-select-seperator" name="licenseExpday" id="licenseExpday" style="width: 100px;">
                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                                </select>

                                <select class="yot-form-input" name="licenseExpYear" id="licenseExpYear" style="width: 100px;">
                                    <?php
                                        require_once("./asset/php/helper/others/option-dateHF.php");
                                        $classDate = new classDate();
                                        $classDate->getYear();
                                    ?>
                                    <!-- <option value="2028">2028</option><option value="2027">2027</option><option value="2026">2026</option><option value="2025">2025</option><option value="2024">2024</option><option value="2023">2023</option><option value="2022" selected="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option> -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-text-center">
                        <input style="font-size: 20px; width: 50%;" class="yot-btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            
            <!-- Edit Tra -->
            <div id="editTraContainerDisplay"></div>

            <!-- Delete -->
            <div id="deleteContainer"></div>

            <!-- Data -->
            <div style=" overflow-y: auto; height: 500px;">
                <table class="yot-styled-table" style="overflow: hidden;">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Birth Date <br>(M/D/Y)</th>
                            <th>Birth Place</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>License</th>
                            <th>Expired Date <br>(M/D/Y)</th>
                            <th>Time / Date Created <br>(M/D/Y)</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="staffDisplayTra">
                        
                    </tbody>

                    <?php
                        // require_once("./asset/php/main/display-staff.php");
                        // $classDisplayStaff = new classDisplayStaff();
                        // $classDisplayStaff->displayStaff();
                    ?>
                </table>
            </div>

            <!-- Remarks -->
            <div id="remarksCRUD"></div>
        </section>
    </div>

    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/time-date.js"></script>
    <script src="./asset/js/function-hml/hamburger.js"></script>
    <script src="./asset/js/function-hml/show-hide-container.js"></script>
    <script src="./asset/js/function-hml/edit-delete.js"></script>

    <script src="./asset/js/ajax/insert-puj-pao-ins.js"></script>
    <script src="./asset/js/ajax/edit-puj-pao-ins.js"></script>
    <script src="./asset/js/ajax/delete-puj-pao-ins.js"></script>
    <script src="./asset/js/ajax/display-edit-puj-pao-ins.js"></script>
    <script src="./asset/js/ajax/display-delete-puj-pao-ins.js"></script>

    <script src="./asset/js/ajax/display-remarks.js"></script>
    <script src="./asset/js/ajax/display-delete-remarks.js"></script>
    <script src="./asset/js/ajax/display-edit-remarks.js"></script>

    <script src="./asset/js/ajax/insert-remarks.js"></script>
    <script src="./asset/js/ajax/edit-remarks.js"></script>
    <script src="./asset/js/ajax/delete-remarks.js"></script>

    <script src="./asset/js/ajax/trad-puj-search-name-date.js"></script>
</body>
</html>