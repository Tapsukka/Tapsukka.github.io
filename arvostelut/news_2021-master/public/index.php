<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/moviemanagement.php';

require_once 'controllers/reviewManagement.php';

switch($route) {
    case "/":
      viewreviewController();
     
    break;

    case "/register":
        registerController();
    break;

    case "/login":
        loginController();
    break;

    case "/logout":
        logoutController();
    break;

    case "/movie":
      if(isLoggedIn()){
        addmovieController();
        
      } else {
        loginController();
      }
    break;

    case "/review":
      if(isLoggedIn()){
        addreviewController();
      } else {
        loginController();
      }
    break;
    
    case "/updatereview":
      if(isLoggedIn()){
        updatereviewController();
      } else {
        loginController();
      }
      break;

    case "/deletereview":
      if(isLoggedIn()){
        deletereviewController();
      } else {
        loginController();
      }
    break;

    case "/delete":
      if(isLoggedIn()){
        deletemovieController();
      } else {
        loginController();
      }
    break;

    case "/updatemovie":
      if(isLoggedIn()){
          updatemovieController();
        }
       else {
        loginController();
      }
    break;

    default:
      echo "404";
  }
