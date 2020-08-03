<?php 

namespace Route;

use Controller;

class Route
{

  private $path;

  public function __construct( ) {

    $this->path = $this->cleanPath();

  }


  public function cleanPath() {

    $finalPath = str_replace("/index.php", "/", $_SERVER['PHP_SELF']);
    
    $finalPath = str_replace("//", "/", $finalPath);

    return $finalPath;

  }

  public function delegate() { 

    // AUTHENTICATION INTERCEPTOR
    if (
      !isset($_SESSION['username']) && !(
        $_SERVER['PHP_SELF'] == "/index.php" ||
        $_SERVER['PHP_SELF'] == "/index.php/populate"
      )
    ) {
      header("Location: http://localhost:8000/");
    }

    switch ($_SERVER['REQUEST_METHOD']) {

      case 'GET':
        $this->handleGetRequest();
        break;

      case 'POST':
        $this->handlePostRequest();
        break;
      
      default:
        header("Location: http://localhost:8000/");
        break;
    }
 
  }

  private function handleGetRequest() {

    switch ($this->path) {

      case '/': {
        $controller = new Controller\LoginController();
        $controller->index();
        break;
      } 

      case '/currency': {
        $controller = new Controller\HomeController();
        $controller->index();
        break;
      }

      case '/populate': {
        $controller = new Controller\PopulateController();
        $controller->index();
        break;
      }

      case '/logout': {
        $controller = new Controller\LoginController();
        $controller->logout();
        break;
      }
      
      default: 
        header("Location: http://localhost:8000/");
        break;  
    }
 
  }

  private function handlePostRequest() {
 
    switch ($this->path) {
      case '/': {
        $controller = new Controller\LoginController();
        $controller->authenticate();
        break;
      }

      case '/currency': {
        $controller = new Controller\HomeController();
        $controller->calculate();
        break;
      }

      case '/populate': {
        $controller = new Controller\PopulateController();
        $controller->populateDatabase();
        break;
      }
        
      default: 
        header("Location: http://localhost:8000/");
        break; 
    }
 
  }

}





?>