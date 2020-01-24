<?php

    session_start();

    if(isset($_POST['submit'])){
        

        $formValue = [
            $_POST['prefix'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['dateOfBirth'],
            $_POST['phoneNo'],
            $_POST['emailId'],
            $_POST['address1'],
            $_POST['address2'],
            $_POST['country'],
            $_POST['postalCode'],
            $_POST['descYourSelf'],
            $_POST['getInTouch']
        ];

        $valid = false;

        for($i = 0; $i < sizeof($formValue); $i++){
            if(isset($formValue[$i]) && !empty($formValue[$i])){
                if($i == 5){
                    if(!filter_var($formValue[$i],FILTER_VALIDATE_EMAIL)){
                        echo $email.' <b>Enter Valid Email</b><br>';
                        $valid = false;
                        break;
                    } 
                }
                $valid = true;
            } else{
                $valid = false;
                break;
            }
        }
        if($valid){
            echo '<b>Your Data has been Submitted</b><br>';
            $_SESSION['formValue'] = $formValue;
        }else    
            echo 'Please Enter Valid Detail';


    }
?>

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
<br><hr><hr>
    <div>
        <form action="registrationForm.php" method="post">
            <div id="accountDetail">
                <h3>Your Account Detail</h3>
                
                <div>
                    <label for="prefix"> Name :</label>
                    <select name="prefix" id="prefix">
                        <option value="Mr">Mr.</option>
                        <option value="Miss">Miss.</option>
                        <option value="Ms">Ms.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Dr">Dr.</option>
                    </select>

                    <input type="text" name="firstName" id="firstName" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][0]; ?>" placeholder="Enter First Name">
                    <input type="text" name="lastName" id="lastName" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][1]; ?>" placeholder="Enter Last Name">
                </div>

                <div>
                    <label for="dateOfBirth">Date Of Birth : </label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth">
                </div>

                <div>
                    <label for="phoneNo">Phone No : </label>
                    <input type="number" name="phoneNo" id="phoneNo" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][2]; ?>" placeholder="Enter Phone No">
                </div>

                <div>
                    <label for="emailId">Email : </label>
                    <input type="email" name="emailId" id="emailId" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][3]; ?>" placeholder="Enter Email Id">
                </div>

                <div>
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" placeholder="Enter Password">
                </div>

                <div>
                    <label for="confirmPassword">Confirm Password : </label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter Password Again">
                </div>

            </div>

            <div id="addressInformation">
                <h3>Your Address Information</h3>

                <div>
                    <label for="address1">Address Line 1 : </label>                    
                    <input type="text" name="address1" id="address1" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][4]; ?>" placeholder="Enter Address Line 1">
                </div>

                <div>
                    <label for="address2">Address Line 2 : </label>
                    <input type="text" name="address2" id="address2" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][5]; ?>" placeholder="Enter Address line 2">
                </div>

                <div>
                    <label for="company">Company : </label>
                    <input type="text" name="company" id="company" placeholder="Enter Company Name">
                </div>

                <div>
                    <label for="city">City : </label>
                    <input type="text" name="city" id="city" placeholder="Enter City Name">
                </div>

                <div>
                    <label for="state">State : </label>
                    <input type="text" name="state" id="state" placeholder="Enter State Name">
                </div>

                <div>
                    <label for="country">Country : </label>
                    <select name="country" id="country">
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="china">China</option>
                    </select>
                </div>

                <div>
                    <label for="postalCode">Postal Code : </label>
                    <input type="number" name="postalCode" id="postalCode" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue'][7]; ?>" placeholder="Enter Postal Code">
                </div>

            </div>

            <h3><input type="checkbox" name="otherInfo" id="otherInfo"> Other Information</h3>

            <div id="otherInformation">

                <div>
                    <label for="descYourSelf">Describe YourSelf : </label>
                    <textarea name="descYourSelf" id="descYourSelf"  cols="22" rows="2"></textarea>
                </div>

                <div>
                    <label for="profileImage">Profile Image : </label>
                    <input type="file" name="profileImage" id="profileImage">
                </div>

                <div>
                    <label for="certificateFile">Certificate Upload : </label>
                    <input type="file" name="certificateFile" id="certificateFile">
                </div>

                <div>
                    <span>Experience : </span>
                    <input type="radio" name="experience" id="under1Year"> Under 1 Year
                    <input type="radio" name="experience" id="1-2Year"> 1-2 Year
                    <input type="radio" name="experience" id="2-5Year"> 2-5 year
                    <input type="radio" name="experience" id="5-10Year"> 5-10 year
                    <input type="radio" name="experience" id="over10Year"> Over 10 year
                </div>

                <div>
                    <label for="clientSee">unique clients you see each week ?</label>
                    <select name="clientSee" id="clientSee">
                        <option value="1-5">1-5</option>
                        <option value="6-10">6-10</option>
                        <option value="11-15">11-15</option>
                        <option value="15+">15+</option>
                    </select>
                </div>

                <div>
                    <span>Get In Touch Via : </span>
                    <input type="checkbox" name="getInTouch[]" id="post" value="Post"> Post 
                    <input type="checkbox" name="getInTouch[]" id="Inemail" value='Email'> Email
                    <input type="checkbox" name="getInTouch[]" id="sms" value="SMS"> SMS
                    <input type="checkbox" name="getInTouch[]" id="InPhone" value="Phone"> Phone
                </div>

                <div>
                    <label for="hobbies">Hobbies : </label>
                    <select name="hobbies" id="hobbies" multiple>
                        <option value="music">Listening to Music</option>
                        <option value="travelling">Travelling</option>
                        <option value="blogging">Blogging</option>
                        <option value="sport">Sport</option>
                        <option value="art">Art</option>
                    </select>
                </div>

            </div>
            <div>
            <br>
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Clear">
            </div>
        
        </form>
        
    </div>
    <script src="app.js"></script>
</body>
</html>