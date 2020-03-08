<?php

namespace Block\Customer;

class Grid extends \Block\Core\Template {

    protected $customers = null;

    public function __construct()
    {
        $this->setTemplate("customer/grid.php");   
        $this->setCustomers();
    }

    public function getCustomers()
    {
        return $this->customers;
    }

    public function setCustomers($customers = null)
    {
        if($customers == null) {

            $customers = new \Model\Customer();
            $customers = $customers->getCustomers();
        }

        $this->customers = $customers;

        return $this;
    }
}