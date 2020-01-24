<?php
    session_start();

    $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
    if((isset($_SESSION['month'])) || isset($_POST['month']) && isset($_POST['year']) && isset($_FILES['calanderImg'])){

        
        // $to = 'ajaninikhil23@gmail.com';
        // $subject = 'Test';
        // $body = 'This is From Localhost';
        // $headers .= 'From: <webmaster@example.com>' . "\r\n";

        if(isset($_POST['month']) && isset($_POST['year'])){
            
            $month = $_POST['month'];
            $year = $_POST['year'];
            $imgName = $_FILES['calanderImg']['name'];
            $imgTempLocation = $_FILES['calanderImg']['tmp_name'];
            $extension = strtolower(substr($imgName, strpos($imgName, '.')+1));
            $fileType = $_FILES['calanderImg']['type'];
            if(!empty($imgName)){

                if(($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') && ($fileType == 'image/jpeg' || $fileType == 'image/png')){

                    $location = 'uploads/';

                    if(move_uploaded_file($imgTempLocation, $location.$imgName)){
                        //echo 'File Uploaded';
                        $_SESSION['imgName'] = $imgName;
                        $_SESSION['location'] = $location;
                    } else{
                        echo 'Eroor in File Upload';
                    }

                } else{
                    echo 'File Should be jpeg/jpg/png';
                   exit();
                }
            } else{
                echo 'Please choose File';      
                exit();
            }

        } else{

            $month = $_SESSION['month'];
            $year = $_SESSION['year'];
            $imgName = $_SESSION['imgName'];
            $location = $_SESSION['location'];
        }

           
        if((strlen($year) == 4 || strlen($year) == 2) && (strlen($month) == 2 || strlen($month) == 1)){
            
            $date = $year.'-'.$month.'-01';
            
            $day =  strtolower(date('D', strtotime($date)));

            $tempMonth = strtoupper(date('M',strtotime($date)));

            $day = array_search($day, $days);

            $lastDate = date('t', strtotime($date));

            echo'<br>';

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
        img{
            height: 250;
            width: 460px;
        }
    </style>
</head>
<body>

    <table border="1">
        
        <caption><h2><?php echo $tempMonth; ?></h2></caption>

        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednsday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
        <?php    
                $k = 2;
                $_SESSION['month'] = $month;
                $_SESSION['year'] = $year;
                for($i=0; $i <= 6; $i++){
                    echo '<tr>';

                    if($i == 0){
                        if($day >= 1)
                            echo '<td colspan="'.($day+1).'">1</td>';
                        else    
                            echo '<td>1</td>';

                        $j = $day+1;
                    } 
                    else 
                        $j = 0;
                    
                    for(; $j <= 6; $j++){
                        echo '<td>'.$k.'</td>';
                        if($k == $lastDate)
                            break;
                        $k++;
                    }
                    if($k == $lastDate)
                            break;
                    echo '</tr>';
                }

                echo '<img src="'.$location.$imgName.'"><br>';

                //mail($to, $subject, $body, $headers);
        
        } else{
            echo 'Please Enter Valid Year or Month';
        }
    }

    ?>
    
    </table>

    <br><hr><hr><br>

    <form action="calander.php" method="post" enctype="multipart/form-data">
        <input type="number" name="month" id="month" placeholder="Enter Month (MM)"><br>
        <input type="number" name="year" id="year" placeholder="Enter Year (YYYY)"><br>
        <input type="file" name="calanderImg" id="calanderImg"><br>
        <input type="submit" value="Print Calander">
    </form>
</body>
</html>