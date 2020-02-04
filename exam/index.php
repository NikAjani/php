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
    <title>Log In</title>
</head>
<body>
<div>
    <?php   
        if(!isset($_SESSION['userName'])):
            require_once 'loginPost.php';
    ?>
<br>
</div>
<div class="container">
    <h3 class="col-sm-8 alert alert-success">LOGIN</h3><br>

    <form method="post">
        <div class="input-group mb-3 input-group-lg col-sm-8">
            <div class="input-group-prepend">
                <span class="input-group-text">User Name : </span>
            </div>
            <input class="form-control" type="text" name="loginDetail[userName]" id="userName" placeholder="User Name">
            <br>
                <?php 
                    if(isset($_POST['login'])){
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span>
                <?php
                        if($login -> validation('loginDetail','userName') < 1)
                            echo 'Please Enter User Name';
                        else{
                            if(!filter_var($_POST['loginDetail']['userName'], FILTER_VALIDATE_EMAIL)){
                                echo 'Please Enter Valid Email Formate';
                                $login -> valid = 0;
                            }
                        }
                ?>
                        </span>
                    </div>
                <?php
                    }
                ?>
        </div><br>
        <div class="input-group mb-3 input-group-lg col-sm-8">
            <div class="input-group-prepend">
                <span class="input-group-text" >Password : </span>
            </div>
            
            <input class="form-control" type="password" name="loginDetail[password]" id="password" placeholder="Password">
            <br>
                    <?php 
                        if(isset($_POST['login'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span>
                    <?php
                            if($login -> validation('loginDetail','password') < 1)
                                echo 'Please Enter Password';
                    ?>
                            </span>
                    </div>
                    <?php
                        } 
                        if(isset($_POST['login'])){ 
                            if($login -> valid >= 2)
                                $login -> loginNow();
                        }
                    ?>
        </div><br>
        <div class="col-sm-6">
            <input class="btn btn-success" type="submit" name="login" value="Login">
            <input class="btn btn-danger" type="reset" value="Clear">
        </div><br><br>
        <div class="col-sm-6">
            <a class="col-sm-4 alert alert-success" href="registration.php">Register Now</a>
        </div>
    </form>
</div>
<?php
    endif;
    if(isset($_SESSION['userName']))
        header('Location: blog_post.php');
?>
</body>
</html>