<?php
    class classLicenseDate{

        function __construct($expMontNum, $expDayNum, $expYearNum){
            $this->expMontNum = $expMontNum;
            $this->expDayNum = $expDayNum;
            $this->expYearNum = $expYearNum;
        }

        function getExpMonth(){
            for( $m=1; $m<=12; ++$m ) { 
                $month_label = date('F', mktime(0, 0, 0, $m, $this->expMontNum));
                if($m != $this->expMontNum){
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

        function getExpDay(){
            $start_date = 1;
            $end_date = 31;
            for( $j=$start_date; $j<=$end_date; $j++ ) {
                if($j != $this->expDayNum){
                    echo '<option value='.$j.'>'.$j.'</option>';
                }else{
                    echo '<option value='.$j.' selected >'.$j.'</option>';
                }
            }
        }

        function getExpYear(){
            $year = date('Y');
            $min = $year - 100;
            $max = $year + 20;

            for( $i=$max; $i>=$min; $i-- ) {
                if($i == $this->expYearNum){
                    echo '<option value='.$i.' selected>'.$i.'</option>';
                }else{
                    echo '<option value='.$i.' >'.$i.'</option>';
                }
              
            }
        }
    }
?>