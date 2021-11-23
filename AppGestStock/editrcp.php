<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_rcp=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_rcp= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM rcp WHERE id_rcp=$id_rcp") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $art_rcp = $row['art_rcp'];
  $qte_rcp = $row['qte_rcp'];
  $n_com = $row['n_com'];

}
}
if (isset ($_POST['submit'])){
    $id_rcp= $_POST['id_rcp'];
    $art_rcp= $_POST['art_rcp'];
    $qte_rcp= $_POST['qte_rcp'];
	$n_com= $_POST['n_com'];

    $mysqli->query("UPDATE rcp SET art_rcp='$art_rcp', qte_rcp=$qte_rcp, n_com=$n_com WHERE id_rcp=$id_rcp ") or die($mysqli->error());
    
    $_SESSION['message']= "réception modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /rcp.php");
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
		<form method="post" action="/editrcp.php">
        <input type='hidden' name='id_rcp' value='<?php echo $id_rcp;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier une réception :</font></b></p>
			<br>
			<input type="text" name="art_rcp" value="<?php echo $art_rcp;?>" required/>
			<br><br>
			<input type="number" name="qte_rcp" value="<?php echo $qte_rcp;?>" required/>
			<br> <br>
			<input type="number" step="any" name="n_com" value="<?php echo $n_com;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>