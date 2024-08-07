<?php
//include("conexion.php");
include("../conexiones/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $nombre = htmlspecialchars($_POST["nombre"]);
	$descripcion = htmlspecialchars($_POST["descripcion"]);
	$tipo = htmlspecialchars($_POST["tipo"]);

    try {
        // Preparar la consulta SQL
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
            // Leer los datos del archivo
            $imgData = file_get_contents($_FILES["imagen"]["tmp_name"]);
            $imgType = $_FILES["imagen"]["type"];

            // Confirmar que el archivo es una imagen
            if (substr($imgType, 0, 5) == "image") {
                $query = "UPDATE tabla_general SET nombre = :nombre,descripcion = :descripcion,tipo = :tipo, imagen = :imagen WHERE id = :id";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $stmt->bindParam(':imagen', $imgData, PDO::PARAM_LOB);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            } else {
                echo "El archivo subido no es una imagen válida.";
                exit();
            }
        } else {
            // Si no se sube una nueva imagen, solo actualizar el texto
            $query = "UPDATE tabla_general SET nombre = :nombre,descripcion = :descripcion,tipo = :tipo WHERE id = :id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
			 $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
			  $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        // Ejecutar la consulta y verificar resultados
        if ($stmt->execute()) {
            echo "Registro actualizado correctamente.";
			echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=inicio_editable.php'>");
        } else {
            echo "Error al actualizar el registro. ";
            print_r($stmt->errorInfo()); // Mostrar detalles del error
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

<p><a href="inicio_editable.php">Volver</a></p>
