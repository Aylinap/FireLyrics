<?php
require_once 'modelo/Usuario.php';

session_start();

if (!empty($_SESSION['sesionIniciada'])) {
    redirigir();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $usuario = Usuario::getByUserName($_POST['user']);
            if (empty($usuario)) throw new Exception('Usuario no encontrado.');
            else if ($usuario['password'] != $_POST['pass']) throw new Exception('Contraseña incorrecta.');
            else {
                $_SESSION['user'] = $usuario['username'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['sesionIniciada'] = true;
            }

            redirigir();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

function redirigir()
{
    header('Location: Index.php');
    exit();
}

include_once 'vista/vista_Login.php';
