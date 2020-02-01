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
    if(isset($_SESSION['user'])):
?>
    
<header>
    <div>
        <span class="login"><?php echo 'Welcome. <b>'.$_SESSION['user'].'</b>'; ?></span> | 
        <span class="login"> <a href="logout.php">Logout</a></span>
    </div>
</header> 

<?php endif;
    if(!isset($_SESSION['user'])):  
?>  
<header>
    <div>
        <span class="login"><a href="login.php">Sign In</a></span> | 
        <span class="login"><a> Sign Up</a></span>
    </div>
</header>      
<?php endif; 
?>
    
    
</body>
</html>