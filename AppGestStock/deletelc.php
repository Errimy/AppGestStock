<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$mysqli=$conn;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset ($_GET['delete'])){
  $id_lc= $_GET['delete'];
  $mysqli->query("DELETE FROM lc WHERE id_lc=$id_lc") or die($mysqli->error());

  $_SESSION['message']= "Ligne commande supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /lc.php");
}
?>