<?php

namespace Model;

class CustomerAddress extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('customer_address', 'addressId');
    }
}