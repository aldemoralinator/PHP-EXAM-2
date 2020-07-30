<?php 

    include('../route/Route.php');
    include('../database/Database.php');
    include('../controller/LoginController.php');
    include('../controller/HomeController.php');
    include('../controller/PopulateController.php');
    
    session_start();

    $route = new Route();

    $route->delegate();

?>