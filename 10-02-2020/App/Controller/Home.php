<?php

namespace App\Controller;

class Home extends \Core\BaseControllers {

    function __construct() {

        echo '<br>In Home Page. <br>';
    }

    function index() {

        echo '<br>You Are inside Index Of Home Class.<br>';
    }

}

?>