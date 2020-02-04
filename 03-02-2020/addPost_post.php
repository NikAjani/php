<?php

require_once 'connection.php';

class addNewPost{
    public $valid = 1;

    function __construct(){
        
        $this -> valid = 0;    
    }

    function validation($fieldName){

        if(isset($_POST[$fieldName]) && !empty($_POST[$fieldName])){
            $this -> valid += 1;
            return true;
        } else {
            $this -> valid = 0;
            return false;
        }
    }

    function addNewBlog(){

        $cat = $_POST['cat'];
        $blogData = $this -> prepareData($_POST);
        print_r($blogData);
        $connect = new Connection();
        echo $id = $connect -> insertData('post', $blogData);
        echo 'hii';
        if($id){
            echo 'hii';
            foreach($cat as $value){

                echo $catId = $connect -> load('catId', 'category', ['title' => $value]);

                $post_cat_id = $connect -> insertData('post_category', ['postId' => $id, 'catId' => $catId]);
            }
            header('Location: blog_post.php');
        }
        else    
            echo 'Error in blog post Insert';

    }

    function prepareData($inserData){
        $preparedData = [];
        $preparedData = array_merge($preparedData, ['userId' => $_SESSION['id']]);
        $preparedData = array_merge($preparedData, ['title' => $inserData['title']]);
        $preparedData = array_merge($preparedData, ['contant' => $inserData['contant']]);
        $preparedData = array_merge($preparedData, ['url' => $inserData['url']]);
        $preparedData = array_merge($preparedData, ['publish' => $inserData['publish']]);
        $preparedData = array_merge($preparedData, ['category' => implode(',' ,$inserData['cat'])]);

        return $preparedData;
    }

    function __destruct() {
        $this -> valid = 0;
    }
}

if(isset($_POST['addPost'])){
    $newPost = new addNewPost();

}

?>