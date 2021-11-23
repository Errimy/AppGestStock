<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (!$db) {
    die("Erreur de connexion. " . mysqli_connect_error());
   }
?>