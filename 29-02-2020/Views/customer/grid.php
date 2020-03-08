<div><h3><a href="<?php echo $this->getController()->getUrl('add', null); ?>">Add Customer</a></h3></div>

<div>
    <table border="1" width="100%" cellspacing='4'>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address Line 1</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Action</th>
        </tr>
        <?php
            $customers = $this->getCustomers();
            foreach($customers as $row) :
        ?>

        <tr style="text-align: center">
            <td><?php echo $row->firstName ?></td>
            <td><?php echo $row->lastName; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->addressline1; ?></td>
            <td><?php echo $row->city; ?></td>
            <td><?php echo $row->state; ?></td>
            <td><?php echo $row->country; ?></td>
            <td><a href="<?php echo $this->getController()->getUrl('edit', null, ['id' => $row->custId]); ?>">Edit</a> | <a href="<?php echo $this->getController()->getUrl('delete', null, ['id' => $row->custId]); ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>