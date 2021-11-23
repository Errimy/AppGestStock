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
  $id_fourn= $_GET['delete'];
  $mysqli->query("DELETE FROM fournisseur WHERE id_fourn=$id_fourn") or die($mysqli->error());

  $_SESSION['message']= "Fournisseur supprimé";
  $_SESSION['msg_type']= "danger";

  header("location: /fourn2.php");
}
?>