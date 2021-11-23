<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_art=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_art= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM article WHERE id_art=$id_art") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $libellé_art = $row['libellé_art'];
  $qte_art = $row['qte_art'];
  $prix_art = $row['prix_art'];
  $art_f = $row['art_f'];
  $art_m = $row['art_m'];
  $emplacement = $row['emplacement'];
}
}
if (isset ($_POST['submit'])){
    $id_art= $_POST['id_art'];
    $libellé_art= $_POST['libellé_art'];
    $qte_art= $_POST['qte_art'];
	$prix_art= $_POST['prix_art'];
	$art_f = $_POST['art_f'];
  	$art_m = $_POST['art_m'];
    $emplacement= $_POST['emplacement'];
    $mysqli->query("UPDATE article SET libellé_art='$libellé_art', qte_art=$qte_art, prix_art=$prix_art, art_f='$art_f', art_m='$art_m', emplacement='$emplacement' WHERE id_art=$id_art ") or die($mysqli->error());
    
    $_SESSION['message']= "Article modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /test.php");
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
		<form method="post" action="/edit.php">
        <input type='hidden' name='id_art' value='<?php echo $id_art;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier un article :</font></b></p>
			<br>
			<input type="text" name="libellé_art" value="<?php echo $libellé_art;?>" required/>
			<br><br>
			<input type="number" name="qte_art" value="<?php echo $qte_art;?>" required/>
			<br> <br>
			<input type="number" step="any" name="prix_art" value="<?php echo $prix_art;?>" required/>
			<br> <br>
			<input type="text" name="art_f" value="<?php echo $art_f;?>" required/>
			<br> <br>
			<input type="text" name="art_m" value="<?php echo $art_m;?>" required/>
			<br> <br>
			<input type="text" name="emplacement" value="<?php echo $emplacement;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>