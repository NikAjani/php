<?php

    $number = 0;
    if(isset($_GET['number'])){
        $number = $_GET['number'];
        $isPrime = true;

        if($number > 2){

            for($i = 2; $i < (int)($number / 2); $i++){
                if(($number % $i) == 0)
                    $isPrime = false;
            }
        }

        if($number == 1 || $number == 0)
            echo '1 and 0 is Prime number';
        else{
            if($isPrime)
                echo $number.' Number is Prime';
            else    
                echo $number.' Number is Not Prime';
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pattern 3</title>
    <style>
        td{
            padding: 3px;
        }
    </style>
</head>
<body>
    <br><br>
    <hr>
    <br>
    <form action="primeNumber.php" action="get">
        <input type="number" name="number" id="number" placeholder="Enter Number">
        <input type="submit" value="Check Prime">
    </form>
</body>
</html>