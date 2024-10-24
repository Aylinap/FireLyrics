<?php
class Cancion
{
    private $id;
    private $titulo;
    private $id_artista;
    private $anoEstreno;
    private $id_musicBrainz;

    /* Constructor */
    public function __construct($id,  $titulo,  $id_artista,  $anoEstreno,  $id_musicBrainz)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->id_artista = $id_artista;
        $this->anoEstreno = $anoEstreno;
        $this->id_musicBrainz = $id_musicBrainz;
    }

    /* Getters */
    public function getId() {return $this->id;}

	public function getTitulo() {return $this->titulo;}

	public function getIdArtista() {return $this->id_artista;}

	public function getAnoEstreno() {return $this->anoEstreno;}

	public function getIdMusicBrainz() {return $this->id_musicBrainz;}

    /* Setters */
	public function setId( $id): void {$this->id = $id;}

	public function setTitulo( $titulo): void {$this->titulo = $titulo;}

	public function setIdArtista( $id_artista): void {$this->id_artista = $id_artista;}

	public function setAnoEstreno( $anoEstreno): void {$this->anoEstreno = $anoEstreno;}

	public function setIdMusicBrainz( $id_musicBrainz): void {$this->id_musicBrainz = $id_musicBrainz;}

	/* CRUD */
    
    
}
