<?php

$tree = [1 => [2 => [4,5], 3 => [6,7]]];
print_r ($tree[1][3]);
echo '<pre>';
print_r($tree);
echo'</pre>';

$k = 1;
$temp = [];
for($i = 1; $i <= 2; $i++)
    $temp = [[[$i]]];

echo '<pre>';
print_r($temp);
echo'</pre>';
    


?>