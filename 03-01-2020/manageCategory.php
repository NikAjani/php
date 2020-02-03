<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Manage Category</title>
</head>
<body>
<div>
    <?php 
        session_start();
        if(isset($_SESSION['userName'])){
        require_once 'manageCategory_post.php';
        require_once 'connection.php';    
    ?>
</div>
<div>
    <?php include_once('header.php'); ?>
</div>

<div>
    <h3>Add new Category</h3>
    <form method="post">
        <div>
            <label for="title">Title : </label>
            <input type="text" name="title" id="title">
            <span>
                <?php
                    if(isset($_POST['addCat'])){
                        if(!$category -> validation('title'))
                            echo 'Please Enter Title';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="catContant">Contant : </label>
            <textarea name="catContant" id="catContant"></textarea>
            <span>
                <?php
                    if(isset($_POST['addCat'])){
                        if(!$category -> validation('catContant'))
                            echo 'Please Enter Contant';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="catUrl">Url : </label>
            <input type="text" name="catUrl" id="catUrl">
            <span>
                <?php
                    if(isset($_POST['addCat'])){
                        if(!$category -> validation('catUrl'))
                            echo 'Please Enter URL';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="metaName">Meta Title : </label>
            <input type="text" name="metaName" id="metaName">
            <span>
                <?php
                    if(isset($_POST['addCat'])){
                        if(!$category -> validation('metaName'))
                            echo 'Please Enter Meta Name';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="parentCat">Parent Categoty</label>
            <select name="parentCat" id="parentCat">
                <option value="0">Select Parent Category</option>
                <?php $data = getParentCategory();
                    if($data):
                        while($row = $data -> fetch_assoc()):
                ?>
                <option value="<?php echo $row['catId']; ?>"><?php echo $row['title']; ?></option>
                <?php
                        endwhile;
                    endif;
                ?>
            </select>
        </div>
        <div>
            <label for="catImage">Image</label>
            <input type="file" name="catImage" id="catImage">
            <span>
                <?php
                    if(isset($_POST['addCat'])){
                        if(!$category -> validation('catImage'))
                            echo 'Please select Image';

                        if($category -> valid > 1)
                            $category -> addCategory();
                    }
                
                ?>
            </span>
        </div>
        <div>
            <input type="submit" value="Add Category" name="addCat">
        </div>
    </form>
</div>
<div>
    <?php
        }else
            echo '<b>Please Login First <a href="index.php"> Login </a></b>';
    ?>
</div>
</body>
</html>