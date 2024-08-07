<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nomenclador</title>
<link href="estilos/encantamiento.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p align="center"><span>Nomenclador</span></p>
<p>&nbsp;</p>
<p align="center"><a href="../compacto/modo-admin.php">Back</a></p>

<?php
session_start();

// Verificar si el usuario está autenticado
if (empty($_SESSION["usuario"])) {
    echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=consulta.php'>");
    exit();
}
?>

<p>&nbsp;</p>
<!-- Campo de entrada para el filtro -->
<input type="text" id="filtro" placeholder="Filtrar por Linea1..." style="margin-bottom: 10px; margin-top: 20px; margin-left: 20px;">

<table border="1" class="tabla_bestias" style="margin-bottom: 10px; margin-top: 20px; margin-left: 20px;">
  <thead>
    <tr>
      <th class="id">ID</th>
      <th class="linea1">Linea1</th>
      <th class="imagen">Imagen</th>
      <th colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>

<?php
try {
    // Conectar a la base de datos
    $databasePath = __DIR__ . '../conexiones/nomenclador.sqlite';
        $conexion = new PDO('sqlite:' . $databasePath);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para seleccionar todos los datos de la tabla de prueba
    $query_tpt = "SELECT * FROM tabla_imagen";
    $resultado_tpt = $conexion->query($query_tpt);

    if ($resultado_tpt) {
        // Mostrar todos los datos
        $datos = $resultado_tpt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datos as $row) {
            echo "<tr>";
            echo "<td class='id'>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td class='linea1'>" . htmlspecialchars($row['linea1']) . "</td>";
            // Mostrar la imagen si existe
            if (!empty($row['img'])) {
                echo "<td class='imagen'><img src='data:image/jpeg;base64," . base64_encode($row['img']) . "' width='100' height='100'/></td>";
            } else {
                echo "<td class='imagen'>No hay imagen</td>";
            }
            echo "<td><a href='editar.php?id=" . urlencode($row['id']) . "'>Modificar</a></td>";
            echo "<td><a href='eliminar.php?id=" . urlencode($row['id']) . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\");'>Eliminar</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

  </tbody>
</table>

<!-- Script para filtrar la tabla -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filtroInput = document.getElementById('filtro');
    const tabla = document.querySelector('.tabla_bestias tbody');

    filtroInput.addEventListener('input', function () {
        const filtroValue = filtroInput.value.toLowerCase().trim();
        const filas = tabla.querySelectorAll('tr');
        
        filas.forEach(function (fila) {
            const valorColumna = fila.querySelector('td.linea1').textContent.toLowerCase();
            fila.style.display = valorColumna.includes(filtroValue) ? '' : 'none';
        });
    });
});
</script>

</body>
</html>

