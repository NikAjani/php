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
    <form action="" method="post" enctype="multipart/form-data">
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
                <input type="text" name="account[lastName]" id="lastName" value="<?php echo getValue('account','lastName');?>">
            </div>

            <div>
                <label for="dateOfBirth">Date Of Birth : </label>
                <input type="date" name="account[dateOfBirth]" id="dateOfBirth" value="<?php echo getValue('account','dateOfBirth');?>">
            </div>

            <div>
                <label for="phoneNo">Phone No : </label>
                <input type="number" name="account[phoneNo]" id="phoneNo" value ="<?php echo getValue('account','phoneNo');?>">
            </div>

            <div>
                <label for="emailId">Email : </label>
                <input type="email" name="account[emailId]" id="emailId" value="<?php echo getValue('account','emailId');?>">
            </div>

            <div>
                <label for="password">Password : </label>
                <input type="password" name="account[password]" id="password" value="<?php echo getValue('account','password');?>">
            </div>

            <div>
                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="account[confirmPassword]" id="confirmPassword" value="<?php echo getValue('account','confirmPassword');?>">
            </div>

        </div>

        <div id="addressInformation">
            <h3>Your Address Information</h3>

            <div>
                <label for="address1">Address Line 1 : </label>                    
                <input type="text" name="address[address1]" id="address1" value="<?php echo getValue('address','address1');?>">
            </div>

            <div>
                <label for="address2">Address Line 2 : </label>
                <input type="text" name="address[address2]" id="address2" value="<?php echo getValue('address','address2');?>">
            </div>

            <div>
                <label for="company">Company : </label>
                <input type="text" name="address[company]" id="company" value="<?php echo getValue('address','company');?>">
            </div>

            <div>
                <label for="city">City : </label>
                <input type="text" name="address[city]" id="city" value="<?php echo getValue('address','city');?>">
            </div>

            <div>
                <label for="state">State : </label>
                <input type="text" name="address[state]" id="state" value="<?php echo getValue('address','state');?>">
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
                <textarea name="other[descYourSelf]" id="descYourSelf" cols="0" rows="0">
                    <?php echo getValue('other','descYourSelf'); ?>
                </textarea>
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
                    <input type="radio" name="other[experience]" id="<?php echo $experienceValue; ?>" value="<?php echo $experienceValue; ?>"
                    <?php if(@in_array(getValue('other','experience'), [$experienceValue])) echo 'checked'; ?>>
                    <?php echo $experienceValue; ?>
                <?php endforeach; ?>
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
                    <input type="checkbox" name="other[getInTouch][]" id="post" value="<?php echo $getInTouchValue ?>"
                    <?php if(@isSelectedMulti('other','getInTouch',$getInTouchValue)) echo 'checked'; ?>>
                    <?php echo $getInTouchValue; ?> 
                <?php endforeach; ?>
            </div>

            <div>
                <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging', 'Sport', 'Art']; ?>
                <label for="hobbies">Hobbies : </label>
                <select name="other[hobbies][]" id="<?php echo $hobbiesValue; ?>" multiple>
                    <?php foreach($hobbiesData as $hobbiesValue): ?>
                        <option value="<?php echo $hobbiesValue; ?>"
                        <?php if(@isSelectedMulti('other','hobbies',$hobbiesValue)) echo 'selected'; ?>>
                        <?php echo $hobbiesValue; ?></option>
                    <?php endforeach; ?>
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