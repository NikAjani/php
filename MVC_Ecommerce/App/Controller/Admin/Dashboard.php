<?php

namespace App\Controller\Admin;

use \Core\BaseView as View;

session_start();

class Dashboard extends \Core\BaseControllers {


    function gridAction() {

        View::renderTemplet('/Admin/index.html');
    }
    
}

?>