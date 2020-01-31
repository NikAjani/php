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
    <form method="post" enctype="multipart/form-data">
        <div id="accountInfo">
            <h3>Account Detail</h3>
            <br>

            <div>
                <label for="prefix">Prefix : </label>
                <?php $prefixData = fetchAllData('prefix'); ?>
                <select name="account[prefix]" id="prefix">
                <?php while($row = $prefixData -> fetch_assoc()): ?>
                    <option value="<?php echo $row['prefix'] ?>"
                    <?php if(isSelected('account','prefix', $row['prefix'])) echo 'selected'; ?>><?php echo $row['prefix']; ?></option>
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
                <input type="password" name="account[confirmPassword]" id="confirmPassword">
            </div>
        </div>

        <div>
            <h3>Address Information</h3>

            <div>
                <label for="address1">Address Line 1 : </label>
                <input type="text" name="address[address1]" id="address1" value="<?php echo getValue('address','address1'); ?>">
            </div>

            <div>
                <label for="address2">Address Line 2 : </label>
                <input type="text" name="address[address2]" id="address2" value="<?php echo getValue('address','address2'); ?>">
            </div>

            <div>
                <label for="company">Company : </label>
                <input type="text" name="address[company]" id="company" value="<?php echo getValue('address','company'); ?>">
            </div>

            <div>
                <label for="city">City : </label>
                <input type="text" name="address[city]" id="city" value="<?php echo getValue('address','city'); ?>">
            </div>

            <div>
                <label for="state">State : </label>
                <input type="text" name="address[state]" id="state" value="<?php echo getValue('address','state'); ?>">
            </div>

            <div>
                <label for="country">Country : </label>
                <?php $countyData = ['India', 'china', 'USA', 'Japan']; ?>
                <select name="address[country]" id="country">
                    <?php foreach($countyData as $countyValue): ?>
                        <option value="<?php echo $countyValue; ?>"
                        <?php if(isSelected('address','country', $countyValue)) echo 'selected'; ?>><?php echo $countyValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="postalCode">Postal Code : </label>
                <input type="number" name="address[postalCode]" id="postalCode" value="<?php echo getValue('address','postalCode'); ?>">
            </div>
        </div>

        <div>
            <h3>Other Information</h3>

            <div>
                <label for="describeYourSelf">Describe Your Self : </label>
                <textarea name="other[describeYourSelf]" id="describeYourSelf"><?php echo getValue('other','describeYourSelf'); ?></textarea>
            </div>
            
            <div>
                <label for="profileImage">Profile Image : </label>
                <input type="file" name="other[profileImage]" id="profileImage">
            </div>

            <div>
                <label for="certificatePdf">Certificate Upload : </label>
                <input type="file" name="other[certificatePdf]" id="certificatePdf">
            </div>

            <div>
                <label>How long have you been in business?</label>
                <?php $experienceData = ['Under 1 year', '1-2 year', '2-5 year', '5-10 year', 'Over 10 year']; ?>
                <?php foreach($experienceData as $experienceValue): ?>
                    <input type="radio" name="other[experience]" value="<?php echo $experienceValue; ?>"
                    <?php if(isSelected('other','experience', $experienceValue)) echo 'checked'; ?>><?php echo $experienceValue; ?>
                <?php endforeach; ?>
            </div>

            <div>
                <?php $uniqueClient = ['1-5', '6-10', '11-15', '15+']; ?>
                <label for="clientSee">unique clients you see each week ?</label>
                <select name="other[clientSee]" id="clientSee">
                    <?php foreach($uniqueClient as $value): ?>
                        <option value="<?php echo $value; ?>" <?php if(isSelected('other','clientSee', $value)) echo 'selected'; ?>>
                        <?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
            <?php $getInTouchData = ['Post', 'Email', 'SMS', 'Phone']; ?>
                <span>Get In Touch Via : </span>
                <?php foreach($getInTouchData as $getInTouchValue): ?>
                    <input type="checkbox" name="other[getInTouch][]" id="<?php echo $getInTouchValue; ?>" value="<?php echo $getInTouchValue ?>"
                    <?php if(isSelectedMulti('other','getInTouch', $getInTouchValue)) echo 'checked'; ?>>
                    <?php echo $getInTouchValue; ?> 
                <?php endforeach; ?>
            </div> 

            <div>
                <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging', 'Sport', 'Art']; ?>
                <label>Hobbies : </label>
                <select name="other[hobbies][]" id="hobbies" multiple>
                    <?php foreach($hobbiesData as $hobbiesValue): ?>
                        <option value="<?php echo $hobbiesValue; ?>" <?php if(isSelectedMulti('other','hobbies', $hobbiesValue)) echo 'selected'; ?>>
                        <?php echo $hobbiesValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div> 
        <br>

        <div>
            <input type="submit" name="extra[submit]" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>
</div>
</body>
</html>