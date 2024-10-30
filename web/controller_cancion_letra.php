<?php
include_once 'modelo/Artista.php';

header('Content-Type: application/json');

$artista = new Artista();
$ultimasLetras = $artista->getUltimasLetrasSubidas(10);
echo json_encode($ultimasLetras);
?>
