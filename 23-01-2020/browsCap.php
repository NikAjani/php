<?php

    echo $_SERVER['HTTP_USER_AGENT'] . "<br><br>";

    $browserDetail = get_browser(null, true);

    print_r($browserDetail);

?>