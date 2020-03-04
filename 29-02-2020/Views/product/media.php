<?php 
$product = $this->getProduct();
$productImages = $this->getProductImages(); 
?>
<div>

    <table>

        <form action="<?php echo $this->getUrl('saveImage', null, ['id' => $product->productId]); ?>" method="post" enctype="multipart/form-data">
            <tr>
                <td>Select Image </td>
                <td><input type="file" name="image" id="image"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="upload" name="uploadImage"></td>
            </tr>
        </form>
    </table>

    <table border="1" width="100%" cellspacing='4'>

        <form action="<?php echo $this->getUrl(); ?>" method="post">
        <tr style="text-align: right">
            <td colspan="5"><input type="submit" value="Update" name="update"></td>
        </tr>
        
            <tr>
                <th>Image</th>
                <th>Thumbnail</th>
                <th>Base</th>
                <th>Small</th>
                <th>Explode From Media</th>
            </tr>
            <?php if(!$productImages): ?>
            <tr style="text-align: center">
                <td colspan="5">No Record Found</td>
            </tr>
            <?php
                else:
                foreach($productImages as $row):
            ?>
            <tr>
                <td><?php echo $row->image; ?></td>
                <td><input type="radio" name="thumnail" id="thumnail"></td>
                <td><input type="radio" name="base" id="base"></td>
                <td><input type="radio" name="small" id="small"></td>
                <td><input type="checkbox" name="explode[]" id="explode" checked></td>
            </tr>
            <?php 
                endforeach;
                endif; 
            ?>

        </form>

    </table>
</div>

</body>
</html>