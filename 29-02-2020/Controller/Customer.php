<?php

namespace Controller;

use Model\Customer as CustomerModel;
use Model\CustomerAddress;

class Customer extends \Controller\Core\Base {

    protected $customers = null;
    protected $customer = null;

    public function __construct() {
        $this->setRequest();
    }

    public function setCustomers($customers) {
        $this->customers = $customers;
        return $this;
    }

    public function getCustomers() {
        return $this->customers;
    }

    public function setCustomer($customer) {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer($key = null) {
        if($key == null)
            return $this->customer;
        return $this->customer[$key];
    }

    public function indexAction() {
        $customerModel = new CustomerModel();

        $query = "SELECT * 
        FROM `customer` C INNER JOIN `customer_address` CA 
        ON CA.custId = C.custId;";

        $collection = $customerModel->fetchAll($query);

        $this->setCustomers($collection);
        require_once "Views/customer/show.php";
    }

    public function addAction() {
        $action = "?c=Customer&a=save";
        require_once "Views/customer/add.php";
    }

    public function editAction() {
        
        $customerModel = new CustomerModel();
        
        $query = "SELECT * 
        FROM `customer` C INNER JOIN `customer_address` CA 
        ON CA.custId = C.custId 
        WHERE C.custId = {$this->getRequest()->getRequest('id')};";

        $this->setCustomer($customerModel->fetchRow($query)->getData());
        $action = "?c=customer&a=save&id=".$this->getRequest()->getRequest('id');
        
        require_once "Views/customer/add.php";
    }

    public function deleteAction() {
        $customerModel = new CustomerModel();
        $customerModel->custId = $this->getRequest()->getRequest('id');

        if($customerModel->delete())
            $this->redirect('Customer');
        throw new \Exception("Error Delete Customer");
        
    }

    public function saveAction() {

        $customerModel = new CustomerModel();
        $customerAddress = new CustomerAddress();

        if($this->getRequest()->getRequest('id')) {
            $customerModel->custId = $this->getRequest()->getRequest('id');

            if($customerModel->setData($this->getRequest()->getPost('account'))->update()) {

                $query = "SELECT * 
                FROM `{$customerAddress->getTableName()}` 
                WHERE `custId` = {$this->getRequest()->getRequest('id')};";

                $customerAddress->fetchRow($query);
                $customerAddress->setData($this->getRequest()->getPost('address'));
                
                if($customerAddress->update())
                    $this->redirect('Customer');
            }
        }

        if($customerModel->setData($this->getRequest()->getPost('account'))->insert()){

            $customerAddress->setData($this->getRequest()->getPost('address'));
            $customerAddress->custId = $customerModel->getData('custId');;
            
            if($customerAddress->insert())
                $this->redirect('Customer');
            
            throw new \Exception("Error Insert customer address");
            
        }
        throw new \Exception("Error Insert customer");
    }
}