<?php
require_once 'DatabaseConnection.php';

class Usuario
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $foto;
    private $rol;

    //Getters

    public function __getID()
    {
        return $this->id;
    }
    public function __getUsername()
    {
        return $this->username;
    }
    public function __getPassword()
    {
        return $this->password;
    }
    public function __getEmail()
    {
        return $this->email;
    }
    public function __getFoto()
    {
        return $this->foto;
    }
    public function __getRol()
    {
        return $this->rol;
    }

    //Setters
    public function __setID($id)
    {
        $this->id = $id;
    }
    public function __setUsername($username)
    {
        $this->username = $username;
    }
    public function __setPassword($password)
    {
        $this->password = $password;
    }
    public function __setEmail($email)
    {
        $this->email = $email;
    }
    public function __setFoto($foto)
    {
        $this->foto = $foto;
    }
    public function __setRol($rol)
    {
        $this->rol = $rol;
    }

    //CRUD
    /* Inserta un nuevo Usuario */
    public function create()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO usuario(username, password, correo, fotoPerfil_url, rol) VALUES (:user, :pass, :email, :foto, :rol)");

        $stmt->bindParam(':user', $this->username);
        $stmt->bindParam(':pass', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':rol', $this->rol);

        return $stmt->execute();
    }

    /*Obtiene un usuario por su Username */
    public static function getByUserName($username) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM usuario WHERE username = :user");
        $stmt->bindParam(':user', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
