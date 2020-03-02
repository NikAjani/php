
<h3><a href="?c=product&a=add">Add Product</a></h3>

<div>
    <table border="1" width="100%" cellspacing='4'>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php 
            $products = $this->getProducts();
            foreach($products as $row): 
        ?>
        <tr style="text-align: center">
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->price; ?></td>
            <td><?php echo $row->stock; ?></td>
            <td><?php echo $row->description; ?></td>
            <td> <a href="?c=product&a=edit&id=<?php echo $row->productId; ?>">Edit </a>| <a href="?c=product&a=delete&id=<?php echo $row->productId; ?>">Delete</a></td>
        </tr>

            <?php endforeach; ?>
    </table>
</div>
</body>
</html>