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

        session_start();

        extract($_POST);


        if(isset($_POST['submit'])){
            $formValue = $_POST;

            $_SESSION['formValue'] = $formValue;

            $valid = false;

            foreach($formValue as $singleValue => $value){
                if($value != null){
                    $valid = true;
                }else{ 
                    $valid = false;  
                    echo '<br><b>Please Enter valid Detail</b><br>'; 
                    break;
                }
            }

            if(!filter_var($_POST['emailId'],FILTER_VALIDATE_EMAIL)){
                echo 'Email is Not valid';
                $valid = false;
            }

            if($_POST['password'] != $_POST['confirmPassword']){
                echo 'Password and Confirm Password is not match';
                $valid = false;
            }

            // Upload and check Profile Image.
            if($valid){
                $imgName = $_FILES['profileImage']['name'];
                $imgTempLocation = $_FILES['profileImage']['tmp_name'];
                $extension = strtolower(substr($imgName, strpos($imgName, '.')+1));
                $fileType = $_FILES['profileImage']['type'];
                if(!empty($imgName)){

                    if(($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') && ($fileType == 'image/jpeg' || $fileType == 'image/png')){

                        $location = 'uploads/';

                        if(move_uploaded_file($imgTempLocation, $location.$imgName)){
                            $valid = true;
                            
                        } else{
                            echo 'Eroor in File Upload';
                            $valid = false;
                        }

                    } else{
                        echo 'File Should be jpeg/jpg/png';
                        $valid = false;
                        
                    }
                } else{
                    echo 'Please choose File'; 
                    $valid = false;     
                    
                }
            }


            // upload certificate File and valid
            if($valid){
                $pdfName = $_FILES['certificateFile']['name'];
                $pdfTempLocation = $_FILES['certificateFile']['tmp_name'];
                $extension = strtolower(substr($pdfName, strpos($pdfName, '.')+1));
                $fileType = $_FILES['certificateFile']['type'];
                if(!empty($pdfName)){

                    if(($extension == 'pdf' )){

                        $location = 'uploads/';

                        if(move_uploaded_file($pdfTempLocation, $location.$pdfName)){
                            $valid = true;
                        } else{
                            echo 'Eroor in File Upload';
                            $valid = false;
                        }

                    } else{
                        echo 'File Should be PDF';
                        $valid = false;
                        
                    }
                } else{
                    echo 'Please choose PDF File';    
                    $valid = false;  
                    
                }
            }

            if($valid){
                echo ' Your Data is Uploaded Successfully...';
            }

        }
    ?>
    </div>

<br><hr><hr>
    
    <div>
        <form action="registrationForm.php" method="post" enctype="multipart/form-data">
            <div id="accountDetail">
                <h3>Your Account Detail</h3>
                
                <div>
                    <label for="prefix"> Name :</label>
                    <select name="prefix" id="prefix">
                        <option value="Mr" <?php isset($_SESSION['formValue']['prefix']) == 'Mr' ? ' selected = "selected"' : '';?> >Mr.</option>
                        <option value="Miss" <?php isset($_SESSION['formValue']['prefix']) == 'Miss' ? ' selected = "selected"' : '';?>>Miss.</option>
                        <option value="Ms" <?php isset($_SESSION['formValue']) == 'Ms' ? ' selected = "selected"' : '';?> >Ms.</option>
                        <option value="Mrs" <?php isset($_SESSION['formValue']) == 'Mrs' ? ' selected = "selected"' : '';?>>Mrs.</option>
                        <option value="Dr" <?php isset($_SESSION['formValue']) == 'Dr' ? ' selected = "selected"' : '';?>>Dr.</option>
                    </select>

                    <input type="text" name="firstName" id="firstName" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['firstName']; ?>" placeholder="Enter First Name">
                    <input type="text" name="lastName" id="lastName" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['lastName']; ?>" placeholder="Enter Last Name">
                </div>

                <div>
                    <label for="dateOfBirth">Date Of Birth : </label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['dateOfBirth']; ?>">
                </div>

                <div>
                    <label for="phoneNo">Phone No : </label>
                    <input type="number" name="phoneNo" id="phoneNo" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['phoneNo']; ?>" placeholder="Enter Phone No">
                </div>

                <div>
                    <label for="emailId">Email : </label>
                    <input type="email" name="emailId" id="emailId" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['emailId']; ?>" placeholder="Enter Email Id">
                </div>

                <div>
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['password']; ?>" placeholder="Enter Password">
                </div>

                <div>
                    <label for="confirmPassword">Confirm Password : </label>
                    <input type="password" name="confirmPassword" id="confirmPassword" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['confirmPassword']; ?>" placeholder="Enter Password Again">
                </div>

            </div>

            <div id="addressInformation">
                <h3>Your Address Information</h3>

                <div>
                    <label for="address1">Address Line 1 : </label>                    
                    <input type="text" name="address1" id="address1" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['address1']; ?>" placeholder="Enter Address Line 1">
                </div>

                <div>
                    <label for="address2">Address Line 2 : </label>
                    <input type="text" name="address2" id="address2" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['address2']; ?>" placeholder="Enter Address line 2">
                </div>

                <div>
                    <label for="company">Company : </label>
                    <input type="text" name="company" id="company" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['company']; ?>" placeholder="Enter Company Name">
                </div>

                <div>
                    <label for="city">City : </label>
                    <input type="text" name="city" id="city" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['city']; ?>" placeholder="Enter City Name">
                </div>

                <div>
                    <label for="state">State : </label>
                    <input type="text" name="state" id="state" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['state']; ?>" placeholder="Enter State Name">
                </div>

                <div>
                    <label for="country">Country : </label>
                    <select name="country" id="country">
                        <option value="India" <?php isset($_SESSION['formValue']) == 'India' ? ' selected = "selected"' : '';?> >India</option>
                        <option value="USA" <?php isset($_SESSION['formValue']) == 'USA' ? ' selected = "selected"' : '';?>>USA</option>
                        <option value="china" <?php isset($_SESSION['formValue']) == 'china' ? ' selected = "selected"' : '';?>>China</option>
                    </select>
                </div>

                <div>
                    <label for="postalCode">Postal Code : </label>
                    <input type="number" name="postalCode" id="postalCode" value="<?php if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['postalCode']; ?>" placeholder="Enter Postal Code">
                </div>

            </div>

            <h3><input type="checkbox" name="otherInfo" id="otherInfo"> Other Information</h3>

            <div id="otherInformation">

                <div>
                    <label for="descYourSelf">Describe YourSelf : </label>
                    <textarea name="descYourSelf" id="descYourSelf" cols="22" rows="2">
                        <?php
                            if(isset($_SESSION['formValue'])) echo $_SESSION['formValue']['descYourSelf'];
                        ?>
                    </textarea>
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
                    <input type="radio" name="experience" id="under1Year" value="under 1 year"> Under 1 Year
                    <input type="radio" name="experience" id="1-2Year" value="1-2 year"> 1-2 Year
                    <input type="radio" name="experience" id="2-5Year" value="2-5 year"> 2-5 year
                    <input type="radio" name="experience" id="5-10Year" value="5-10 year"> 5-10 year
                    <input type="radio" name="experience" id="over10Year" value="over 10 year"> Over 10 year
                </div>

                <div>
                    <label for="clientSee">unique clients you see each week ?</label>
                    <select name="clientSee" id="clientSee">
                        <option value="1-5" <?php isset($_SESSION['formValue']) == 'India' ? ' selected = "selected"' : '';?>>1-5</option>
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