<?php

namespace Block\Customer;

class Add extends \Block\Core\Template {

    protected $customer = null;

    public function __construct()
    {
        $this->setTemplate('customer/add.php');   
    }
 
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }
}