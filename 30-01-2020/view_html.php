<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>View</title>
</head>
<body>
    <?php
    
        require_once 'connection.php';
        require_once 'view.php';

    ?>
    <table>
        <?php
            
            $tablData = viewData();
            echo printRowKey($tablData);
            $tablData = viewData();
            echo printRowValue($tablData); 
        ?>
    </table>
</body>
</html>