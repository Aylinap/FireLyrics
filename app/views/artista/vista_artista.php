<?php
include '../app/views/general/header.php';
?>

<div class="container" style="max-width: 80%; margin: auto;">
    <div class="row my-4 p-4 border rounded" style="width: 100%;">
        <div class="col-md-4">
            <img id="artist-photo" src="webLetras/public/img/logofondonegro.png" alt="Foto del Artista" class="img-fluid rounded">
        </div>
        <div class="col-md-8">
            <h1 id="artist-name">Nombre del Artista</h1>
            <ul id="artist-info" class="list-unstyled"></ul>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <h2>Lista de Canciones</h2>
            <ul id="song-list" class="list-group"></ul>
        </div>
    </div>
</div>
<script src="public/assets/js/artistascript.js"></script>
<?php require_once '../app/views/general/footer.php'; ?>