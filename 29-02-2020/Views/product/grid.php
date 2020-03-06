
<h3><a href="?c=product&a=add">Add Product</a></h3>

<div>
    <form action="<?php echo $this->getController()->getUrl('delete'); ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <th><input type="submit" value="Delete"></th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Media</th>
                <th>Action</th>
            </tr>

            <tr style="text-align: center">

            <?php 
                $products = $this->getProducts();
                if(!$products):
            ?>
                <td colspan="6">No record found</td></tr>
            <?php
                else:
                foreach($products as $row): 
            ?>
            <tr style="text-align: center">
                <td><input type="checkbox" name="delId[]" value="<?php echo $row->productId; ?>" id="delId"></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->price; ?></td>
                <td><?php echo $row->stock; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><a href="<?php echo $this->getController()->getUrl('media', null, ['id' => $row->productId]); ?>">Media</a></td>
                <td> <a href="<?php echo $this->getController()->getUrl('edit', null, ['id' => $row->productId]) ?>">Edit </a></td>
            </tr>

            <?php 
                endforeach;
                endif; 
            ?>
        </table>
    </form>
</div>
</body>
</html>