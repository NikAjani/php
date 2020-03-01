
<div>
    <form action="<?php echo $action; ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $this->getCategory('name'); ?>"></td>
            </tr>
            <tr>
                <td>Select Parent Category</td>
                <td><select name="parentId" id="parentD">
                    <option value="0">-- Select Parent Categoy --</option>
                    <?php foreach($categories as $parentCat): ?>
                    <option value="<?php echo $parentCat[0]; ?>" <?php if($parentCat[0] == $this->getCategory('parentId')) echo 'selected'; ?>><?php echo $parentCat[1]; ?></option>
                    <?php endforeach; ?>
                </select></td>
            </tr>
            
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" ><?php echo $this->getCategory('description'); ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>