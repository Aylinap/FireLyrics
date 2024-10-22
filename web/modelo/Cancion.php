<?php
require_once 'DatabaseConnection.php';
class Cancion
{
    private $id;
    private $titulo;
    private $artista;
    private $url;

    //Contructor
    public function __construct($titulo, $artista, $url)
    {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->url = $url;
    }

    // Getters
    public function __getID()
    {
        return $this->id;
    }
    public function __getTitulo()
    {
        return $this->titulo;
    }
    public function __getArtista()
    {
        return $this->artista;
    }
    public function __getUrl()
    {
        return $this->url;
    }

    //Setters
    public function __setID($id)
    {
        $this->id = $id;
    }
    public function __setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function __setArtista($artista)
    {
        $this->artista = $artista;
    }
    public function __setUrl($url)
    {
        $this->url = $url;
    }

    //CRUD
    /* Inserta un nueva Cancion */
    public function create()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO cancion(titulo, artista, youtube_url) VALUES (:titulo, :artista, :url)");

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':artista', $this->artista);
        $stmt->bindParam(':url', $this->url);

        return $stmt->execute();
    }

    /* Obtiene todos las canciones */
    public static function getAllCanciones()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM cancion");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* Eliminar cancion con titulo*/
    public static function deleteCancion($id){
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM cancion WHERE id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
