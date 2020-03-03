
<div>
    <?php $category = $this->getCategory(); ?>
    <form action="<?php echo $this->getUrl('save', null, ['id' => $category->catId]); ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $category->name; ?>"></td>
            </tr>
            <tr>
                <td>Select Parent Category</td>
                <td><select name="parentId" id="parentD">
                    <option value="0">-- Select Parent Categoy --</option>
                    <?php foreach($categories as $parentCat): ?>
                    <option value="<?php echo $parentCat[0]; ?>" <?php if($parentCat[0] == $category->parentId) echo 'selected'; ?>><?php echo $parentCat[1]; ?></option>
                    <?php endforeach; ?>
                </select></td>
            </tr>
            
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" ><?php echo $category->description; ?></textarea></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <?php foreach($status as $statusKey => $statusValue): ?>
                            <option value="<?php echo $statusKey; ?>" <?php if($statusKey == $category->status) echo 'selected'; ?>><?php echo $statusValue; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>