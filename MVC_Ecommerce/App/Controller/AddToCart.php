<?php

namespace App\Controller;

session_start();

class AddToCart extends \Core\BaseControllers {

    public function indexAction() {

        //session_set

        print_r($_POST);

        if(isset($_POST['action'])){

            if($_POST['action'] == 'add') {

                $cart_array = [ "productName" => $_POST['productName'], "productPrice" => $_POST['productPrice'], "qunt" => $_POST["qunt"], 'total' => $_POST['productPrice'] * $_POST['qunt']];
                $is_exist = false;

                if(isset($_SESSION['shoppingCart'])){
                    $quntity = 0;
                    
                    foreach($_SESSION['shoppingCart'] as $cart => $val) {
                        if($_SESSION['shoppingCart'][$cart]['productName'] == $cart_array['productName']){
                            $quntity = $_SESSION['shoppingCart'][$cart]['qunt'] + $cart_array['qunt'];
                            $total = $quntity * $cart_array['productPrice'];
                            $_SESSION['shoppingCart'][$cart]['qunt'] = $quntity;
                            $_SESSION['shoppingCart'][$cart]['total'] = $total;
                            $is_exist = true;
                            break;
                        }
                    }
                }
                if(!$is_exist)
                    $_SESSION['shoppingCart'][] = $cart_array;
                
            }
            
        }
    }

    public function getCartAction() {

        echo json_encode($_SESSION['shoppingCart']);
    }

    public function removeCartItemAction() {

        $deleteName = $_POST['removeItem'];

        foreach($_SESSION['shoppingCart'] as $key => $val) {
            if($val['productName'] == $deleteName){
                print_r($val);
                unset($_SESSION['shoppingCart'][$key]);
            }
        }

    }
}

?>