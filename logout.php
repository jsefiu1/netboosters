<?php 

include 'inc/functions.php';
  session_destroy();
  header("Location: index.php");
  exit();

?>