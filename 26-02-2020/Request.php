<?php

class Request {

    public function isPost() {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
            return true;

        return false;
    }

    public function isGet() {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
            return true;

        return false;
    }

    public function getPost($name = null, $value = null) {

        // $_POST = ["firstName" => "Ajani", "lastName" => "Nikhil"];
        
        if($name != null) { 
            
            if(key_exists($name, $_POST))
                return $_POST[$name];
            
            if($value != null)
                return $value;

            return null;
        }

        return $_POST;
    }

}

$request = new Request();
$_SERVER["REQUEST_METHOD"] = "GET";
echo "<pre>";
print_r($request->getPost(  ));
print_r($request);


?>