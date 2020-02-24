<?php

    require_once "indexPost.php";
    include_once "header.php";

?>

<style>

    table, th, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>

    <h1>Index</h1>

    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>

            <?php
                foreach($result as $row) {
                    echo '<tr>';
                    echo '<td>'.$row['demoId'].'</td>';
                    echo '<td>'.$row['firstName'].'</td>';
                    echo '<td>'.$row['lastName'].'</td>';
                    echo '<td><a href="register.php?editId='.$row['demoId'].'">Edit </a> | <a href="delete.php?delId='.$row['demoId'].'">Delete</a></td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>