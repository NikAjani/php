<?php

    $fileName = 'phpFileHandling.txt';

    if(isset($_GET['readData'])){

        if(file_exists($fileName)){

            $fileHandler = fopen($fileName,'r');
            
            $dataFromFile = fread($fileHandler, filesize($fileName));

            $dataFromFile = explode(',', $dataFromFile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Data From File</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        <?php  
            
                foreach($dataFromFile as $singleRow){
                    echo '<tr>';

                    $rowData = explode('|',$singleRow);

                    if($rowData[0] == "\n")
                        break;
                    for($i = 0; $i < sizeof($rowData); $i++){
                        
                        if($i == 0)
                            echo '<td>'.$rowData[$i].'</td>';
                        else    
                            echo '<td>'.$rowData[$i].'</td>';
                    }

                    echo '</tr>';
                }
                fclose($fileHandler);
            }else{
               
                die('File is Not Found Or File is Empty');
            }
        }
        ?>
    </table>
    <br><hr><hr><br>
    <form action="readDataFromFile.php" method="get">
    
        <input type="submit" name="readData" value="Read Data">

    </form>
</body>
</html>