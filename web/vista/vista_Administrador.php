<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Usuarios</title>
</head>

<body class="bg-primary-subtle">
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADMINISTRADOR</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Index.php">Volver</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4 border rounded-2 bg-body">
        <nav class="navbar navbar-expand border-bottom">
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Usuarios</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Letras</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Canciones</button>
                </li>
            </ul>
        </nav>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <th class="col-5">Nombre de usuario</th>
                            <th class="col-5">Correo</th>
                            <th class="col-1">Rol</th>
                            <th class="col-1"></th>
                        </tr>
                        <?php foreach ($usuarios as $element) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $element['username']; ?></td>
                                <td class="align-middle"><?php echo $element['correo']; ?></td>
                                <td class="align-middle"><?php echo $element['rol']; ?></td>
                                <td class="align-middle"><button class="btn btn-danger <?php if ($element['rol'] == 0) echo 'disabled'; ?> w-100">Eliminar</button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"></div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="container-fluid">
                    <table class="table ms-auto">
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-4">Titulo</th>
                            <th class="col-4">Artista</th>
                            <th class="col-1">Letra</th>
                            <th class="col-1">Youtube</th>
                            <th class="col-1"></th>
                        </tr>
                        <?php foreach ($canciones as $element) { ?>
                            <form action="eliminarCancion.php" method="POST">
                                <tr>
                                    <td class="align-middle"><input class="form-control" type="text" value="<?php echo $element['id']; ?>" readonly name="id"></td>
                                    <td class="align-middle"><input class="form-control" type="text" value="<?php echo $element['titulo']; ?>" readonly name="titulo"></td>
                                    <td class="align-middle"><input class="form-control" type="text" value="<?php echo $element['artista']; ?>" readonly name="artista"></td>
                                    <td></td>
                                    <td class="align-middle"><a class="btn btn-primary w-100" href="<?php echo $element['youtube_url'] ?>">Ir</a></td>
                                    <td class="align-middle">
                                        <input type="submit" class="btn btn-danger w-100" value="Eliminar">
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </table>
                </div>



                <form class="border rounded-2 p-4 m-2" action="anadirCancion.php" method="POST">
                    <h2>Añadir Canción</h2>
                    <div class="d-flex align-items-center justify-content-between ">
                        <div class="me-3">
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo de la canción">
                        </div>
                        <div class="me-3">
                            <input type="text" class="form-control" name="artista" placeholder="Artista">
                        </div>
                        <div class="me-3 flex-grow-1">
                            <input type="text" class="form-control" name="url" placeholder="Url">
                        </div>
                        <div class="w-25 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success m-2">Añadir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>