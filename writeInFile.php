<?php

    $fileName = 'phpFileHandling.txt';
    
    if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['writeData'])){

        if(!empty($_POST['name']) && !empty($_POST['age'])){

            $fileHandler = fopen($fileName,'a');

            $dataForWrite = $_POST['name'].' | '.$_POST['age']."\n";

            fwrite($fileHandler, $dataForWrite);
            
            echo 'Written In file';
            
            fclose($fileHandler);

        } else{

            echo '<b>Please fill All Fields</b>';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write In File</title>
</head>
<body>
    <br><hr><hr><br>
    <form action="writeInFile.php" method="post">

        Name : <input type="text" name="name" id="name">
        <Br><br>
        Age : <input type="number" name="age" id="age">
        <br><br>
        <input type="submit" name='writeData' value="Write In File">

    </form>
</body>
</html>