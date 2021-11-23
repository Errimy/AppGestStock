<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_mag=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_mag= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM magasin WHERE id_mag=$id_mag") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $nom_mag = $row['nom_mag'];

}
}
if (isset ($_POST['submit'])){
    $id_mag= $_POST['id_mag'];
    $nom_mag = $_POST['nom_mag'];

    $mysqli->query("UPDATE magasin SET nom_mag='$nom_mag' WHERE id_mag=$id_mag ") or die($mysqli->error());
    
    $_SESSION['message']= "Magasin modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /mag.php");
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
		<form method="post" action="/editmag.php">
        <input type='hidden' name='id_mag' value='<?php echo $id_mag;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier une commande :</font></b></p>
			<br>
			<input type="text" name="nom_mag" value="<?php echo $nom_mag;?>" required/>
			<br><br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>