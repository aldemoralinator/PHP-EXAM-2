<?php 

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
        $controller = new LoginController();
        $controller->index();
        break;
      } 

      case '/index.php/currency': {
        $controller = new HomeController();
        $controller->index();
        break;
      }

      case '/index.php/populate': {
        $controller = new PopulateController();
        $controller->index();
        break;
      }

      case '/index.php/logout': {
        $controller = new LoginController();
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
        $controller = new LoginController();
        $controller->authenticate();
        break;
      }

      case '/index.php/currency': {
        $controller = new HomeController();
        $controller->calculate();
        break;
      }

      case '/index.php/populate': {
        $controller = new PopulateController();
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