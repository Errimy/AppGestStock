<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_cat=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_cat= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM catégorie WHERE id_cat=$id_cat") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

  $nom_cat = $row['nom_cat'];
  $description = $row['description'];

}
}
if (isset ($_POST['submit'])){
    $id_cat= $_POST['id_cat'];
    $nom_cat = $_POST['nom_cat'];
    $description = $_POST['description'];

    $mysqli->query("UPDATE catégorie SET nom_cat='$nom_cat', description='$description' WHERE id_cat=$id_cat ") or die($mysqli->error());
    
    $_SESSION['message']= "Catégorie modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /cat.php");
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
		<form method="post" action="/editcat.php">
        <input type='hidden' name='id_cat' value='<?php echo $id_cat;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier une catégorie :</font></b></p>
			<br>
			<input type="text" name="nom_cat" value="<?php echo $nom_cat;?>" required/>
			<br><br>
            <textarea class="form-control"  type="text" name="description" value="<?php echo $description;?>" rows="3" ></textarea>
			<br><br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>