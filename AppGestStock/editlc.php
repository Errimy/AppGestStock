<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_lc=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_lc= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM lc WHERE id_lc=$id_lc") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $art_lc = $row['art_lc'];
  $qte_lc = $row['qte_lc'];
  $prix_lc = $row['prix_lc'];
  $montant = $row['montant'];

}
}
if (isset ($_POST['submit'])){
    $id_lc= $_POST['id_lc'];
    $art_lc= $_POST['art_lc'];
    $qte_lc= $_POST['qte_lc'];
	$prix_lc= $_POST['prix_lc'];
	$montant = $_POST['montant'];

    $mysqli->query("UPDATE lc SET art_lc='$art_lc', qte_lc=$qte_lc, prix_lc=$prix_lc, montant='$montant' WHERE id_lc=$id_lc ") or die($mysqli->error());
    
    $_SESSION['message']= "ligne commande modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /lc.php");
}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>appstock</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="hok">
		<div class='container'>
		<form method="post" action="/editlc.php">
        <input type='hidden' name='id_lc' value='<?php echo $id_lc;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier une ligne commande :</font></b></p>
			<br>
			<input type="text" name="art_lc" value="<?php echo $art_lc;?>" required/>
			<br><br>
			<input type="number" name="qte_lc" value="<?php echo $qte_lc;?>" required/>
			<br> <br>
			<input type="number" step="any" name="prix_lc" value="<?php echo $prix_lc;?>" required/>
			<br> <br>
			<input type="number" step="any" name="montant" value="<?php echo $montant;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>