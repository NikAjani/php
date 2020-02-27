<?php

$data = [
    ['c' => 1, 'a' => 1, 'o' => 1],
    ['c' => 1, 'a' => 1, 'o' => 2],
    ['c' => 1, 'a' => 2, 'o' => 3],
    ['c' => 1, 'a' => 2, 'o' => 4],
    ['c' => 2, 'a' => 3, 'o' => 5],
    ['c' => 2, 'a' => 3, 'o' => 6],
    ['c' => 2, 'a' => 4, 'o' => 7],
    ['c' => 2, 'a' => 4, 'o' => 8]
];

echo '<pre>';

$final = [];

foreach ($data as $key => $row){
    $final[$row['c']][$row['a']][$row['o']] = $row['o'];
    
}
print_r($final);

// $final[$row['c']] = [$row['c'] => [$row['a'] => [$row['o'] => $row['o']]]];

?>