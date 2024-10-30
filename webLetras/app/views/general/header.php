<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" type="image/jpg" href="img/fondonegro1.png"> <!-- icono de la pagina -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9845d1980a.js" crossorigin="anonymous"></script>

    <title>FireLyrics</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark navbar-expand-lg ">
            <div class="container row g-0 p-2">
                <a class="navbar-brand col-lg-2" href="#">
                    <img src="/img/fondonegro1.png" alt="Firelyrics" class="w-100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-lg-10" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-lg-6 col-none">
                        <li class="nav-item dropdown pe-5">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown">
                                    <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                                        <li><a class="dropdown-item" href="Administrador.php">Administrador</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    <?php } ?>
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="Logout.php">Cerrar Sesión</a></li>
                                </ul>
                            <?php } ?>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="#">Buscar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="#">Quienes somos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>