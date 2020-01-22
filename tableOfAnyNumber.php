<?php

    if(isset($_GET['numberForTable']) && isset($_GET['submit'])){

        $numberForTable = $_GET['numberForTable'];

        for($i = 1; $i <= 10; $i++){
            echo $numberForTable.' * '.$i.' = '.$i*$numberForTable.'<br>';
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table of Any Number</title>
</head>
<body>
    <br>
    <hr>
    <br>

    <form action="tableOfAnyNumber.php" method="get">
        <input type="number" name="numberForTable" id="numberForTable">
        <br>
        <input type="submit" name="submit" value="Print Table">
    </form>
</body>
</html>