<?php

    /* date() is used to get current Date.
        date('Y') used to get Current Year 2020
        date('y') used to get current year 20
        date('M') used to get current Month Jan'
        date('m') used to get current month 01
        date('D') used to get current Date Mon
        date('d') used to get current date 20
    */
    //Basic Function
    function calcAge(){
        $birthYear = 1998;

        echo 'Current Age is : ',(date("Y") - $birthYear).'<br>';
    }

    calcAge();

    //With Parameter Function

    function calAgeWithParam($birthYear){

        echo 'Current Age is : ',(date("Y") - $birthYear).'<br>';
    }

    calAgeWithParam(2000);

    //with param with return 

    function calAgeWithReturn($birthYear){

        return date("Y") - $birthYear;
    }

    echo 'Current age is : ',calAgeWithReturn(2012).'<br>';

    function getCurrentDate(){
        echo 'Current Date (in Short formate) : '.date('d').' - '.date('m'). ' - '.date('y').'<br>';
    }

    function getFullCurrentDate(){
        echo 'Current Date (in full formate) : '.date('D').' - '.date('M'). ' - '.date('Y').'<br>';
    }

    getCurrentDate();
    getFullCurrentDate();
?>