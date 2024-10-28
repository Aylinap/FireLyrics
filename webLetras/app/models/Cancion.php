<?php

require_once '../app/services/Database.php';

class Cancion
{
    private $id;
    private $titulo;
    private $id_artista;
    private $anoEstreno;
    private $id_musicbrainz;
    public function __construct($id=0, $titulo = "",  $id_artista = "",  $anoEstreno = "",  $id_musicbrainz = "")
    {
        $this->id=$id;
        $this->titulo = $titulo;
        $this->id_artista = $id_artista;
        $this->anoEstreno = $anoEstreno;
        $this->id_musicbrainz = $id_musicbrainz;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getIdArtista()
    {
        return $this->id_artista;
    }

    public function getAnoEstreno()
    {
        return $this->anoEstreno;
    }

    public function getIdMusicbrainz()
    {
        return $this->id_musicbrainz;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setIdArtista($id_artista): void
    {
        $this->id_artista = $id_artista;
    }

    public function setAnoEstreno($anoEstreno): void
    {
        $this->anoEstreno = $anoEstreno;
    }

    public function setIdMusicbrainz($id_musicbrainz): void
    {
        $this->id_musicbrainz = $id_musicbrainz;
    }

    public function existeCancion()
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM cancion WHERE id_musicbrainz = :IDMB");
        $stmt->execute(['IDMB' => $this->id_musicbrainz]);
        $cancionDB = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($cancionDB)) return true;
        return false;
    }

    public function add()
    {
        $stmt = Database::getConnection()->prepare("INSERT INTO cancion(titulo, id_artista, anoEstreno, id_musicbrainz) VALUES (:titulo, :id_artista, :fecha, :idmb)");
        $stmt->execute([
            'titulo' => $this->titulo,
            'id_artista' => $this->id_artista,
            'fecha' => $this->anoEstreno,
            'idmb' => $this->id_musicbrainz
        ]);
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
