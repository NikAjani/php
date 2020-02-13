<?php

namespace App\Model\Product;

class ProductModel extends \App\Model\Connection{

    function getAllData() {

        $productData = $this->getAll('product');

        return $productData;
    }

    function addData($data) {

        return $id = $this->insertData('product', $data);
    }

    function getRow($id) {

        return $this->fetchRow('productName, productPrice','product',['productId' => $id]);

    }

    function updateData($data, $condition) {

        return $this->update($data, 'product', ['productid' => $condition[0]]);
    }

    function deleteData($condition) {

        return $this->deleteRow('product', $condition);
    }
}

?>