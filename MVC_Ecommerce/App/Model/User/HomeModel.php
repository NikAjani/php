<?php

namespace App\Model\User;

class HomeModel extends \App\Model\Connection {
    
    function getCMS($url) {

        return $this->fetchRow('cmsName, content', 'cms', ['UrlKey' => $url]);
    }

}

?>