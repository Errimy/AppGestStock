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

$sql = "SELECT * FROM fournisseur";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des fournisseurs</title>
	<link rel="stylesheet" type="text/css" href="Forma.css">
</head>
<body>
	
	<div class="hok">
  <button><a href ="http://localhost/ajouterfourn.php">Ajouter un fournisseur</a></button><br><br>
    <?php 
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id_fourn"]. " Nom du fournisseur: " . $row["nom_fourn"]. " Code Postal: " . $row["codep"]. " Ville: " . $row["ville"]. " Pays:  " . $row["pays"]. " Téléphone: " . $row["tél_fourn"]. " Adresse : " . $row["adresse_fourn"]. " Email : " . $row["email_fourn"]. "<br>";
          }
        } else {
          echo "0 results";
        }
    ?>
    
</body>
</html>