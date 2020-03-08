
<div>
    <?php $customer = $this->getCustomer(); ?>
    <form action="<?php echo $this->getController()->getUrl('save', null, ['id' => $customer->custId]); ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="account[firstName]" id="firstName" value="<?php echo $customer->firstName; ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="account[lastName]" id="lastName" value="<?php echo $customer->lastName; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="account[email]" id="email" value="<?php echo $customer->email; ?>"></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="password" name="account[password]" id="password" value="<?php echo $customer->password; ?>"></td>
            </tr>
            <tr>
                <td>Confirm Password </td>
                <td><input type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $customer->password; ?>"></td>
            </tr>
            <tr>
                <td>Address Line 1 </td>
                <td><textarea name="address[addressline1]" id="addressline1"><?php echo $customer->addressline1; ?></textarea></td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td><textarea name="address[addressline2]" id="addressline2"><?php echo $customer->addressline2; ?></textarea></td>
            </tr>
            <tr>
                <td>Pincode </td>
                <td><input type="number" name="address[pincode]" id="pincode" value="<?php echo $customer->pincode; ?>"></td>
            </tr>
            <tr>
                <td>City </td>
                <td><input type="text" name="address[city]" id="city" value="<?php echo $customer->city; ?>"></td>
            </tr>
            <tr>
                <td>State </td>
                <td><input type="text" name="address[state]" id="state" value="<?php echo $customer->state; ?>"></td>
            </tr>
            <tr>
                <td>Country </td>
                <td><input type="text" name="address[country]" id="country" value="<?php echo $customer->country; ?>"></td>
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