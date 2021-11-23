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
  $id_sor= $_GET['delete'];
  $mysqli->query("DELETE FROM sortie WHERE id_sor=$id_sor") or die($mysqli->error());

  $_SESSION['message']= "Bon de sortie supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /bs.php");
}
?>