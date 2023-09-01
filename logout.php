<?php 
session_start();
//destory session
session_unset();
session_destroy();
if (!isset($_SESSION['id'])) {
  echo "<script>window.location.href = 'login.php';</script>";
  exit;
}