<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ver Usuario</title>
</head>

<body>
    <?php if ($_SESSION['rol'] == 0) { ?>
        <h1>Admin</h1>
    <?php } else {?>
        <h1>User</h1>
    <?php } ?>

    <p><b>Nombre de Usuario: </b><?php echo $usuario['username'] ?></p>
    <p><b>Correo: </b><?php echo $usuario['correo'] ?></p>
    <p><b>Foto de Perfil: </b><?php echo $usuario['fotoPerfil_url'] ?></p>
    <p><b>Rol: </b><?php echo $usuario['rol'] ?></p>

    <a href="Logout.php">LOGOUT</a>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>