<h3><a href="<?php echo $this->getController()->getUrl('add', null, []); ?>">Add Category</a></h3>

<div>
    <table border="1" width="100%" cellspacing='4'>
        <tr>
            <th>Category Name</th>
            <th>Parent Id</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
            $categories = $this->getCategories();
            foreach($categories as $row): 
        ?>
        <tr style="text-align: center">
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->parentId; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->status; ?></td>
            <td><a href="<?php echo $this->getController()->getUrl('edit', null, ['id' => $row->catId]); ?>">Edit </a>| <a href="<?php echo $this->getController()->getUrl('delete', null, ['id' => $row->catId]); ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>