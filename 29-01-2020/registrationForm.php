<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practitioner Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <?php
        require_once 'connection.php';
        require_once 'registrationForm_post.php';
    ?>
</div>
<br><hr><hr>
<div>
    <form method="post">
        <div id="accountInfo">
            <h3>Account Detail</h3>
            <br>

            <div>
                <label for="prefix">Prefix : </label>
                <select name="account[prefix]">
                <?php 
                    $prefixData = fetchAllData(['prefix'],'prefix'); 

                    while($row = $prefixData -> fetch_assoc()):
                ?>
                    <option value="<?php echo $row['prefix'] ?>"><?php echo $row['prefix']; ?></option>
                <?php endwhile;?>
                </select>
            </div>
            
            <div>
                <label for="firstName">First Name : </label>
                <input type="text" name="account[firstName]" id="firstName" value="<?php echo getValue('account','firstName'); ?>">
            </div>
            
            <div>
                <label for="lastName">Last Name : </label>
                <input type="text" name="account[lastName]" id="lastName" value="<?php echo getValue('account','lastName'); ?>">
            </div>

            <div>
                <label for="dateOfBirth">Date Of Birth : </label>
                <input type="date" name="account[dateOfBirth]" id="dateOfBirth" value="<?php echo getValue('account','dateOfBirth'); ?>">
            </div>

            <div>
                <label for="phoneNo">Phone No : </label>
                <input type="number" name="account[phoneNo]" id="phoneNo" value="<?php echo getValue('account','phoneNo'); ?>">
            </div>

            <div>
                <label for="emailId">Email Id : </label>
                <input type="email" name="account[emailId]" id="emailId" value="<?php echo getValue('account','emailId'); ?>">
            </div>

            <div>
                <label for="password">Password : </label>
                <input type="password" name="account[password]" id="password" value="<?php echo getValue('account','password'); ?>">
            </div>

            <div>
                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="confirmPassword" id="confirmPassword">
            </div>
        </div>
        
        <br>
        <div>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>
</div>
</body>
</html>