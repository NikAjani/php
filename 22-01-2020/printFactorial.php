<?php

    $number = 0;
    $factorial = 1;

    if(isset($_GET['number'])){
        $number = $_GET['number'];
            
        if($number == 0 || $number == 1)
            echo 'Factorial = 1';
        else{

            for($i = 1; $i <= $number; $i++){
                $factorial *= $i;
            }

            echo 'Factorial is : '.$factorial;
        }

        function findFactorial($number){
            
            if($number == 0 || $number == 1)
                return 1;
            else    
                return $number * findFactorial($number - 1);
        }

        echo '<br> Factorial Using Recursive : '.findFactorial($number);

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pattern 3</title>
    
</head>
<body>
    <br><br>
    <hr>
    <br>
    <form action="printFactorial.php" action="get">
        <input type="number" name="number" id="number" placeholder="Enter Number">
        <input type="submit" value="Print Factorial">
    </form>
</body>
</html>