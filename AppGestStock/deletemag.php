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
  $id_mag= $_GET['delete'];
  $mysqli->query("DELETE FROM magasin WHERE id_mag=$id_mag") or die($mysqli->error());

  $_SESSION['message']= "Magasin supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /mag.php");
}
?>