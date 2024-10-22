<?php 

require_once './modelo/Cancion.php';

$cancion = new Cancion($_POST['titulo'],$_POST['artista'],$_POST['url']);
$cancion->create();

header('Location: ./Administrador.php');