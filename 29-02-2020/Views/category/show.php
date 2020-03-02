<h3><a href="?c=category&a=add">Add Category</a></h3>

<div>
    <table border="1" width="100%" cellspacing='4'>
        <tr>
            <th>Category Name</th>
            <th>parent Id</th>
            <th>Description</th>
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
            <td><a href="?c=category&a=edit&id=<?php echo $row->catId; ?>">Edit </a>| <a href="?c=category&a=delete&id=<?php echo $row->catId; ?>">Delete</a></td>
        </tr>

            <?php endforeach; ?>
    </table>
</div>
</body>
</html>