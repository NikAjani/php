<?php

$row = 5;
$tree = [];

for($i = 1; $i < $row; $i++){
    for($j = 0; $j <= 1; $j++)
        $tree[$i][$j] = $i * 2 + $j;
}

echo '<pre>';
print_r($tree);
echo '</pre><br><br>';

$conn = new mysqli('localhost','root', '', 'logindemo');

$sql = 'SELECT * FROM `tree`';

$tableData = $conn->query($sql);

$data = $tableData -> fetch_all();

echo '<Br>';
foreach($data as $key => $value){
    print_r($value);
    echo '<br>';
}

?>