<?php
    class classBirthDate{

        function __construct($birthMonthNum, $birthdayNum, $birthYearNum){
            $this->birthMonthNum = $birthMonthNum;
            $this->birthdayNum = $birthdayNum;
            $this->birthYearNum = $birthYearNum;
        }

        function getBirthMonth(){
            for( $m=1; $m<=12; ++$m ) { 
                $month_label = date('F', mktime(0, 0, 0, $m, $this->birthMonthNum));
                if($m != $this->birthMonthNum){
                    echo '
                        <option value="' . $m .'">' . $month_label . '</option>
                    ';
                }else{
                    echo '
                        <option value="' . $m .'" selected>' . $month_label . '</option>
                    ';
                }

            }
        }

        function getBirthDay(){
            $start_date = 1;
            $end_date = 31;
            for( $j=$start_date; $j<=$end_date; $j++ ) {
                if($j != $this->birthdayNum){
                    echo '<option value='.$j.'>'.$j.'</option>';
                }else{
                    echo '<option value='.$j.' selected >'.$j.'</option>';
                }
            }
        }

        function getBirthYear(){
            $year = date('Y');
            $min = $year - 100;
            $max = $year;

            for( $i=$max; $i>=$min; $i-- ) {
                if($i != $this->birthYearNum){
                    echo '<option value='.$i.' >'.$i.'</option>';
                }else{
                    echo '<option value='.$i.' selected>'.$i.'</option>';
                }
              
            }
        }
    }
?>