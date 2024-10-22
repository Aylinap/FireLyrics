<?php 

require_once './modelo/Usuario.php';
require_once './modelo/Cancion.php';

session_start();

$usuarios = Usuario::getAllUser();
$canciones = Cancion::getAllCanciones();

include_once './vista/vista_Administrador.php';