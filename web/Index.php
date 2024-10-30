<?php 
require_once 'modelo/Usuario.php';

session_start();

if (empty($_SESSION['user'])) {
    header('Location: Login.php');
}

$usuario = Usuario::getByUserName($_SESSION['user']);



include_once 'vista/vista_Index.php';
include_once 'vista/vista_Footer.php';