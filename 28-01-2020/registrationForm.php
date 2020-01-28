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
        require_once 'registrationForm_post.php';
    ?>
</div>

<br><hr><hr>

<div>
    <form  method="post" enctype="multipart/form-data">
        <div id="accountDetail">
            <h3>Your Account Detail</h3>
    
            <div>
                <?php $prefixData = ['Mr','Miss', 'Ms','Mrs', 'Dr']; ?>
                <label for="prefix"> Name :</label>
                <select name="account[prefix]" id="prefix">
                    <?php foreach($prefixData as $prefixValue): ?>
                        <option value="<?php echo $prefixValue; ?>" 
                        <?php echo isSelected('account','prefix', $prefixValue); ?>>
                        <?php echo $prefixValue; ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="text" name="account[firstName]" id="firstName" value="<?php echo getValue('account','firstName');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','firstName')) 
                            echo '<b>Enter First Name</b>';
                        else echo '';
                    } 
                     ?></span>
                <input type="text" name="account[lastName]" id="lastName" value="<?php echo getValue('account','lastName');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','lastName')) 
                            echo '<b>Enter Last Name</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="dateOfBirth">Date Of Birth : </label>
                <input type="date" name="account[dateOfBirth]" id="dateOfBirth" value="<?php echo getValue('account','dateOfBirth');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','dateOfBirth')) 
                            echo '<b>Enter Birth Date</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="phoneNo">Phone No : </label>
                <input type="number" name="account[phoneNo]" id="phoneNo" value ="<?php echo getValue('account','phoneNo');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','phoneNo')) 
                            echo '<b>Please Enter Valid Phone No</b>';
                        else {
                            if(!validAdditionFields('account','phoneNo'))
                                echo '<b>Only 10 digit allow</b>';
                        };
                    } 
                     ?></span>
            </div>

            <div>
                <label for="emailId">Email : </label>
                <input type="email" name="account[emailId]" id="emailId" value="<?php echo getValue('account','emailId');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','emailId')) 
                            echo '<b>Please Enter Valid Email Id</b>';
                        else {
                            if(!validAdditionFields('account','emailId'))
                                echo '<b>Email Formate Is Not valid</b>';
                        }
                    } 
                     ?></span>
            </div>

            <div>
                <label for="password">Password : </label>
                <input type="password" name="account[password]" id="password" value="<?php echo getValue('account','password');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','password')) 
                            echo '<b>Please Enter Valid password</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="account[confirmPassword]" id="confirmPassword" value="<?php echo getValue('account','confirmPassword');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('account','confirmPassword')) 
                            echo '<b>Please Enter Valid Confirm Password</b>';
                        else {
                            if(!validAdditionFields('account','password'))
                                echo '<b>Password and Confirm Password is not Match</b>';
                        }
                    } 
                     ?></span>
            </div>

        </div>

        <div id="addressInformation">
            <h3>Your Address Information</h3>

            <div>
                <label for="address1">Address Line 1 : </label>                    
                <input type="text" name="address[address1]" id="address1" value="<?php echo getValue('address','address1');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('address','address1')) 
                            echo '<b>Please Enter Valid Address 1</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="address2">Address Line 2 : </label>
                <input type="text" name="address[address2]" id="address2" value="<?php echo getValue('address','address2');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('address','address2')) 
                            echo '<b>Please Enter Valid Address 2</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="company">Company : </label>
                <input type="text" name="address[company]" id="company" value="<?php echo getValue('address','company');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('address','company')) 
                            echo '<b>Please Enter Valid Company Name</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="city">City : </label>
                <input type="text" name="address[city]" id="city" value="<?php echo getValue('address','city');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('address','city')) 
                            echo '<b>Please Enter Valid City Name</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="state">State : </label>
                <input type="text" name="address[state]" id="state" value="<?php echo getValue('address','state');?>">
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('address','state')) 
                            echo '<b>Please Enter Valid State Name</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <?php $countryData = ['India', 'USA', 'China', 'Japan']; ?>
                <label for="country">Country : </label>
                <select name="address[country]" id="country">
                    <?php foreach($countryData as $countryValue): ?>
                        <option value="<?php echo $countryValue; ?>"
                        <?php echo isSelected('address','country', $countryValue); ?>>
                        <?php echo $countryValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="postalCode">Postal Code : </label>
                <input type="number" name="address[postalCode]" id="postalCode" value="<?php echo getValue('address','postalCode');?>">
            </div>

        </div>

        <h3><input type="checkbox" name="address[otherInfo]" id="otherInfo"> Other Information</h3>

        <div id="otherInformation">

            <div>
                <label for="descYourSelf">Describe YourSelf : </label>
                <textarea name="other[descYourSelf]" id="descYourSelf">
                    <?php echo getValue('other','descYourSelf'); ?>
                </textarea>
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('other','descYourSelf')) 
                            echo '<b>Please desctibe Your Self.</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <label for="profileImage">Profile Image : </label>
                <input type="file" name="other[profileImage]" id="profileImage">
            </div>

            <div>
                <label for="certificateFile">Certificate Upload : </label>
                <input type="file" name="other[certificateFile]" id="certificateFile">
            </div>

            <div>
                <?php $experienceData = ['Under 1 year', '1-2 year', '2-5 year', '5-10 year', 'Over 10 year']; ?>
                <span>Experience : </span>
                <?php foreach($experienceData as $experienceValue): ?>
                    <input type="radio" name="other[experience]" id="<?php echo str_replace(' ','',$experienceValue); ?>" value="<?php echo $experienceValue; ?>"
                    <?php if(in_array(getValue('other','experience'), [$experienceValue])) echo 'checked'; ?>>
                    <?php echo $experienceValue; ?>
                <?php endforeach; ?>
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('other','experience')) 
                            echo '<b>Please Select Your Experience</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <?php $uniqueClient = ['1-5', '6-10', '11-15', '15+']; ?>
                <label for="clientSee">unique clients you see each week ?</label>
                <select name="other[clientSee]" id="clientSee">
                    <?php foreach($uniqueClient as $value): ?>
                        <option value="<?php echo $value; ?>" 
                        <?php echo isSelected('other','clientSee', $value); ?>>
                        <?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <?php $getInTouchData = ['Post', 'Email', 'SMS', 'Phone']; ?>
                <span>Get In Touch Via : </span>
                <?php foreach($getInTouchData as $getInTouchValue): ?>
                    <input type="checkbox" name="other[getInTouch][]" id="<?php echo $getInTouchValue; ?>" value="<?php echo $getInTouchValue ?>"
                    <?php if(isSelectedMulti('other','getInTouch',$getInTouchValue)) echo 'checked'; ?>>
                    <?php echo $getInTouchValue; ?> 
                <?php endforeach; ?>
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('other','getInTouch')) 
                            echo '<b>Please Check Any One Box</b>';
                        else echo '';
                    } 
                     ?></span>
            </div>

            <div>
                <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging', 'Sport', 'Art']; ?>
                <label>Hobbies : </label>
                <select name="other[hobbies][]" id="hobbies" multiple>
                    <?php foreach($hobbiesData as $hobbiesValue): ?>
                        <option value="<?php echo $hobbiesValue; ?>"
                        <?php if(isSelectedMulti('other','hobbies',$hobbiesValue)) echo 'selected'; ?>>
                        <?php echo $hobbiesValue; ?></option>
                    <?php endforeach; ?>
                </select>
                <span><?php
                    if(isset($_POST['submit'])){
                        if(!validField('other','hobbies')) 
                            echo '<b>Please Select Your hobbies.</b>';
                        else echo '';
                    } 
                     ?></span>
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