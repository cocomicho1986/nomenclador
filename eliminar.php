<?php
session_start();

if (empty($_SESSION["usuario"])) {
    echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=inicio.php'>");
    exit();
}
?>
<?php
include("../conexiones/conexion.php");

$id = $_GET['id'];

try {
    $stmt = $conexion->prepare("DELETE FROM tabla_general WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: editar.php"); // Redirigir a la página de consulta después de eliminar
        exit();
    } else {
        echo "No se pudo eliminar el registro.";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
