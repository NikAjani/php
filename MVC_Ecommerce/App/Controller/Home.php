<?php

namespace App\Controller;
use Core\BaseView as View;
use App\Model\User\HomeModel as HomeModel;

class Home extends \Core\BaseControllers {

    function viewAction() {

        $getCMS = new HomeModel();

        if(isset($this->routeParam['url']))
            $content = $getCMS->getCMS($this->routeParam['url']);
        else
            $content = $getCMS->getCMS('home');
        
        View::renderTemplet('/User/Home/index.html', ['content' => $content[0]]);
    }
}

?>