
<?php
include_once 'modelo/Artista.php';

header('Content-Type: application/json');

$artista = new Artista();
$artistas = $artista->getAllArtist();
echo json_encode($artistas);
?>