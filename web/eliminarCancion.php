<?php 
require_once './modelo/Cancion.php';
echo $_POST['id'];

Cancion::deleteCancion($_POST['id']);

header('Location:Administrador.php');