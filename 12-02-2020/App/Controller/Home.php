<?php

namespace App\Controller;

use \Core\BaseView;

class Home extends \Core\BaseControllers {

    function indexAction() {

        BaseView::renderTemplet('Home/index.html', ['name' => 'Nikhil']);
    }

}

?>