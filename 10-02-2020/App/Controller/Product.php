<?php

namespace App\Controller;

class Product extends \Core\BaseControllers {

    function __construct() {

        echo '<br>Inside Product<br>';
    }

    function index() {

        echo '<br>You are Inside Index Of Product<br>';
    }

    function edit($id = '') {

        echo '<br>You are Inside Of Edit Of Product<br>';
        if($id != '')
            echo 'Id = '.$id;
        //print_r($this->param);
    }
}

?>