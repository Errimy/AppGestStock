<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_sor=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_sor= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM sortie WHERE id_sor=$id_sor") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $art_sor = $row['art_sor'];
  $qte_sor = $row['qte_sor'];
  $date_sor = $row['date_sor'];
  $prix_sor = $row['prix_sor'];
}
}
if (isset ($_POST['submit'])){
    $id_sor= $_POST['id_sor'];
    $art_sor= $_POST['art_sor'];
    $qte_sor= $_POST['qte_sor'];
    $prix_sor= $_POST['prix_sor'];
    $date_sor = date('Y-m-d', time());


    $mysqli->query("UPDATE sortie SET art_sor='$art_sor', qte_sor=$qte_sor, prix_sor=$prix_sor WHERE id_sor=$id_sor ") or die($mysqli->error());
    
    $_SESSION['message']= "Bon de sortie modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /bs.php");
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
		<form method="post" action="/editbs.php">
        <input type='hidden' name='id_sor' value='<?php echo $id_sor;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier un article :</font></b></p>
			<br>
			<input type="text" name="art_sor" value="<?php echo $art_sor;?>" required/>
			<br><br>
			<input type="number" name="qte_sor" value="<?php echo $qte_sor;?>" required/>
			<br> <br>
			<input type="number" step="any" name="prix_sor" value="<?php echo $prix_sor;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>