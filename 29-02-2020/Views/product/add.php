
<div>
    <form action="<?php echo $action; ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $this->getProduct('name'); ?>"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" id="price" value="<?php echo $this->getProduct('price'); ?>"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" name="stock" id="stock" value="<?php echo $this->getProduct('stock'); ?>"></td>
            </tr>
            <tr>
                <td>Categpory </td>
                <td>
                    <select name="category" id="category">
                        <?php foreach($categories as $parentCat): ?>
                            <option value="<?php echo $parentCat[0]; ?>"><?php echo $parentCat[1]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" ><?php echo $this->getProduct('description'); ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Edit Product"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>