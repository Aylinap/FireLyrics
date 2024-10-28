<?php

require_once '../app/services/Logger.php';
require_once '../app/controllers/Controller.php';
require_once '../app/models/Cancion.php';
require_once '../app/models/Artista.php';

class CancionController extends Controller
{
    private $cancionModel;
    public function __construct()
    {
        $this->cancionModel = new Cancion();
    }

    public function index()
    {
        include '../app/views/cancion/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $titulo = $data['titulo'];
            $artista = $data['artista'];
            $id_artista = $data['idmbArtista'];
            $anoEstreno = $data['fecha'];
            $id_musicbrainz = $data['idmbCancion'];

            $artista = new Artista(nombre: $artista, id_musicbrainz: $id_artista);

            if (!$artista->existeArtista()) {
                $artista -> add();
            } 

            $artista -> getArtistabyIDMB();
            
            $cancion = new Cancion(titulo: $titulo, id_artista: $artista->getId(), anoEstreno: $anoEstreno, id_musicbrainz: $id_musicbrainz);

            if (!$cancion->existeCancion()) {
                $cancion -> add();
                echo json_encode(['success' => true, 'message' => 'Cancion anadida']);
            } else echo json_encode(['success' => false, 'message' => 'Ya existe la canción']);
        }
    }
}
