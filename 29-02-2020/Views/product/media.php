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

        <form action="<?php echo $this->getUrl('updateMedia', null, ['id' => $product->productId]); ?>" method="post">
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
            <tr style="text-align: center;">
                <td>
                    <img style="height: 50px; width: 50px" src="<?php echo $this->getImage($row->image, "\media\catalog\product\\"); ?>">
                </td>
                <td>
                    <input type="radio" name="thumnail" id="thumnail" value="<?php echo $row->imageId; ?>" <?php if($product->thumnail == $row->imageId) echo 'checked'; ?>>
                </td>
                <td>
                    <input type="radio" name="base" id="base" value="<?php echo $row->imageId; ?>" <?php if($product->base == $row->imageId) echo 'checked'; ?>>
                </td>
                <td>
                    <input type="radio" name="small" id="small" value="<?php echo $row->imageId; ?>" <?php if($product->small == $row->imageId) echo 'checked'; ?>>
                </td>
                <td>
                    <input type="checkbox" name="explode[]" id="explode" value="<?php echo $row->imageId; ?>" <?php if($row->explodeFromMedia == 1) echo 'checked'; ?>
                ></td>
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