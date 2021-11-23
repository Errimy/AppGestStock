<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sortie";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste de bons de sorties</title>
	<link rel="stylesheet" type="text/css" href="Forma.css">
</head>
<body>
	
	<div class="hok">
  <button><a href ="http://localhost/ajoutersor.php">Ajouter un bon de sortie</a></button><br><br>
    <?php 
       if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id_sor"]. " Quantité : " . $row["qte_sor"]. " Date de sortie : " . $row["date_sor"]. " Prix : " . $row["prix_sor"]. "<br>";
        }
      } else {
        echo "0 results";
      }
    ?>
    
</body>
</html>