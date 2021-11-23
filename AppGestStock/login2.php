<?php
include "config.php";

if(isset($_POST['submit'])){


    $email_uti = $db->real_escape_string($_POST['email_uti']);
    $mdp = $db->real_escape_string($_POST['mdp']);
    if ($email_uti != "" && $mdp != ""){

        $sql_query = "SELECT count(*) as cntUser from utilisateur where email_uti='".$email_uti."' and mdp='".$mdp."'";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email_uti'] = $email_uti;
            header('Location: acceuil.php');
        }
        else{
          $_SESSION['message']= "Email ou mot de passe incorrect.";
          $_SESSION['msg_type']= "danger";
          
          //header("location: /login2.php");
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Acceuil</title>
    <style>
      .align{
          
          display: table;
          position: absolute;
          height: 100%;
          width: 100%;
          top:0;
          left: 0

      }
      .valign{
        
        display: table-cell;
        vertical-align : middle;

      }
      .container{
        
        width:800px;
        margin-left: 250px;
        margin-right: 250px
      }
      .border{
        text-align: center;

      }
      #a{
             display: block;
             margin : 0 auto;
        }
      #b{
             display: block;
             margin : 0 auto;
        }
    </style>
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
<div class='align'>
  <div class='valign'>
  <div class="container" style="text-align:center">
    <h1 align='center'>Gestion de stock</h1>
  <div class="border rounded bg-light" >
    <br>
    <form method='post' style="text-align:center" action='login2.php'>
        <div class="form-group col-md-9 " id='a' style="text-align:center">
          <label>Addresse email :</label>
          <input type="email" class="form-control" placeholder="email@example.com" id="email_uti" name="email_uti" required><br><br>
        </div>
        <div class="form-group col-md-9" id='b' style="text-align:center">
          <label>Mot de passe :</label>
          <input type="password" class="form-control " placeholder="Password" id="mdp" name="mdp" required><br><br>
        </div>
        <input type="submit" class="btn btn-primary" name='submit' value='Se connecter'><br><br>
        Vous n'avez pas de compte?&nbsp;
        <a href='signup.php' class="btn btn-primary" name='signup' >Enregistez-vous</a><br><br>
  </form>
  </div>
  </div>
  </div>
    </div>
</body>
</html>