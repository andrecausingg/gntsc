<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GNTSC</title>

    <!-- Css -->
    <link rel="stylesheet" href="./asset/scss/style.css">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <!-- Parent Container -->
    <div class="yot-row yot-flex yot-flex-ai-c-jc-c yot-container" style="height: 100vh;">

        <!-- Image Container -->
        <section class="yot-col-50">
            <img class="yot-hide-for-mobile-login" src="./asset/images/undraw_informed_decision_p2lh.svg  " alt="">
        </section>

        <!-- Form Container -->
        <section class="yot-col-50 yot-form-container">
            <div class="yot-bg-white yot-pa-24 yot-w-100" style="border-radius: 8px;">
                <!-- Title -->
                <div class="yot-mb-24 yot-text-center">
                    <h1>Welcome back to <br> <span class="yot-tc-vibrant-orange">GNTSC</span></h1>
                </div>

                <div id="errUserPass"></div>

                <div id="errUsernamePassInc" class="yot-text-center yot-bg-white yot-pa-24 yot-mb-16 yot-text-fs-m yot-tc-red" style="display: none;">
                    <span><b> Username or Password Is Incorrect </b></span> <br>
                </div>

                <div id="errAccountNotFound" class="yot-text-center yot-bg-white yot-pa-24 yot-mb-16 yot-text-fs-m yot-tc-red" style="display: none;">
                    <span><b> Account Not Found </b></span> <br>
                </div>

                <!-- Form -->
                <form id="logInForm">
                    <!-- Username -->
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-m"><b>Username</b></label>
                        <input class="yot-form-input" type="text" name="username" id="username">
                    </div>

                    <!-- Password -->
                    <div class="yot-form-group">
                        <label for="" class="yot-text-fs-m"><b>Password</b></label>
                        <input class="yot-form-input" type="password" name="password" id="password">
                    </div>

                    <!-- Submit btn -->
                    <div class="yot-form-group">
                        <input style="font-size: 20px;" class="yot-btn-primary" type="submit" value="Log In">
                    </div>
                </form>
            </div>
        </section>
    </div>


    <script src="./asset/js/ajax/login-username-password.js"></script>
</body>
</html>