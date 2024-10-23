<?php 

// Configuración de la base de datos
define('DB_HOST', 'localhost'); // Dirección del servidor de la base de datos
define('DB_PORT', '3310'); // Puerto 
define('DB_NAME', 'webletras'); // Nombre de la base de datos
define('DB_USER', 'admin'); // Nombre de usuario
define('DB_PASS', '[pyrQLM)4q6eyGdz'); // Contraseña

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO(
            "mysql:host=" . DB_HOST .";port=" . DB_PORT . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASS
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}