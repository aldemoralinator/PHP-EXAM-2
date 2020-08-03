<?php 

namespace Route;

use Controller;

class Route
{

  public function __construct( ) {
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

    switch ($_SERVER['PHP_SELF']) {

      case '/index.php': {
        $controller = new Controller\LoginController();
        $controller->index();
        break;
      } 

      case '/index.php/currency': {
        $controller = new Controller\HomeController();
        $controller->index();
        break;
      }

      case '/index.php/populate': {
        $controller = new Controller\PopulateController();
        $controller->index();
        break;
      }

      case '/index.php/logout': {
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
 
    switch ($_SERVER['PHP_SELF']) {
      case '/index.php': {
        $controller = new Controller\LoginController();
        $controller->authenticate();
        break;
      }

      case '/index.php/currency': {
        $controller = new Controller\HomeController();
        $controller->calculate();
        break;
      }

      case '/index.php/populate': {
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