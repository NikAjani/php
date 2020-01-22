<?php

   require_once 'hcf.php';
   $number1 = 8;
   $number2 = 12;
   echo '<br>';
   echo '<b>LCM of  : '.$number1.' And '.$number2.' LCM is = ',(($number1 * $number2) / findHcf($number1,$number2)).'</b>';
?>