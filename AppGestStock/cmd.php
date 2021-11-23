<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT * FROM commande";
$result = $db->query($sql);
$db->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des commandes</title>
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
<a href='ajoutercmd.php' class='btn btn-success'>Ajouter une commande</a></div><br><br>
	<div class="row justify-content-center">
    <table class="table table-striped"> 
      <thead class='thead-dark'>
        <tr>
          <th style="text-align:center">numéro</th>
          <th style="text-align:center">fournisseur</th>
          <th style="text-align:center">Date de commande</th>
          <th style="text-align:center">état</th>
          <th style="text-align:center">Option</th>
        </tr>
      </thead>
      <?php if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()): ?> 
          <tr>
            <td align='center'><?php echo  $row["id_com"]; ?></td>
            <td align='center'><?php echo  $row["fourn_com"]; ?></td>
            <td align='center'><?php echo  $row["date_com"]; ?></td>
            <td align='center'><?php echo  $row["etat"]; ?></td>
            <td align='center'>
            <a href='editcmd.php?edit=<?php echo $row['id_com']?>' class='btn btn-info'>Modifier</a>
            <a href='deletecmd.php?delete=<?php echo $row['id_com'] ?>' class='btn btn-danger'>Supprimer</a>
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