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
  $id_com= $_GET['delete'];
  $mysqli->query("DELETE FROM commande WHERE id_com=$id_com") or die($mysqli->error());

  $_SESSION['message']= "Commande supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /cmd.php");
}
?>