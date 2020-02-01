<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
<div>
    <?php 
        require_once 'loginPost.php';

        $checkValidation = new Login();
    ?>
</div>
<div>
    <h3>Log In</h3>

    <form method="post">
        <div>
            <label for="userName">User Name (Email) : </label>
            <input type="text" name="loginDetail[userName]" id="userName">
            <span>
                <?php 
                    if(isset($_POST['login'])){
                        if($login -> validation('loginDetail','userName') < 1)
                            echo 'Please Enter User Name';
                        else{
                            if(!filter_var($_POST['loginDetail']['userName'], FILTER_VALIDATE_EMAIL)){
                                echo 'Please Enter Valid Email Formate';
                                $login -> valid = 0;
                            }
                        }
                    }
                ?>
            </span>
        </div><br>
        <div>
            <label for="password">Password : </label>
            <input type="password" name="loginDetail[password]" id="password">
            <span>
                <?php 
                    if(isset($_POST['login'])){
                        if($login -> validation('loginDetail','password') < 1)
                            echo 'Please Enter Password';
                    } 
                    if(isset($_POST['login'])){ 
                        if($login -> valid >= 2)
                            $login -> loginNow();
                    }
                ?>
            </span>
        </div><br>
        <div>
            <input type="submit" name="login" value="Login">
            <input type="reset" value="Clear">
        </div><br><br>
        <div>
            <a href="registeration.php">Register Now</a>
        </div>
    </form>
</div>
</body>
</html>