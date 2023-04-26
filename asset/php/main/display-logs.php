<?php
    $classDisplayLogs = new classDisplayLogs();
    $classDisplayLogs->displayLogs();

    class classDisplayLogs{

        function displayLogs(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");

            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM log_tbl ORDER BY lt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                
                if($row["lt_action"] == "create"){
                    echo '
                        <div class="yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                            <p><span class="yot-tc-green">CREATE</span> = '. $row["lt_time"] .' | ' . $row["lt_date"] .' = '. $row["lt_description"] . " " . $row["lt_page"] .'</p>
                        </div>
                    ';
                }

                if($row["lt_action"] == "edit"){
                    echo '
                        <div class="yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                            <p><span class="yot-tc-vibrant-orange">EDIT</span> = '. $row["lt_time"] .' | ' . $row["lt_date"] .' = '. $row["lt_description"] . " " . $row["lt_page"] .'</p>
                        </div>
                    ';
                }
                
                if($row["lt_action"] == "delete"){
                    echo '
                        <div class="yot-bg-rapsody-blue yot-tc-white yot-pa-16">
                            <p><span class="yot-tc-red">DELETE</span> = '. $row["lt_time"] .' | ' . $row["lt_date"] .' = '. $row["lt_description"] . " " . $row["lt_page"] .'</p>
                        </div>
                    ';
                }
                


            }
        }
    }
?>