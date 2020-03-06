
<div>
    <?php $product = $this->getProduct(); ?>
    <form action="<?php echo $this->getController()->getUrl('save', null, ['id' => $product->productId]); ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="product[name]" id="name" value="<?php echo $product->name; ?>"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="product[price]" id="price" value="<?php echo $product->price; ?>"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" name="product[stock]" id="stock" value="<?php echo $product->stock; ?>"></td>
            </tr>
            <tr>
                <td>Categpory </td>
                <td>
                    <select name="product_category[category]" id="category">
                        <?php foreach($this->getController()->getCategoryName() as $parentCat): ?>
                            <option value="<?php echo $parentCat->catId; ?>" <?php if($parentCat->catId == $product->catId) echo 'selected'; ?>><?php echo $parentCat->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="product[description]" id="description" ><?php echo $product->description; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Save"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>