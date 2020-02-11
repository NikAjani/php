<?php

namespace App\Controller;

use \Core\BaseView;

class Home extends \Core\BaseControllers {

    function index() {

        BaseView::renderTemplet('Home/index.html', ['name' => 'Nikhil']);
    }

}

?>