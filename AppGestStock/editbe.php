<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_ent=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_ent= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM entrée WHERE id_ent=$id_ent") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $art_ent = $row['art_ent'];
  $qte_ent = $row['qte_ent'];
  $date_ent = $row['date_ent'];
  $prix_ent = $row['prix_ent'];
}
}
if (isset ($_POST['submit'])){
    $id_ent= $_POST['id_ent'];
    $art_ent= $_POST['art_ent'];
    $qte_ent= $_POST['qte_ent'];
    $prix_ent= $_POST['prix_ent'];
    $date_ent = date('Y-m-d', time());


    $mysqli->query("UPDATE entrée SET art_ent='$art_ent', qte_ent=$qte_ent, prix_ent=$prix_ent WHERE id_ent=$id_ent ") or die($mysqli->error());
    
    $_SESSION['message']= "Bon d'entrée modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /be.php");
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
		<form method="post" action="/editbe.php">
        <input type='hidden' name='id_ent' value='<?php echo $id_ent;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier un bon d'entrée :</font></b></p>
			<br>
			<input type="text" name="art_ent" value="<?php echo $art_ent;?>" required/>
			<br><br>
			<input type="number" name="qte_ent" value="<?php echo $qte_ent;?>" required/>
			<br> <br>
			<input type="number" step="any" name="prix_ent" value="<?php echo $prix_ent;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>