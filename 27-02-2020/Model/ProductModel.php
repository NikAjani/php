<?php

require_once 'Core/Row.php';
require_once 'Core/Request.php';

class ProductModel {

    protected $row1 = null;
    protected $request = null;

    public function __construct() {
        $this->setRow1();
        $this->setRequest();
    }

    public function setRequest() {
        $this->request = new Request();
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

    public function setRow1() {
        $this->row1 = new Row('product', 'productId');
        return $this;
    }

    public function getRow() {
        return $this->row1;
    }
    
    public function insert() {
        $request = $this->getRequest();
        $row = $this->getRow();

        $row->name = $request->getPost('name');
        $row->price = $request->getPost('price');
        $row->stock = $request->getPost('stock');
        $row->description = $request->getPost('description');

        return $row->insert();
    }

    public function fetchAll() {
        $row1 = new Row('product', 'productId');

        return $row1->fetchAll();
    }
}