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
  $id_ent= $_GET['delete'];
  $mysqli->query("DELETE FROM entrée WHERE id_ent=$id_ent") or die($mysqli->error());

  $_SESSION['message']= "Bon d'entrée supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /be.php");
}
?>