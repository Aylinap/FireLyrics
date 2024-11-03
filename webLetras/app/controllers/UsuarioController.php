<?php
// UsuariosController.php
require_once '../app/controllers/Controller.php';
require_once '../app/models/Usuario.php';
require_once '../app/services/Logger.php';

class UsuarioController extends Controller
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    /**
     * Gestión del login de usuario
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $usuario = Usuario::login($_POST['username']);
                $usuario = (array) $usuario;
                if (empty($usuario)) throw new Exception('Usuario no encontrado.');
                else if ($usuario['password'] != $_POST['password']) throw new Exception('Contraseña incorrecta.');
                else {
                    $_SESSION['user'] = [
                        'id' => $usuario['id'],
                        'name' => $usuario['name'],
                        'username' => $usuario['username'],
                        'email' => $usuario['email'],
                        'role' => $usuario['role']
                    ];

                    header('Location: index.php?controller=cancion&action=index');
                    exit();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        include '../app/views/user/login.php';
    }

    public function logout()
    {
        $_SESSION = array();

        // Finalmente, destruir la sesión
        session_destroy();
        header('Location: index.php?controller=usuario&action=login');
        exit();
    }

    public function perfil(){
        include_once '../app/views/user/perfil.php';
    }
}
