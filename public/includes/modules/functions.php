<?php

/**
 * 
 * Autoloading  model classes
 * 
 * @param  string $class
 * @return arr:object||string
 */

spl_autoload_register(function ($class) {
  require_once "public/includes/models/$class.php";
});

/* HELPER FUNCTIONS */

/**
 * Get domain
 * 
 * @function getDomain
 * @return string represents an domain URL
 */

function getDomain () {
  return 'http://localhost/expressYaSelf';
}


function cleanField ($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/**
 * 
 * Get post key
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */

function post ($key, $default = false) {
  return isset($_POST[$key]) ? $_POST[$key] : $default;
}

/**
 * 
 * Get post key
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */

function get ($key, $default = false) {
  return isset($_GET[$key]) ? $_GET[$key] : $default; // staviti da drugi parametar bude podrazumevano false a ako se prosledi neka bude to
}

/**
 * 
 * Checks if user is logged in
 * 
 * @param none
 * @return boolean
 */

function userLoggedIn () {
  return (isset($_SESSION['user'])) ? true : false; 
}

/**
 * 
 * Checks if admin is logged in
 * 
 * @param none
 * @return boolean
 */

function adminLoggedIn () {
  return ((userLoggedIn()) && ($_SESSION['user']->role === 'Admin')) ? true : false;
}

/**
 * 
 * Redirection to specific page/path
 * 
 * @param string $path represents relative path from base url
 * @return void
 */

function redirect ($path) {
  header('Location:' . getDomain() . $path);
}

/**
 * Cleaner die dumping
 * 
 * 
 * @param any $key represents
 * @return void
 */

function dd ($var) {
  echo '<pre>';
    print_r($var);
  echo '</pre>';
}

/* REGULAR EXPRESSIONS */

/**
 * @function post
 * @param any $key represents
 * @return $key false
 */

function checkFirstName ($firstName) {
  $regExp = '/^[A-Z][a-z]{2,20}$/';
  return preg_match($regExp, $firstName);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkLastName ($lastName) {
  $regExp = '/^[A-Z][a-z]{2,20}$/';
  return preg_match($regExp, $lastName);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkPassword ($password) {
  $regExp = '/^[0-9a-zA-Z]{8,}$/';
  return preg_match($regExp, $password);
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function checkUsername ($username) {
  $regExp = '/^[0-9a-zA-Z]{4,}$/';
  return preg_match($regExp, $username);
}

/**
 * Check if email is valid
 * 
 * @function isEmail
 * @return boolean
 */

function isEmail ($email) {
  return  filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}


/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function hasErrors () {
  return (isset($_SESSION['errors'])) ? true : false;
}

/**
 * @function post
 * @param any $key represents
 * @return boolean
 */

function isSuccess () {
  return (isset($_SESSION['success'])) ? true : false;  
}