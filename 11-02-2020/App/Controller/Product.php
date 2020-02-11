<?php

namespace App\Controller;

use Core\BaseView;

class Product extends \Core\BaseControllers {


    function index() {

        BaseView::renderTemplet('Product/index.html');
    }

    function edit() {
        
        if(isset($this->routeParam['id']))
            BaseView::renderTemplet('Product/edit.html', ['editId' => $this->routeParam['id']]);
        else
            BaseView::renderTemplet('Product/edit.html', ['editId' => 1]);
    }
}

?>