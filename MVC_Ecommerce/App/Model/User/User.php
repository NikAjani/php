<?php

namespace App\Model\User;

class User extends \App\Model\Connection {

    function userLogin($loginData) {

        $loginData = $this->prepareData('login',$loginData);

        if($loginReturn = $this->fetchRow('firstName, userType', 'user', $loginData)){
            return $loginReturn;
        } else
            return false;
    }

    function prepareData($type, $data) {

        $preparedData = [];

        switch($type){

            case 'login':
                $preparedData = array_merge($preparedData, ['emailId' => $data['userName']]);
                $preparedData = array_merge($preparedData, ['password' => $data['loginpassword']]);
                
                return $preparedData;

            case 'register';
                $preparedData = array_merge($preparedData, ['firstName' => $data['firstName']]);
                $preparedData = array_merge($preparedData, ['lastName' => $data['lastName']]);
                $preparedData = array_merge($preparedData, ['emailId' => $data['emailId']]);
                $preparedData = array_merge($preparedData, ['phoneNo' => $data['phoneNo']]);
                $preparedData = array_merge($preparedData, ['password' => md5($data['password'])]);
                $preparedData = array_merge($preparedData, ['information' => $data['information']]);

                return $preparedData;
        }

    }
}

?>