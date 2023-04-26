<?php
    // Start the session
    session_start();

    if(isset($_POST["username"]) && isset($_POST["password"])){
        // Class 
        $classLogin = new classLogin();
        $classLogin->setEP($_POST["username"],$_POST['password']);
        $classLogin->verifyPassword();
    }

    // Start of classSignUp
    class classLogin{
        // Properties
        private $username;
        private $password;

        // Method
        function setEP($username, $password){
            $this->username = $username;
            $this->password = $password;
        }

        function verifyPassword(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // CLASS Connection on Database 
            $classDataBaseConnection = new classDataBaseConnection();

            // This table for user_accounts_table
            $check_username_table = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_username ='$this->username'");
            $check_username_row = mysqli_num_rows($check_username_table); // Get the data on specific row database

            // If username exist on user_accounts_table. Goods to fetch the password on database and match on the user input
            if($check_username_row > 0){
                while($row = mysqli_fetch_assoc($check_username_table)){
                    $db_u_id = $row["u_id"];
                    $db_u_password = $row["u_password"];

                    // Session
                    $_SESSION["u_id"] = $row["u_id"];

                    // Cookiee
                    $cookie_name = "user";
                    setcookie($cookie_name, $db_u_id);

                    if($db_u_password == $this->password){
                        echo "<script>window.location.href='home';</script>";
                    }else{
                        echo '                
                            <div id="usernamePassErrContainer" class="yot-text-center yot-bg-white yot-pa-24 yot-mb-16 yot-text-fs-m yot-tc-red" >
                                <span><b> Username or Password Is Incorrect </b></span> <br>
                            </div>
                        ';
                    }
                } // End of While 
            }else{
                echo '
                    <div id="errAccountNotFound" class="yot-text-center yot-bg-white yot-pa-24 yot-mb-16 yot-text-fs-m yot-tc-red" >
                        <span><b> Account Not Found </b></span> <br>
                    </div>
                ';
            }
        }
    }

?>