<?php

namespace App\Model\User;

class User extends \App\Model\Connection {

    function userLogin($loginData) {

        $loginData = $this->prepareData('login',$loginData);

        if($loginReturn = $this->fetchRow('userId, firstName', 'user', $loginData)){
            return $loginReturn;
        } else
            return false;
    }

    function addUser($insertData) {

        $registerData = $this->prepareData('register', $insertData);
        

        if($id = $this->insertData('user', $registerData)) {
            $addressData = $this->prepareData('Address', $insertData);
            $addressData = array_merge($addressData, ['userId' => $id]);

            if($this->insertData('user_addresses', $addressData))
                return true;
            else
                return false;
            
        }
    }

    function prepareData($type, $data) {

        $preparedData = [];

        switch($type){

            case 'login':
                $preparedData = array_merge($preparedData, ['email' => $data['userName']]);
                $preparedData = array_merge($preparedData, ['password' => $data['loginpassword']]);
                
                return $preparedData;

            case 'register':
                $preparedData = array_merge($preparedData, ['firstName' => $data['firstName']]);
                $preparedData = array_merge($preparedData, ['lastName' => $data['lastName']]);
                $preparedData = array_merge($preparedData, ['email' => $data['email']]);
                $preparedData = array_merge($preparedData, ['password' => $data['password']]);
                $preparedData = array_merge($preparedData, ['phoneNo' => $data['phoneNo']]);
                
                return $preparedData;

            case 'Address':
                $preparedData = array_merge($preparedData, ['street' => $data['street']]);
                $preparedData = array_merge($preparedData, ['city' => $data['city']]);
                $preparedData = array_merge($preparedData, ['state' => $data['state']]);
                $preparedData = array_merge($preparedData, ['zipCode' => $data['zipCode']]);
                $preparedData = array_merge($preparedData, ['country' => $data['country']]);
                
                return $preparedData;
        }

    }
}

?>