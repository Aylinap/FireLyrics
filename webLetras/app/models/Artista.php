<?php

require_once '../app/services/Database.php';

class Artista
{
    private $id;
    private $nombre;
    private $id_musicbrainz;
    public function __construct($id = 0, $nombre = '', $id_musicbrainz = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_musicbrainz = $id_musicbrainz;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->nombre;
    }
    public function getIdMusicbrainz()
    {
        return $this->id_musicbrainz;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setIdMusicbrainz($id_musicbrainz): void
    {
        $this->id_musicbrainz = $id_musicbrainz;
    }

    public function getArtistabyIDMB()
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM artista WHERE id_musicbrainz = :IDMB");
        $stmt->execute(['IDMB' => $this->id_musicbrainz]);
        $artistaDB = $stmt->fetch(PDO::FETCH_ASSOC);
        if($artistaDB){
            $this->id = $artistaDB['id'];
            $this->nombre = $artistaDB['nombre'];
            $this->id_musicbrainz = $artistaDB['id_musicbrainz'];
            return true;
        } 
        return false;
    }

    public function existeArtista()
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM artista WHERE id_musicbrainz = :IDMB");
        $stmt->execute(['IDMB' => $this->id_musicbrainz]);
        $artistaDB = $stmt->fetch(PDO::FETCH_ASSOC);

        return $artistaDB !== false;
    }

    public function add()
    {
        $stmt = Database::getConnection()->prepare("INSERT INTO artista(nombre, id_musicbrainz) VALUES (:nombre, :IDMB)");
        $stmt->execute([
            'nombre' => $this->nombre,
            'IDMB' => $this->id_musicbrainz
        ]);
    }
}
