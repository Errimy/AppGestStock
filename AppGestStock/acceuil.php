<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="topnav.css">
    <title>Acceuil</title>
</head>
<body>
<div class="topnav">
  <a class='btn btn-danger' href='/logout.php'><font color='white'>Se déconnecter</font></a>
  <form action="search.php" method="GET">
  <input type="text" name="search" placeholder="rechercher un article..">
  </form>
</div>
<br><br>
    <div class="container">
    <div align='center'>
    <h1 align="center">Gestion de stock</font></h1>
    <br>
    <br>
    <h2 align="center">Options :</font></h1>
    <br>
    <table style='text-align:center'>
    <tr>
    <td><a style="display:block;width:200px"class="btn btn-primary" href="test.php">Liste des articles</a><br><br></td>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="fourn2.php">Liste des fournisseurs</a><br><br></td>
</tr>
<tr>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="be.php">Les bons d'entrées</a><br><br></td>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="bs.php">Les bons de sorties</a><br><br></td>
    </tr>

    <tr>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="cmd.php">Liste des commandes</a><br><br></td>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="lc.php">Ligne commande</a><br><br></td>
    </tr>

    <tr>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="cat.php">Les catégories</a><br><br></td>
    <td><a style="display:block;width:200px" class="btn btn-primary" href="mag.php">Liste des magasin</a><br><br></td>
    </tr>

</table>
    </div>
</div>
</body>
</html>