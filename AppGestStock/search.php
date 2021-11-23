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
$search = $_GET['search'];
$search = $conn -> real_escape_string($search);
$sql = "SELECT * FROM article WHERE libellé_art LIKE'%".$search."%'";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des artilces</title>
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
<h3>Résultat de votre recherche :</h3>
	<div class="row justify-content-center">
    <table class="table table-striped" width ='80%' length='80%'> 
      <thead class='thead-dark'>
        <tr>
          <th style="text-align:center">Libellé</th>
          <th style="text-align:center">Quantité</th>
          <th style="text-align:center">Prix unitaire</th>
          <th style="text-align:center">Fournisseur</th>
          <th style="text-align:center">Magasin</th>
          <th style="text-align:center">Emplacement</th>
          <th style="text-align:center">Option</th>
        </tr>
      </thead>
      <?php if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()): ?> 
          <tr>
            <td align='center'><?php echo  $row["libellé_art"]; ?></td>
            <td align='center'><?php echo  $row["qte_art"]; ?></td>
            <td align='center'><?php echo  $row["prix_art"]; ?></td>
            <td align='center'><?php echo  $row["art_f"]; ?></td>
            <td align='center'><?php echo  $row["art_m"]; ?></td>
            <td align='center'><?php echo  $row["emplacement"]; ?></td>
            <td align='center'>
            <a href='edit.php?edit=<?php echo $row['id_art']?>' class='btn btn-info'>Modifier</a>
            <a href='delete.php?delete=<?php echo $row['id_art'] ?>' class='btn btn-danger'>Supprimer</a>
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