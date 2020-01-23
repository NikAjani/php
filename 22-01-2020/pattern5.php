<?php

    $row = 0;
    $col = 0;
    if(isset($_GET['row']) && isset($_GET['col'])){
        $row = $_GET['row'];
        $col = $_GET['col'];

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
    <table>
        <?php
            echo '<tr>';
            for($i = 1; $i <= $row; $i++){
                $k = $i;
                for($j = 1; $j <= $col; $j++){
                    echo '<td>'.($k).'</td>';
                    $k += $row;
                }
                echo '</tr>';
            }
        }
        ?>
    </table>

    <br><br>
    <hr>
    <br>
    <form action="pattern5.php" action="get">
        <input type="number" name="row" id="row" placeholder="Enter No Of Row">
        <input type="number" name="col" id="col" placeholder="Enter No Of col">
        <input type="submit" value="Print Pattern">
    </form>
</body>
</html>