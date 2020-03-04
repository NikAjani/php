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

        $this->setCustomers($customerModel->getCustomers());
        require_once "Views/customer/show.php";
    }

    public function addAction() {
        $customerModel = new CustomerModel();
        $this->setCustomer($customerModel);
        require_once "Views/customer/add.php";
    }

    public function editAction() {
        
        try {

            if(!$this->getRequest()->getRequest('id'))
                throw new Exception("Id not found.");
                
            $customerModel = new CustomerModel();

            $this->setCustomer($customerModel->getCustomer());
            
            require_once "Views/customer/add.php";

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function deleteAction() {

        try {

            if(!$this->getRequest()->getRequest('id'))
                throw new Exception("Id not Found.");
                
            $customerModel = new CustomerModel();
            $customerModel->custId = $this->getRequest()->getRequest('id');
            
            if($customerModel->delete())
                $this->redirect('Customer');
            
                throw new \Exception("Error Delete Customer");

        } catch(Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function saveAction() {

        try {

            $customerModel = new CustomerModel();
            $customerAddress = new CustomerAddress();

            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid request.");

            if($id = (int)$this->getRequest()->getRequest('id')) {
                $customerModel->load($id);

                $query = "SELECT * 
                FROM `{$customerAddress->getTableName()}` 
                WHERE `custId` = {$id};";

                $customerAddress->fetchRow($query);
            }

            $customerModel->setData($this->getRequest()->getPost('account'));
            
            if($customerModel->save()) {
                
                $customerAddress->setData($this->getRequest()->getPost('address'));
                $customerAddress->custId = $customerModel->custId;

                if($customerAddress->save())
                    $this->redirect('Customer');
                
                throw new Exception("Error in sace customer address detail");
                
            }

            throw new Exception("Error in save customer account detail.");

        } catch (Exception $e) {
            
            echo $e->getMessage();
        }
    }
}