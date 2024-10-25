<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>

<body>
    <h1>Canciones:</h1>

    <div class="container">
        <div class="row">
            <div class="col-9">
                <span class="fs-3">Añadir canción</span>
            </div>
            <div class="col-3 d-flex p-2">
                <input class="form-control m-1" type="search" placeholder="" id="textoBuscar" />
                <button class="btn btn-outline-primary m-1" type="submit" id="botonBuscar">Buscar</button>
            </div>
        </div>

        <div class="row">
            <div class="row row-cols-1 row-cols-md-1 g-2" id="listaCanciones">
                <div class="col d-none" id="card">
                    <div class="card w-100">
                        <div class="row g-0">
                            <div class="col-2">
                                <img src="../img/Laboa.jpg" class="card-fluid w-100">
                            </div>
                            <div class="col-10">
                                <div class="card-header">
                                    <div class="row align-middle">
                                        <div class="col-10">
                                            <span class="card-title fs-1" id="tituloCancion">Card title</span>
                                            <span class="card-text" id="fechaCancion">Año de Lanzamiento</span>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <a href="#" class="btn btn-primary">Añadir Cancion</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text fs-4" id="artistaCancion">Artista</p>
                                    <p class="card-text" id="idCancion">ID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="../assets/js/BuscarPorNombreAPI.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>