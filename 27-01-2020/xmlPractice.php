<?php

    $xmlData = simplexml_load_file('customerReview.xml');

    foreach($xmlData as $customer){

        echo '<b>'.$customer->name.'</b> Give <b>'.$customer->reviewStar.'</b> Star Message is <b>'.$customer->msg.'</b><br>';
    }

?>