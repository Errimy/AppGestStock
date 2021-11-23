<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_com=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_com= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM commande WHERE id_com=$id_com") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $fourn_com = $row['fourn_com'];
  $etat = $row['etat'];
  $date_com = $row['date_com'];
}
}
if (isset ($_POST['submit'])){
    $id_com= $_POST['id_com'];
    $fourn_com = $_POST['fourn_com'];
    $etat = $_POST['etat'];

    $mysqli->query("UPDATE commande SET fourn_com='$fourn_com', etat='$etat' WHERE id_com=$id_com ") or die($mysqli->error());
    
    $_SESSION['message']= "Commande modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /cmd.php");
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
		<form method="post" action="/editcmd.php">
        <input type='hidden' name='id_com' value='<?php echo $id_com;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier une commande :</font></b></p>
			<br>
			<input type="text" name="fourn_com" value="<?php echo $fourn_com;?>" required/>
			<br><br>
			<input type="text" name="etat" value="<?php echo $etat;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>