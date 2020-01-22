<?php

    $number;
    if(isset($_GET['numberForTable'])){
        $number = $_GET['numberForTable'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table of number</title>
</head>
<body>
    <table border="1"> 
        <?php   
            for($i = 1; $i <= $number; $i++){
                echo '<tr>';
                for($j = 1; $j <= 10; $j++){
                    echo '<td>'.$j*$i.'</td>';
                }
                echo '</tr>';
            }
        ?>
    </table>

    <br>
    <hr>
    <br>

    <form action="valueOfTableInHtml.php" method="get">
        <input type="number" name="numberForTable" id="numberForTable">
        <input type="submit" name="submit" value="Print Table">
    </form>
</body>
</html>