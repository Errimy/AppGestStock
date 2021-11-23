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

$sql = "SELECT * FROM article";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des artilces</title>
	<link rel="stylesheet" type="text/css" href="Forma.css">
</head>
<body>
	
	<div class="hok">
  <button><a href ="http://localhost/ajouterarticle.php">Ajouter un article</a></button><br><br>
    <?php if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id_art"]. " Libellé: " . $row["libellé_art"]. " quantité " . $row["qte_art"]. " prix unitaire " . $row["prix_art"]. " emplacement " . $row["emplacement"]. "<br>";
  }
} else {
  echo "0 results";
}
    ?>
    
</body>
</html>