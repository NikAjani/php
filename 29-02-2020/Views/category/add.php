
<div>
    <?php $category = $this->getCategory();?>
    <form action="<?php echo $this->getController()->getUrl('save', null, ['id' => $category->catId]); ?>" method="post">
        <table border="1" width="100%" cellspacing='4'>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $category->name; ?>"></td>
            </tr>
            <tr>
                <td>Select Parent Category</td>
                <td><select name="parentId" id="parentD">
                    <option value="0">-- Select Parent Categoy --</option>
                    <?php foreach($this->getParentCategory() as $parentCat): ?>
                    <option value="<?php echo $parentCat->catId; ?>" <?php if($parentCat->catId == $category->parentId) echo 'selected'; ?>><?php echo $parentCat->name; ?></option>
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
                        <?php foreach($this->getStatusOptions() as $statusKey => $statusValue): ?>
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