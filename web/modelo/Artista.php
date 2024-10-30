<?php
include_once 'DatabaseConnection.php';

class Artista
{
    private $nombre;
    private $id;
    private $url_img;
    //private $id_api?

    public function __construct()
    {
      
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUrlImg()
    {
        return $this->url_img;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setUrlImg($url_img): void
    {
        $this->url_img = $url_img;
    }

    // crud
    function getAllArtist()
    {
        $conn = Database::getConnection();
        $sqlquery = 'Select * from artista ORDER BY RAND()';
        $stmt = $conn->prepare($sqlquery);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUltimasLetrasSubidas($limite = 10) {
        $conn = Database::getConnection();
        $sqlquery =  'SELECT clu.*, ac.Id_artista, c.Titulo AS cancion_nombre, a.nombre AS artista_nombre, c.link_youtube, ac.Album
        FROM `cancion-letra-usuario` clu
        JOIN artistacancion ac ON clu.id_cancion = ac.Id_cancion
        JOIN cancion c ON ac.Id_cancion = c.Id_cancion
        JOIN artista a ON ac.Id_artista = a.id_artista
        WHERE clu.visibilidad = 1  
        ORDER BY clu.id DESC 
        LIMIT :limite';
        
        $stmt = $conn->prepare($sqlquery);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
