<?php
include_once "header.php";
?>
<style>
    .field {
        margin-top: 10px;
    }
</style>

<div style="margin-top: 50px">

    <?php 
        if(isset($_GET['editId'])){
            $action = "edit.php";
            require_once $action;
        } else{
            $editData['firstName'] = "";
            $editData['lastName'] ="";
            $action = "registerPost.php";
        }
    ?>

    <form action=<?php echo $action; ?> method="post">

        <div class="field">
            <label for="firtsName">First Name : </label>
            <input type="text" name="firstName" id="firstName" value="<?php echo $editData['firstName']; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $editData['demoId']; ?>">
        </div>

        <div class="field">
            <label for="lastName">last Name : </label>
            <input type="text" name="lastName" id="lastName" value="<?php echo $editData['lastName']; ?>">
        </div>

        <div class="field">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>

</body>
</html>