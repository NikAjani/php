
<div>
    <form action="<?php echo $action; ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="account[firstName]" id="firstName" value="<?php echo $this->getCustomer('firstName'); ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="account[lastName]" id="lastName" value="<?php echo $this->getCustomer('lastName'); ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="account[email]" id="email" value="<?php echo $this->getCustomer('email'); ?>"></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="password" name="account[password]" id="password" value="<?php echo $this->getCustomer('password'); ?>"></td>
            </tr>
            <tr>
                <td>Confirm Password </td>
                <td><input type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $this->getCustomer('password'); ?>"></td>
            </tr>
            <tr>
                <td>Address Line 1 </td>
                <td><textarea name="address[addressline1]" id="addressline1"><?php echo $this->getCustomer('addressline1'); ?></textarea></td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td><textarea name="address[addressline2]" id="addressline2"><?php echo $this->getCustomer('addressline2'); ?></textarea></td>
            </tr>
            <tr>
                <td>Pincode </td>
                <td><input type="number" name="address[pincode]" id="pincode" value="<?php echo $this->getCustomer('pincode'); ?>"></td>
            </tr>
            <tr>
                <td>City </td>
                <td><input type="text" name="address[city]" id="city" value="<?php echo $this->getCustomer('city'); ?>"></td>
            </tr>
            <tr>
                <td>State </td>
                <td><input type="text" name="address[state]" id="state" value="<?php echo $this->getCustomer('state'); ?>"></td>
            </tr>
            <tr>
                <td>Country </td>
                <td><input type="text" name="address[country]" id="country" value="<?php echo $this->getCustomer('country'); ?>"></td>
            </tr>
            <tr>
                <td>Country </td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>