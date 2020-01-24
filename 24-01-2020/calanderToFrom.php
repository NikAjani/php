<?php
    $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

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
        $monthTo = $_POST['monthTo']+1;
        $yearTo = $_POST['yearTo'];

        $dateFrom = $yearFrom.'-'.$monthFrom.'-01';
        $dateTo = $yearTo.'-'.$monthTo.'-01';;


        $dateFrom = new DateTime($dateFrom);
        $dateTo = new DateTime($dateTo);

        if(validMonthAndYear($monthFrom,$yearFrom,$monthTo,$yearTo)){

            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($dateFrom, $interval, $dateTo);
            foreach ($period as $dt) {
                //echo $dt->format("Y-m-t") . "<br>\n";
                $lastDate = $dt->format("t");
                $firstDate = strtolower($dt->format('D'));
                $currentMonth = $dt->format('M');
                $firstDate = array_search($firstDate, $days);
                printMonth($firstDate, $lastDate, $currentMonth);
                
            }
        } else{
            echo '<Br><br><b>Please Enter Valid Month And Year</b>';
        }

    }

    function printMonth($firstDate,$lastDate, $currentMonth){
        $k = 2;
        echo '<table border="1">';
        echo '<caption><h2>'.$currentMonth.'</h2></caption>';
        echo '<tr>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thur</th>
        <th>Fri</th>
        <th>Sat</th>
        <th>Sun</th>
        </tr>';

        for($i = 0; $i <= 6; $i++){
            echo '<tr>';
            if($i == 0){
                if($firstDate >= 1)
                    echo '<td colspan="'.($firstDate+1).'">1</td>';
                else    
                    echo '<td>1</td>';
    
                $j = $firstDate+1;
            } else
                $j = 0;

            for(; $j <= 6; $j++){
                echo '<td>'.$k.'</td>';
                
                if($lastDate == $k){
                    break;
                }
                $k++;
            }
            if($k == $lastDate){
                break;
            }
            echo '</tr>';
        }
        echo '</table>';
        
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calander</title>
    <style>
        table{
            text-align: right;
        }
    </style>
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