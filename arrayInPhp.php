<?php
     
     $person = array('Nikhil','Ajani',22,false);

     print_r ($person);

     //Print using loop

     for($i=0; $i < sizeof($person); $i++){
         echo '<br> ['.$i.'] '.$person[$i];
     }

     // associative Array

     $person = array('firstName' => 'Nikhil', 'lastName' => 'Ajani', 'age' => 22,
                     'isMarried' => false);
     echo '<br><br>';
     print_r($person);

     if($person['isMarried'])
        echo '<br>'.$person['firstName'].' is Married';
    else    
        echo '<br>'.$person['firstName'].' is Not Marrid';

    // multi dia Array

    echo '<br><br>';
    $person = array(
        'Nikhil' => array('lastName' => 'Ajani', 'age' => 22),
        'Abc' => array('lastName' => 'Xyz', 'age' => 30)
    );

    print_r($person);
    echo '<br>';
    foreach($person as $singlePerson => $name){
        echo $singlePerson.'<br>';

        foreach($name as $iteam){
            echo $iteam.'<br>';
        }
    }

?>