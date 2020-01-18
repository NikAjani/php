<?php
    $welcomeMsg = "Hi.. Hello";
    $name = 'Nikhil';
    $btn = 'Button Text';
    $endMsg = 'Good Luck';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Html Embedding</title>
</head>
<body>
    <div>
        <p>Welcome Msg : <?php echo $welcomeMsg; ?></p>
    </div>
    <div>
        <form action="">
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">

            <br><br>
            <input type="button" value="<?php echo $btn; ?>">
        </form>
    </div>
    <div>
        <br><br><span><?php echo $endMsg; ?></span>
    </div>

    
</body>
</html>