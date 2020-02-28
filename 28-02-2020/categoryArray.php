<?php

echo '<pre>';

$array = [
    ['category' => 1, 'cName' => 'c1', 'attribute' => 1, 'aName' => 'a1', 'option' => 1, 'oName' => 'o1'],
    ['category' => 1, 'cName' => 'c1', 'attribute' => 1, 'aName' => 'a1', 'option' => 2, 'oName' => 'o2'],
    ['category' => 1, 'cName' => 'c1', 'attribute' => 2, 'aName' => 'a2', 'option' => 3, 'oName' => 'o3'],
    ['category' => 1, 'cName' => 'c1', 'attribute' => 2, 'aName' => 'a2', 'option' => 4, 'oName' => 'o4'],
    ['category' => 2, 'cName' => 'c2', 'attribute' => 3, 'aName' => 'a3', 'option' => 5, 'oName' => 'o5'],
    ['category' => 2, 'cName' => 'c2', 'attribute' => 3, 'aName' => 'a3', 'option' => 6, 'oName' => 'o6'],
    ['category' => 2, 'cName' => 'c2', 'attribute' => 4, 'aName' => 'a4', 'option' => 7, 'oName' => 'o7'],
    ['category' => 2, 'cName' => 'c2', 'attribute' => 4, 'aName' => 'a4', 'option' => 8, 'oName' => 'o8']
];

$final = [
    'category' => [
        1 => [
            'cName' => 'c1',
            'attribute' => [
                1 => [
                    'aName' => 'a1',
                    'option' => [
                        1 => [
                            'oName' => 'o1',
                        ],
                        2 => [
                            'oName' => 'o2',
                        ]
                    ]
                ],

                2 => [
                    'aName' => 'a2',
                    'option' => [
                        3 => [
                            'oName' => 'o1',
                        ],
                        4 => [
                            'oName' => 'o2',
                        ]
                    ]
                ]
                
            ]
        ]
    ]
];

print_r($final);
// print_r($final['category'][1]['attribute'][1]['option']);

$final = [];

foreach ($array as $value) {

    if(!array_key_exists($value['category'], $final))
        $final['category'][$value['category']]['cName'] = $value['cName'];

    if(!array_key_exists('attribute', $final['category'][$value['category']]))
        $final['category'][$value['category']]['attribute'] = [];

    if(!array_key_exists($value['attribute'], $final['category'][$value['category']]['attribute']))
        $final['category'][$value['category']]['attribute'][$value['attribute']]['aName'] = $value['aName'];

    if(!array_key_exists('option', $final['category'][$value['category']]['attribute'][$value['attribute']]))
       $final['category'][$value['category']]['attribute'][$value['attribute']]['option'] = [];

    if(!array_key_exists($value['option'], $final['category'][$value['category']]['attribute'][$value['attribute']]['option']))
        $final['category'][$value['category']]['attribute'][$value['attribute']]['option'][$value['option']]['oName'] = [$value['oName']];
}

print_r($final);