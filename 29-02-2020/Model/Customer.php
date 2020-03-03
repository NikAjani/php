<?php

namespace Model;

class Customer extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('customer', 'custId');
    }

}