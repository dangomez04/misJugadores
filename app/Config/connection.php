<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

class Connection{
    private $server = "localhost";

    private $user = "root";

    private $password = "bbdd";

    private $db = "dg_misJugadores";

    public function getConnection(){
          $conexion = new mysqli(
        $this->server,
        $this->user,
        $this->password,
        $this->db
    );

    // Verificar errores de conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
    }

    public function closeConnection($conexion){
        $conexion->close();
    }
}
$con = new Connection();
$connection = $con->getConnection();
?>
