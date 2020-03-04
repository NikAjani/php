<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Add</title>
</head>
<body>
    <h3>
        Add New Product
    </h3>

    <div>
        <form action="?c=product&a=save" method="post">
            <table border="1" width="100%" cellspacing='4'>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="name" id="name" ></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id="price" ></td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><input type="number" name="stock" id="stock" ></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="description" ></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Add Product"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>