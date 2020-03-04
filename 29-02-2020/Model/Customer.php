<?php

namespace Model;

use Model\Core\Request;

class Customer extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('customer', 'custId');
    }

    public function getCustomer() {

        $request = new Request();
        
        $query = "SELECT * 
        FROM `customer` C INNER JOIN `customer_address` CA 
        ON CA.custId = C.custId 
        WHERE C.custId = {$request->getRequest('id')};";

        return $this->fetchRow($query);
    }

    public function getCustomers() {

        $request = new Request();

        $query = "SELECT * 
        FROM `customer` C INNER JOIN `customer_address` CA 
        ON CA.custId = C.custId;";

        return $this->fetchAll($query);
    }

}