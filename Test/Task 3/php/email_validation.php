<?php
require_once("init.php");

// Server side email validation



$user = "";
$checkbox = "";
$error = "";

if (isset($_POST['checkbox'], $_POST['email']))
{
  $user = new Email;
  $user->email = $_POST['email'];
  $checkbox = $_POST['checkbox'];
}



  if(isset($_POST["sub"])){
    if (!$user->email){
      $error .= "• Email address is required.<br>";
    }

    if (!$checkbox){
      $error .= "• You must accept the terms and conditions.<br>";
    }

  if (!preg_match("/^[a-z0-9._-]+@([a-z0-9-]+\.)+[a-z]{2,6}$/i",$user->email)) {
    $error .= "• Please provide a valid e-mail address.<br>";
  }

  if (preg_match("/.co$/",$user->email)) {
    $error .= "• We are not accepting subscriptions from Colombia emails.<br>";
  }

  if ($error != ""){
      $error = '<div class="alert"><p><strong>There is an error(s) in your form:</strong></p>' .$error. '</div>';
  }else{
    $user->create();
    header("Location: success.html");
    }
  }

  ?>
