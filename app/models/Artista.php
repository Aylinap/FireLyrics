<?php

require_once '../app/services/Database.php';

class Artista
{
    private $id;
    private $nombre;
    private $IDMB;
    public function __construct($id = 0, $nombre = '', $IDMB = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->IDMB = $IDMB;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getIDMB()
    {
        return $this->IDMB;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setIDMB($IDMB): void
    {
        $this->IDMB = $IDMB;
    }
    public function addArtista()
    {

        try {
            $stmt_insert = Database::getConnection()->prepare("INSERT INTO artista(IDMB,nombre) VALUES (:IDMB, :nombre)");
            $stmt_insert->execute([
                'IDMB' => $this->IDMB,
                'nombre' => $this->nombre
            ]);
            $this->setId(Database::getConnection()->lastInsertId()) ;
        } catch (PDOException $e) {
            $stmt_select = Database::getConnection()->prepare("SELECT * FROM artista WHERE IDMB = :IDMB");
            $stmt_select->execute([
                'IDMB' => $this->IDMB
            ]);

            $respuesta = $stmt_select->fetch(PDO::FETCH_ASSOC);
            $this->setId($respuesta['id']);
            $this->setNombre($respuesta['nombre']);
            $this->setIDMB($respuesta['IDMB']);
        }
    }

    public function getAllArtistaBDD(){
        $stmt = Database::getConnection()->query("SELECT nombre FROM artista");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}