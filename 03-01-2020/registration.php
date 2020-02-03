<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Registration</title>
</head>
<body>

<div>
    <?php
        require_once "registration_post.php";
    ?>

</div>
<div>
    <h3>Register Your Self</h3>
    <form method="post">
        <div>
            <label for="prefix">Prefix : </label>
            <select name="prefix">
                <option value="Mr">MR</option>
            </select>
        </div>

        <div>
            <label for="firstName">First Name : </label>
            <input type="text" name="firstName" id="firstName" value="<?php //echo $register -> getValue('firstName'); ?>">
            <span>
                <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('firstName'))
                            echo 'Please Enter First Name';
                    }
                ?>
            </span>
        </div>

        <div>
            <label for="lastName">Last Name : </label>
            <input type="text" name="lastName" id="lastName" value="<?php //echo $register -> getValue('lastName'); ?>">
            <span>
                <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('lastName'))
                            echo 'Please Enter Lasr Name';
                    }
                ?>
            </span>
        </div>

        <div>
            <label for="emailId">Email : </label>
            <input type="email" name="emailId" id="emailId" value="<?php //echo $register -> getValue('emaiId'); ?>">
            <span>
                <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('emailId')){
                            echo 'Please Enter email Id';
                        } else {
                            if(!$register -> validateAdditionalField('emailId'))
                                echo 'Emial formate is Not Valid';
                        }
                    }
                ?>
            </span>
        </div>

        <div>
            <label for="phoneNo">Mobile No : </label>
            <input type="number" name="phoneNo" id="phoneNo" value="<?php //echo $register -> getValue('phoneNo'); ?>">
            <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('phoneNo')){
                            echo 'Please Enter Mobile No';
                        } else {
                            if(!$register -> validateAdditionalField('phoneNo'))
                                echo 'Only 10 digit accepted';
                        }
                    }
                ?>
        </div>

        <div>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" value="<?php //echo $register -> getValue('password'); ?>">
            <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('password'))
                            echo 'Please Enter Password';
                    }
                ?>
        </div>

        <div>
            <label for="confirmPassword">Confirm Password : </label>
            <input type="password" name="confirmPassword" id="confirmPassword">
            <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('confirmPassword')){
                            echo 'Please Enter Confirm Password';
                        } else {
                            if(!$register -> validateAdditionalField('confirmPassword')){
                                echo 'password And confirm password Not Match';
                            }
                        }
                    }
                ?>
        </div>

        <div>
            <label for="information">Infromation : </label>
            <textarea name="information" id="information"><?php //echo $register -> getValue('information'); ?></textarea>
            <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('information'))
                            echo 'Please Enter Infromation';
                        
                            if($register -> valid > 1){
                            $register -> registerUser();
                        }
                    }
                   
                ?>
        </div><br>

        <div>
            <input type="checkbox" name="terms" id="terms" value="terms"> Hereby, I Accept Terms & Condition.
            <?php
                    if(isset($_POST['register'])){
                        if(!$register -> validation('terms'))
                            echo '<script>alert("Please Accept Terms And Condition");</script>';
                    }
                ?>
        </div><br>
        <div>
            <input type="submit" value="Register" name="register">
            <input type="reset" value="Clear">
        </div>
    </form>
</div>
</body>
</html>