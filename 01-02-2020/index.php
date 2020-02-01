<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
        <nav class="navbar navbar-expand-sm bg-light justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <span class="nav-link"><?php echo 'Welcome. <b>'.$_SESSION['user']['name'].'</b>'; ?></span>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><button class="btn btn-outline-danger">Logout</button></a>
            </li>
        </ul>
    </nav>
    </div>
</header> 

<div>
        <?php

            $userId = $_SESSION['user']['id'];

            $rowData = $index -> fetchRow(['login_time', 'logout_time'],'login_time',['userId' => $userId]);

            if(@$rowData -> num_rows > 0){
        ?>
        <table class="table table-striped">
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
    <nav class="navbar navbar-expand-sm bg-light justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php"><button class="btn btn-outline-success">Sign In</button></a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registeration.php"><button class="btn btn-outline-danger">Sign Up</button></a>
            </li>
        </ul>
    </nav>
</header>      
<?php endif; 
?>
    
    
</body>
</html>