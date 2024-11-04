<?php
require_once '../app/services/Logger.php';
require_once '../app/controllers/Controller.php';
require_once '../app/models/Cancion.php';
require_once '../app/models/Artista.php';

class ArtistaController extends Controller{
    private $artistaModel;
    private $cancionModel;


    public function __construct (){
        $this->artistaModel = new Artista();
        $this->cancionModel = new Cancion();
    }

    public function artista(){
        include '../app/views/artista/vista_artista.php';
    }

    // cancion de la lista
    public function add()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $titulo = $data['titulo'];
        $idmbCancion = $data['idmbCancion'];
        $artista = $data['artista'];
        $idmbArtista = $data['idmbArtista'];
        $fecha = $data['fecha'];

        $this->artistaModel->setNombre($artista);
        $this->artistaModel->setIDMB($idmbArtista);

        $this->artistaModel->addArtista();

        $this->cancionModel->setTitulo($titulo);
        $this->cancionModel->setIdArtista($this->artistaModel->getId());
        $this->cancionModel->setAnoEstreno($fecha);
        $this->cancionModel->setIDMB($idmbCancion);

        $this->cancionModel->addCancion();
        
        echo json_encode([
            'id' => $this->artistaModel->getId(),
            'artista' => $this->artistaModel->getNombre(),
            'idmbArtista' => $this->artistaModel->getIDMB(),
        ]);
    }

}