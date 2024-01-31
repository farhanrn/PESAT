<?php include "../../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])){
  header("location: ./login.php");
  exit;
}
else{
    header("location: ./login.php");
    exit;
}
?>