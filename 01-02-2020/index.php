<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<?php 
    session_start();
    require_once 'connection.php';
    require_once 'printTable.php';

    $index = new Connection();
    $table = new PrintTable();

    if(isset($_SESSION['user'])):
?>
    
<header>
    <div>
        <span class="login"><?php echo 'Welcome. <b>'.$_SESSION['user']['name'].'</b>'; ?></span> | 
        <span class="login"> <a href="logout.php">Logout</a></span>
    </div>
</header> 

<div>
        <?php

            $userId = $_SESSION['user']['id'];

            $rowData = $index -> fetchRow(['login_time', 'logout_time'],'login_time',['userId' => $userId]);

            if(@$rowData -> num_rows > 0){
        ?>
        <table>
        <?php
                echo $table -> createTableHeader($rowData);

                $rowData = $index -> fetchRow(['login_time', 'logout_time'],'login_time',['userId' => $userId]);

                echo $table -> createTableRow($rowData);  
        ?>
        </table>
        <?php 
            }else
                echo '<h3>Welcome</h3>';
        ?>
    
</div>

<?php endif;
    if(!isset($_SESSION['user'])):  
?>  
<header>
    <div>
        <span class="login"><a href="login.php">Sign In</a></span> | 
        <span class="login"><a href="registeration.php"> Sign Up</a></span>
    </div>
</header>      
<?php endif; 
?>
    
    
</body>
</html>