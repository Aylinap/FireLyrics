<?php 
require_once 'modelo/Usuario.php';

session_start();
$usuario = Usuario::getByUserName($_SESSION['user']);

include 'vista/vista_Index.php';