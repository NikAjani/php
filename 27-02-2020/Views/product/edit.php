<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Edit</title>
</head>
<body>
<h3>
        Edit Product
    </h3>

    <div>
        <form method="post">
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