<?php
// index.php    

// This is necessary when index.php is not in the root folder, but in some subfolder...
// We compare $requestURL and $scriptName to remove the inappropriate values
$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

for ($i= 0; $i < sizeof($scriptName); $i++) {
  if ($requestURI[$i] == $scriptName[$i]) {
    unset($requestURI[$i]);
  }
}

$command = array_values($requestURI);

include_once("template-head.php");

switch($command[0]) {
  case 'login' :
    include_once("login-form.php");
    break;
  case 'logout' :
    include_once("logout.php");
    break;

  case 'profile' :
    require_once("profile.php"); // We need this file
    profile($command[1]);
    break;

  case 'myprofile' :
    require_once("profile.php"); // We need this file
    myProfile();
    break;

  default:
    include_once("home.php");
    break;
}

include_once("template-foot.php");


?>