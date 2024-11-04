<?php
include '../app/views/general/header.php';
?>

<main class="container-fluid p-0">
    <div class="p-5 bg-danger">
        <h1 class="ms-2 text-light">ULTIMAS CANCIONES</h1>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $count = 0;
                foreach ($arrayCancion as $element) { ?>
                    <div class="carousel-item <?php if ($count == 0) echo 'active'; ?>">
                        <?php $count++; ?>
                        <div class="card m-3 border-0">
                            <div class="row g-0">
                                <div class="col-xl-1 col-lg-3 col-none bg-black d-flex align-items-center">
                                    <img src="/img/logofondonegro.png" alt="Firelyrics" class="w-100">
                                </div>
                                <div class="col-xl-11 col-lg-9 col-12">
                                    <div class="card-header d-flex justify-content-between">
                                        <div>
                                            <span class="card-title fs-3"><?php echo $element['titulo'] ?></span>
                                            <span class="card-text"> <?php echo $element['anoEstreno'] ?></span>
                                        </div>
                                        <div>
                                            <button class="btn btn-secondary <?php if ($element['letra']) echo 'd-none'; ?>">Añadir Letra</button>
                                            <button class="btn btn-danger <?php if (!$element['letra']) echo 'd-none'; ?>">Ver Letra</button>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-between">
                                        <h5 class="card-title"> <?php echo $element['nombre'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="p-5 bg-light">
        <h1 class="p-3 text-dark">ARTISTAS RECOMENDADOS</h1>
            <div class="row row-cols-1 row-cols-md-4 g-3">
                <?php foreach ($arrayArtista as $element) { ?>
                    <div class="col d-flex justify-content-center">
                        <div class="card bg-danger border-1 d-flex align-items-center p-3" style="width: 18rem;">
                            <img src="/img/logofondonegro.png" alt="Firelyrics" class="rounded w-100">
                            <div class="card-body d-flex flex-column justify-content-center w-100">
                                <p class="card-text fs-2 text-light"><?php echo $element['nombre'] ?></p>
                                <button class="btn btn-outline-light">Ir a Artista ></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="p-5 bg-danger">
        <h1 class="ms-2 text-light">ULTIMAS CANCIONES</h1>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $count = 0;
                foreach ($arrayCancion as $element) { ?>
                    <div class="carousel-item <?php if ($count == 0) echo 'active'; ?>">
                        <?php $count++; ?>
                        <div class="card m-3 border-0">
                            <div class="row g-0">
                                <div class="col-xl-1 col-lg-3 col-none bg-black d-flex align-items-center">
                                    <img src="/img/logofondonegro.png" alt="Firelyrics" class="w-100">
                                </div>
                                <div class="col-xl-11 col-lg-9 col-12">
                                    <div class="card-header d-flex justify-content-between">
                                        <div>
                                            <span class="card-title fs-3"><?php echo $element['titulo'] ?></span>
                                            <span class="card-text"> <?php echo $element['anoEstreno'] ?></span>
                                        </div>
                                        <div>
                                            <button class="btn btn-secondary <?php if ($element['letra']) echo 'd-none'; ?>">Añadir Letra</button>
                                            <button class="btn btn-danger <?php if (!$element['letra']) echo 'd-none'; ?>">Ver Letra</button>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-between">
                                        <h5 class="card-title"> <?php echo $element['nombre'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php require_once '../app/views/general/footer.php'; ?>