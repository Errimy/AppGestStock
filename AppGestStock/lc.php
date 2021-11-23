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
$sql = "SELECT * FROM lc";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des lignes commandes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="topnav.css">
</head>
<body>
  <?php
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>" >
    <?php 
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
    ?></div>
    <?php endif;?>
    <div class="topnav">
  <a class="active" href="acceuil.php">Acceuil</a>
  <a class='btn btn-danger' href='/logout.php'><font color='white'>Se déconnecter</font></a>
  <form action="search.php" method="GET">
  <input type="text" name="search" placeholder="rechercher un article..">
  </form>
</div>
<div class=container>
<div align='center'>
<br><br>
<a href='ajouterlc.php' class='btn btn-success'>Ajouter une ligne commande</a></div><br><br>
	<div class="row justify-content-center">
    <table class="table table-striped" width ='80%' length='80%'> 
      <thead class='thead-dark'>
        <tr>
          <th style="text-align:center">Index</th>
          <th style="text-align:center">Article</th>
          <th style="text-align:center">Quantité</th>
          <th style="text-align:center">Prix unitaire</th>
          <th style="text-align:center">Montant</th>
          <th style="text-align:center">Option</th>
        </tr>
      </thead>
      <?php if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()): ?> 
          <tr>
            <td align='center'><?php echo  $row["id_lc"]; ?></td>
            <td align='center'><?php echo  $row["art_lc"]; ?></td>
            <td align='center'><?php echo  $row["qte_lc"]; ?></td>
            <td align='center'><?php echo  $row["prix_lc"]; ?></td>
            <td align='center'><?php echo  $row["montant"]; ?></td>
            
            <td align='center'>
            <a href='editlc.php?edit=<?php echo $row['id_lc']?>' class='btn btn-info'>Modifier</a>
            <a href='deletelc.php?delete=<?php echo $row['id_lc'] ?>' class='btn btn-danger'>Supprimer</a>
            </td>
          </tr>
      <?php endwhile;
      } else {
        echo "0 résultats";
      }
      ?>
    </table>
  </div>
</body>
</html>