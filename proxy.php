<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$artistId = "b2d122f9-eadb-4930-a196-8f221eeb0c66"; // ID de Rammstein
$url = "https://musicbrainz.org/ws/2/artist/$artistId?inc=releases&fmt=json";

$response = file_get_contents($url);
if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "Error al obtener datos de MusicBrainz."]);
} else {
    echo $response;
}
?>

