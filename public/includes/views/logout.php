<?php
  session_start();
  require_once '../modules/functions.php';
if (userLoggedIn()) {
  session_destroy();
  unset($_SESSION['user']);
  $_SESSION['logoutSuccess'] = 'You have been successfully logged out';
  redirect('/login');
} else {
  redirect('/login');
}