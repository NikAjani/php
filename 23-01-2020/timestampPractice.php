<?php

    echo 'Current Timestamp : '.time().'<br>';

    echo 'Current Time : ',date('D-M-Y @ H:i:s',time()).'<br>';

    echo 'Time Befor 1 minit : '.date('d-M-Y @ H:i:s',time()-60).'<br>';

    echo 'Date And Time Befor a Week : '.date('d-M-Y @ H:i:s',strtotime('-1 week')).'<br>';

    echo 'Date And Time After a Week : '.date('d-M-Y @ H:i:s',strtotime('+1 week')).'<br>';
    
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';

?>