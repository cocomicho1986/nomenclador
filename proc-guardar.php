<?php
session_start();

if (empty($_SESSION["usuario"])) {
    echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=inicio.php'>");
    exit();
}
?>
<?php
include("../conexiones/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $tipo = htmlspecialchars($_POST["tipo"]);
    $imagen = null;

    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);
    }

    try {
        $query = "INSERT INTO tabla_general (nombre, descripcion, tipo, imagen) VALUES (:nombre, :descripcion, :tipo, :imagen)";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            echo "Registro ingresado correctamente.";
		echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=inicio_editable.php'>");
        } else {
            echo "Error al ingresar el registro.";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

<p><a href="inicio_editable.php">Volver</a></p>
