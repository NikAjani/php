<?php

require_once '../App/Model/Model.php';
require_once '../App/Controller/Controller.php';
require_once '../App/View/View.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($model, $controller);

echo '<a href="?action=clicked">Click Here</a><br><Br>';

if(isset($_GET['action']) && !empty($_GET['action']))
    $controller -> {$_GET['action']}();

echo $view -> printData();


?>