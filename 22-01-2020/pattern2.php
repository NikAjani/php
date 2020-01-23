<?php

    $row = 0;

    if(isset($_GET['row'])){
        $row = $_GET['row'];

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
            for($i = $row; $i > 0; $i--){
                for($j = 1; $j <= $i; $j++)
                    echo '<td>'.$j.'</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>

    <br><br>
    <hr>
    <br>
    <form action="pattern2.php" action="get">
        <input type="number" name="row" id="row" placeholder="Enter No Of Row">
        <input type="submit" value="Print Pattern">
    </form>
</body>
</html>