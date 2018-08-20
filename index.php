<?php
  session_start();
  require_once 'config/Database.php';
  require_once 'public/includes/modules/functions.php';
  // db
  $db = new Database;
  $conn = $db->connect();
  $page = ''; 

  $URL = getDomain();
  $uri = ($_SERVER['REQUEST_URI']);
  $params = explode('/', $uri);
  $requiresPrefix = count($params);
  
  require_once 'public/includes/views/head.php';
  require_once 'public/includes/views/nav.php';

  if (isset($_GET['page'])) {
    $page = get('page');
    
    switch ($page) {

      case 'home':
        require_once 'public/includes/views/home.php';
        break;

      case 'login':
        require_once 'public/includes/views/login.php';
        break;

      case 'register':
        require_once 'public/includes/views/register.php';
        break;
        
      case 'activation':
        require_once 'public/includes/views/activation.php';
        break;  

      case 'profile':
        require_once 'public/includes/views/profile.php';
        break;  

      default:
        require_once 'public/includes/views/home.php';
        break;
    }
  } else {
      require_once 'public/includes/views/home.php';
  }
  require_once 'public/includes/views/footer.php';