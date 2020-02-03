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
    <title>Blog Posts</title>
</head>
<body>
<div>
    <?php
        session_start();
        if(isset($_SESSION['userName'])){ 
            include_once('header.php'); 
            require_once 'connection.php';
            require_once 'printTable.php';

            $index = new Connection();
            $table = new PrintTable();
    ?>     
</div>

<a href="addPost.php"><button class="btn btn-outline-info">Add Blog Post</button></a>

<div>
    <table class="table table-striped">
        <?php
                $rowData = $index -> fetchAll('post_category');
                echo $table -> createTableHeader($rowData);

                $rowData = $index -> fetchAll('post_category');

                echo $table -> createTableRow($rowData);  
        ?>
        
    </table>
</div>
<div>
    <?php
        } else
            echo '<b>Please Login First <a href="index.php"> Login </a></b>';
    ?>
</div>
</body>
</html>