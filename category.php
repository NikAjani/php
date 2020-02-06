<?php

$conn = new mysqli('localhost','root', '', 'blog_portal');

$sql = 'SELECT catId,title FROM `category` WHERE parentId=0 ' ;

$tableData = $conn->query($sql);
echo '<select>';
while($data = $tableData -> fetch_assoc()){
    echo '<optgroup label="'.$data['title'].'">';
    $sqlInner = "SELECT title FROM `category` WHERE parentId='".$data['catId']."'";

    $rowData = $conn -> query($sqlInner);
    while($row = $rowData->fetch_assoc())
        echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    echo '</option> ';
}

echo '<br><br>';
echo '<select>';


$sql = "SELECT CP.title as child, C.title as parentCategory FROM 
`category` CP INNER JOIN `category` C ON C.catId = CP.parentId  
ORDER BY `parentCategory` ASC";

$rowData = $conn -> query($sql);
echo '<select>';
$group = '';
while($row = $rowData -> fetch_assoc()){
    if($group != $row['parentCategory']){
        echo '<optgroup label = "'.$row['parentCategory'].'">';
        $group = $row['parentCategory'];
    }
    echo '<option>'.$row['child'].'</option>';
}

echo '</optgroup></select>';

// SELECT *, C.title as parentCategory FROM 
// `category` CP INNER JOIN `category` C ON C.catId = CP.parentId

// SELECT category, COUNT(category) from post GROUP BY category

// SELECT C.title FROM 
// `category` C LEFT JOIN `post_category` P ON C.catId = P.catId WHERE P.postId = 22

// SELECT C.title FROM `category` C LEFT JOIN `post_category` P ON C.catId = P.catId GROUP BY C.title


?>