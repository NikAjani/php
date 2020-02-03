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
    <title>Add Post</title>
</head>
<body>
<div>
    <?php
        session_start();
        if(isset($_SESSION['userName'])){
            include_once('header.php');
            require_once 'connection.php';
            require_once 'addPost_post.php';
    ?>     
</div>
<div>
    <h3>Add New Blog Post</h3>
    <form method="post">
        <div>
            <label for="title">Title : </label>
            <input type="text" name="title" id="title">
            <span>
                <?php
                    if(isset($_POST['addPost'])){
                        if(!$newPost -> validation('title'))
                            echo 'Please Enter Title';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="contant">Contant : </label>
            <textarea name="contant" id="contant"></textarea>
            <span>
                <?php
                    if(isset($_POST['addPost'])){
                        if(!$newPost -> validation('contant'))
                            echo 'Please Enter Contant';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="url">URL : </label>
            <input type="text" name="url" id="url">
            <span>
                <?php
                    if(isset($_POST['addPost'])){
                        if(!$newPost -> validation('url'))
                            echo 'Please Enter URL';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="publish">Publish At : </label>
            <input type="date" name="publish" id="publish">
            <span>
                <?php
                    if(isset($_POST['publish'])){
                        if(!$newPost -> validation('url'))
                            echo 'Please Enter Date Of Publish';
                    }
                
                ?>
            </span>
        </div>
        <div>
            <label for="cat">Category</label>
            <select name="cat[]" id="cat" multiple>
                <?php
                    $conn = new Connection();
                    $data = $conn -> fetchRow(['title'], 'category', []);
                    while($row = $data -> fetch_assoc()):
                ?>
                <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                <?php 
                    endwhile;
                ?>
                <span>
                <?php
                    if(isset($_POST['addPost'])){
                        if(!$newPost -> validation('cat'))
                            echo 'Please select Category';

                        if($newPost -> valid > 1)
                            $newPost -> addNewBlog();
                    }
                
                ?>
            </span>
                
            </select>
        </div>
        <div>
            <input type="submit" value="Add New Post" name="addPost">
            <input type="reset" value="Clear">
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