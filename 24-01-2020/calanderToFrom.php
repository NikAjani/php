<?php

    function validMonthAndYear($monthFrom,$yearFrom,$monthTo,$yearTo){
        $valid = false;

        if(strlen($monthFrom) == 2 || strlen($monthFrom) == 1){
            $valid = true;
        } else{    
            return false;
        }
        
        if(strlen($yearFrom) == 4 || strlen($yearFrom) == 2){
            $valid = true;
        } else{ 
            return false;
        }

        if(strlen($monthTo) == 2 ||  strlen($monthTo) == 1) {
            $valid = true;
        } else{ 
            return false;
        }

        if(strlen($yearTo) == 4 || strlen($yearTo) == 2){
            $valid = true;
        } else{    
            return false;
        }
        
        return $valid;
    }

    if(isset($_POST['monthFrom']) && isset($_POST['yearFrom']) && isset($_POST['monthTo']) && isset($_POST['yearTo'])){

        $monthFrom = $_POST['monthFrom'];
        $yearFrom = $_POST['yearFrom'];
        $monthTo = $_POST['monthTo'];
        $yearTo = $_POST['yearTo'];

        $dateFrom = '01-'.$monthFrom.'-'.$yearFrom;
        $dateTo = '01-'.$monthTo.'-'.$yearTo;

        echo $dateFrom.'<br>'.$dateTo;

        if(validMonthAndYear($monthFrom,$yearFrom,$monthTo,$yearTo)){
            echo 'all Valid';
        } else{
            echo '<Br><br><b>Please Enter Valid Month And Year</b>';
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

    <form action="calanderToFrom.php" method="post" enctype="multipart/form-data">

        <input type="number" name="monthFrom" id="monthFrom" placeholder="Enter Month From"><br>
        <input type="number" name="yearFrom" id="yearFrom" placeholder="Enter Year From"><br>
        <input type="number" name="monthTo" id="monthTo" placeholder="Enter Month To"><br>
        <input type="number" name="yearTo" id="yearTo" placeholder="Enter Year To"><br>
        <input type="submit" value="Print Calander">
    </form>
</body>
</html>