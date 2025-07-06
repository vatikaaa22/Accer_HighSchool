<?php
session_start();
if(isset($_SESSION['login'])){
  header('Location: src/Admin/index.php');
}else{
  header('Location: src/LandingPage/index.php');
}