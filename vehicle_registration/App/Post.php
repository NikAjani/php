<?php

namespace App;

class Post {

    public static function getPost($fieldName = '') {

        if($fieldName == "")
            return $_POST;
        else
            return $_POST[$fieldName];
    }
}

?>