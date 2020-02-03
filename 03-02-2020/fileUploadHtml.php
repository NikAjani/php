<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
</head>
<body>

<?php

    require_once "fileUploadPost.php";

?>

<div>
    <form method="post" enctype="multipart/form-data"> 
        <div>
            <label for="fileName">Select Profile Image : </label>
            <input type="file" name="profileImg" id="fileName">
            <span>
                <?php
                    if(isset($_POST["upload"])){
                        if(!checkExtension('profileImg','jpg'))
                            echo 'Please Select JPG File Only';
                    }
                ?>
            </span>
        </div>
        <br>
        <div>
            <label for="fileName">Select pdf : </label>
            <input type="file" name="fileName" id="fileName">
            <span>
                <?php
                    if(isset($_POST["upload"])){
                        if(!checkExtension('fileName','pdf'))
                            echo 'Please Select PDF File Only';
                    }
                ?>
            </span>
        </div>
        <br>
        <div>
            <input type="submit" name="upload" value="Upload">
        </div>
    </form>
</div>
</body>
</html>