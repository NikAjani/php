<?php

    if(isset($_POST['userName']) && isset($_POST['password'])){

        extract($_POST);
        if(!empty($userName) && !empty($password)){

            if(md5($password) == md5('admin')){
                echo '<b> Login.. </b>';
                echo '<br>'.md5($password);
            }else    
                echo '<b> incorrect User Name or Password </b>';
        } else{

            echo '<b> Please Enter UserName And Password</b>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="md5Function.php" method="post">
        <span>User Name</span><br>
        <input type="text" name="userName" id="userName"><br><br>
        <span>Password</span><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>