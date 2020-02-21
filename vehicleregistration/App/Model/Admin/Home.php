<?php

namespace App\Model\Admin;

class Home extends \App\Model\Connection {

    function getAllService() {

        return $this->getAll('service_registrations');
    }
}

?>