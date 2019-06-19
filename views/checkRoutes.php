<?php 
session_start();
$isLogged = false;
  if(isset($_SESSION['email']))
  {
   $isLogged = true; 
  }
  
require_once '../controllers/AccountController.php';
if(isset($_SESSION['id_user']))
{
  $userInfo = AccountController::getUserInfo($_SESSION['id_user']);  
}
?>