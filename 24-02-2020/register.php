<?php
include_once "header.php";
?>
<style>
    .field {
        margin-top: 10px;
    }
</style>

<div style="margin-top: 50px">
<h2>Add User</h2>
    <form action="registerPost.php" method="post">

        <div class="field">
            <label for="firtsName">First Name : </label>
            <input type="text" name="firstName" id="firstName">
        </div>

        <div class="field">
            <label for="lastName">last Name : </label>
            <input type="text" name="lastName" id="lastName">
        </div>

        <div class="field">
            <input type="submit" value="Add User" name="submit">
        </div>
    </form>
</div>

</body>
</html>