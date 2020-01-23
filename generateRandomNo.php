<?php

    $capchaNumber = rand(1001,9999);
    

    if(isset($_POST['capchaNo'])){

        if($_POST['capchaValue'] == $_POST['capchaNo']){
            echo '<b> Capcha is Match </b><br>';
        }else{
            echo '<b> Try Again </b><br>';
            $capchaNumber = $_POST['capchaValue'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Random number Generate</title>
</head>
<body>

    <br>
    <hr>
    <br>
    <form action="generateRandomNo.php" method="post">
    
        <input type="text" value="<?php echo $capchaNumber; ?>" disabled/>
        <input type="hidden" name="capchaValue" value="<?php echo $capchaNumber; ?>">
        <br><br>
        <input type="number" name="capchaNo" id="capchaNo" placeholder="Enter Capcha Here">
        
        <input type="submit" value="Check">

    </form>
</body>
</html>