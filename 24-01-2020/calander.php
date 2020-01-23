<?php

    $days = 'mon tue wed thu fri sat sun';
    if(isset($_POST['month']) && isset($_POST['year'])){

        $month = $_POST['month'];
        $year = $_POST['year'];

        if((strlen($year) == 4 || strlen($year) == 2) && (strlen($month) == 2 || strlen($month) == 1)){
            
            $date = $year.'-'.$month.'-01';
            
            echo $day =  strtolower(date('D', strtotime($date)));

            echo (int)(strpos($days,$day)/3);



        } else{
            echo 'Please Enter Valid Year or Month';
        }

        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calander</title>
</head>
<body>
    <br><hr><hr><br>

    <form action="calander.php" method="post">
        <input type="number" name="month" id="month" placeholder="Enter Month (MM)"><br>
        <input type="number" name="year" id="year" placeholder="Enter Year (YYYY)"><br>
        <input type="submit" value="Print Calander">
    </form>
</body>
</html>