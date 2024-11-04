<?php
 require_once '../app/services/Database.php';

 class Log {
    private $id_usuario;
    private $ventana;
   // private $fecha;
    private $id_adress;
    private $id_session;


    public function __construct()
    {
        $this->id_usuario;
        $this->ventana;
        $this->id_adress;
        $this->id_session;
    }
    // insertar log en bbdd
    public function insertLog(){
        $conn = Database::getConnection();
        $sqlinsert = "insert into logs(id_usuario, ventana, fecha, ip_adress,session) values(:id_usuario, :ventana, NOW(), :id_adress, :id_session)";
        $stmt = $conn->prepare($sqlinsert);
        $stmt->bindParam(':id_usuario', $this->id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':ventana', $this->ventana, PDO::PARAM_STR);
        $stmt->bindParam(':id_adress', $this->id_adress, PDO::PARAM_STR);
        $stmt->bindParam(':id_session', $this->id_session, PDO::PARAM_STR);

        $stmt->execute();
    }
 }
