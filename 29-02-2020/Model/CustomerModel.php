<?php

namespace Model;

use Model\Core\Row;

class CustomerModel extends Row {

    public function __construct() {
        parent::__construct('customer', 'custId');
    }

}