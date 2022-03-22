<?php
  session_start();
  require_once("function.php");
  $token = $_POST['token'];
  if ($token != $_SESSION['token']) {
    $_SESSION["error_status"] = 2;
    redirect_to_welcome();
    exit();
  }

  $_SESSION = array();
  session_destroy();

  redirect_to_login();
?>
