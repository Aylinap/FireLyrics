<?php
require_once 'modelo/Usuario.php';

$errors = [
    'user' => '',
    'email' => '',
    'pass' => '',
    'confirm_pass' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $confirm_pass = $_POST['confirm_pass'] ?? '';

    if (empty($user)) {
        $errors['user'] = "El nombre es obligatorio";
    }
    if (empty($email)) {
        $errors['email'] = "El correo electrónico es obligatorio";
    }
    if (empty($pass)) {
        $errors['pass'] = "La contraseña es obligatoria";
    }
    if ($pass !== $confirm_pass) {
        $errors['confirm_pass'] = "Las contraseñas no coinciden";
    }

   
    if (empty($errors['user']) && empty($errors['email']) && empty($errors['pass']) && empty($errors['confirm_pass'])) {
        // Llama a la funcion para insertar el usuario en bbdd
        // ejemplo: insertarUsuario($user, $email, $pass);
        echo "<p style='color:green;'>Registro exitoso</p>";
    }
}

include_once 'vista/vista_Registrar_Usuario.php';
?>
