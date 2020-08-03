<?php 

    include('../route/Route.php');
    include('../database/Database.php');
    include('../controller/LoginController.php');
    include('../controller/HomeController.php');
    include('../controller/PopulateController.php');
    
    use Route;   
    
    session_start();

    $route = new Route\Route();

    $route->delegate();

?>