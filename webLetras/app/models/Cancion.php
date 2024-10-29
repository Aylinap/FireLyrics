<?php

require_once '../app/services/Database.php';

class Cancion
{
    private $id;
    private $titulo;
    private $id_artista;
    private $anoEstreno;
    private $IDMB;
    public function __construct($id=0, $titulo = "",  $id_artista = "",  $anoEstreno = "",  $IDMB = "")
    {
        $this->id=$id;
        $this->titulo = $titulo;
        $this->id_artista = $id_artista;
        $this->anoEstreno = $anoEstreno;
        $this->IDMB = $IDMB;
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

    public function getIDMB()
    {
        return $this->IDMB;
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

    public function setIDMB($IDMB): void
    {
        $this->IDMB = $IDMB;
    }

    public function existeCancion()
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM cancion WHERE IDMB = :IDMB");
        $stmt->execute(['IDMB' => $this->IDMB]);
        $cancionDB = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($cancionDB)) return true;
        return false;
    }

    public function addCancion()
    {
        $stmt = Database::getConnection()->prepare("INSERT IGNORE INTO cancion(titulo, id_artista, anoEstreno, IDMB) VALUES (:titulo, :id_artista, :fecha, :idmb)");
        $stmt->execute([
            'titulo' => $this->titulo,
            'id_artista' => $this->id_artista,
            'fecha' => $this->anoEstreno,
            'idmb' => $this->IDMB
        ]);
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
