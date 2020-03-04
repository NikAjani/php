<?php

namespace App\Controller;
use Core\BaseView as View;
use App\Model\User\SearchModel as SearchModel;
use App\config as Config;

class Search extends \Core\BaseControllers {

    function viewAction() {
        $srchName = $this->routeParam['url'];

        $search = new SearchModel();
        $searchData = $search->getSearchResult($srchName);
        if($searchData[0] == "category")
            header("Location: ".Config::URL."/category/view/".$searchData[1]);
        else {
            if($searchData) {
                View::renderTemplet("/User/Category/index.html", ['catData' => $searchData]);
            }
        }
        
    }
}

?>