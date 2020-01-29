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
                <select name="" id="">
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
                <input type="text" name="firstName" id="firstName">
            </div>
            
            <div>
                <label for="lastName">Last Name : </label>
                <input type="text" name="lastName" id="lastName">
            </div>

            <div>
                <label for="phoneNo">Phone No : </label>
                <input type="number" name="phoneNo" id="phoneNo">
            </div>

            <div>
                <label for="emailId">Email Id : </label>
                <input type="email" name="emailId" id="emailId">
            </div>

            <div>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="confirmPassword" id="confirmPassword">
            </div>
        </div>
        
        <br>
        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>
</div>
</body>
</html>