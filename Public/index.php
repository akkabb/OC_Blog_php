<?php

    use Router\Router;

    require '../vendor/autoload.php';
    
    //echo $_GET['url'];

     $router = new Router($_GET['url']);
     $router->show();


     ?>