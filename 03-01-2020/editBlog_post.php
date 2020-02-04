
<?php

require_once 'connection.php';
$conn = new Connection();

$rowData = $conn -> fetchRow(['*'],'post', ['postId' => $_GET['editId']]);

$rowData = $rowData -> fetch_assoc();



function get_editValue($fieldName, $retrunType = ''){
    global $rowData;

    if(gettype($retrunType) == 'array'){
        $returnData = explode(',', $rowData[$fieldName]);
        return $returnData;
    }
    else
        return ($rowData[$fieldName]);
}


class UpdatePost{
    public $valid = 1;

    function __construct(){
        
        $this -> valid = 0;    
    }

    function getValue($fieldName){
        
        return (isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
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

    function updatePost(){

        $connct = new Connection();

        $updateData = $this -> prepareData($_POST);
        echo 'hiii';

        $isUpdate = $connct -> update($updateData, 'post', ['postId' => $_GET['editId']]);

        if($isUpdate){
            header('Location: blog_post.php');
        }
        else    
            echo 'Error';

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

function getParentCategory(){
    $catConnect = new Connection();

    $parentData = $catConnect -> fetchRow(['catId', 'title'], 'category', ['parentId' => 0]);

    if($parentData -> num_rows > 0)
        return $parentData;
    else
        return false;
}


if(isset($_POST['update'])){
    $newPost = new UpdatePost();
}

?>