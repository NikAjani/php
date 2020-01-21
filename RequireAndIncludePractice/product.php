<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product page</title>
</head>
<body>
    <?php
        require_once 'requireAndInclude.php';
    ?>
    
    <div>
        <p>This is Your Product Page</p>
        <br>
        <p>Your Have Total : <?php echo $noOfProduct; ?> Product. </p>
    </div>

    <?php
        include_once 'footer.php';
    ?>
</body>
</html>