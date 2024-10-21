<?php
require_once '../DatabaseConnection.php';

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
    public function __setPassword($password) {
        $this->password = $password;
    }
    public function __setEmail($email) {
        $this->email = $email;
    }
    public function __setFoto($foto) {
        $this->foto = $foto;
    }
    public function __setRol($rol) {
        $this->rol = $rol;
    }

    //CRUD
}
