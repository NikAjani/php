<?php

$conn = new mysqli('localhost','root', '', 'blog_portal');

$sql = 'SELECT catId,title FROM `category` WHERE parentId=0 ' ;

$tableData = $conn->query($sql);

while($data = $tableData -> fetch_assoc()){
    echo '<b>'.$data['title'].'</b>';
    $sqlInner = "SELECT title FROM `category` WHERE parentId='".$data['catId']."'";

    $rowData = $conn -> query($sqlInner);
    while($row = $rowData->fetch_assoc())
        echo '<li>'.$row['title'].'</li>';
}

?>