<?php
/*se mandan los logs o se obtienen de las paginas que vaya visitando
el tema es que no se si teiene que ir pegado en el headeer o en el footer
tendria que buscar informacion */

$host = 'localhost';
$db = 'firelyrics';
$user = 'root';
$pass = 'sanm1919';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_usuario = 1; // tomar el id de usuario cuando hace logs $_session
    $ventana = 'pagina_inicio'; // tomar la pagina que esta -> $REQUEST URL
    $id_adress = $_SERVER['REMOTE_ADDR']; // toma la ip
    $id_session = session_id(); // id de sesion

    $sql = "INSERT INTO logs (id_usuario, ventana, Fecha, id_adress, id_session) VALUES (:id_usuario, :ventana, NOW(), :id_adress, :id_session)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':ventana', $ventana, PDO::PARAM_STR);
    $stmt->bindParam(':id_adress', $id_adress, PDO::PARAM_STR);
    $stmt->bindParam(':id_session', $id_session, PDO::PARAM_STR);

    $stmt->execute();

    echo "Registro de log insertado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

