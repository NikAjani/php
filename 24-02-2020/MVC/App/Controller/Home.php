<?php

namespace App\Controller;
use \Core\BaseView as View;

class Home extends \Core\BaseControllers {

    function indexAction() {

        View::render('index.phtml');
    }

    function addUserAction() {
        View::render('register.phtml');
    }
}

?>