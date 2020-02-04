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
    <title>category Grid</title>
</head>
<body>
<div>
    <?php
    session_start();
    if(isset($_SESSION['userName'])){
        require_once 'connection.php';
        require_once 'printTable.php';

        $index = new Connection();
        $table = new PrintTable();
    ?>
</div>
<div>
    <?php include_once('header.php'); ?>
</div>
<div>
    <table class="table table-striped">
        <tr>
            <?php
                $rowData = $index -> fetchAll('category');
                while($row = $rowData -> fetch_assoc()){
                    
                    foreach($row as $key => $value){
                        if($key == 'password')
                            continue;
                        ?>
                        <th><?php echo $key; ?></th>
                    <?php 
                    }
                    break;
                }
            ?>
            <th>Action</th>
        </tr>
        <tr>
        <?php
            $rowData = $index -> fetchAll('category');
            while($row = $rowData -> fetch_assoc()){
                
                foreach($row as $key => $value){
                    if($key == 'password')
                        continue;
                    ?>
                    <td><?php echo $value; ?></td>
                <?php 
                }
                ?>
                <td><a href="editCategory.php?editId=<?php echo $row['catId']; ?>">Edit </a>| <a href="delete.php?catDel=<?php echo $row['catId']; ?>">Delete</a></td>
        </tr>
                <?php
                
            }
            ?>
        
    </table>
</div>
<div>
    <?php
        }else
            echo '<b>Please Login First <a href="index.php"> Login </a></b>';
    ?>
</div>
</body>
</html>