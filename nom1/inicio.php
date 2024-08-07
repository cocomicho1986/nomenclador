<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/encantamiento.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nomenclador</title>
    <script>
       function filtrar() {
        var nombreFiltro = document.getElementById("filtroNombre").value.toLowerCase();
        var tipoFiltro = document.getElementById("filtroTipo").value.toLowerCase();
        var descripcionFiltro = document.getElementById("filtroDescripcion").value.toLowerCase();
        var filas = document.getElementsByTagName("tr");

        for (var i = 1; i < filas.length; i++) {
            var nombre = filas[i].getElementsByClassName("nombre")[0].innerText.toLowerCase();
            var tipo = filas[i].getElementsByClassName("tipo")[0].innerText.toLowerCase();
            var descripcion = filas[i].getElementsByClassName("descripcion")[0].innerText.toLowerCase();

            if (nombre.includes(nombreFiltro) && tipo.includes(tipoFiltro) && descripcion.includes(descripcionFiltro)) {
                filas[i].style.display = "";
            } else {
                filas[i].style.display = "none";
            }
        }
    }
    </script>
    
</head>

<body>
  <p>&nbsp;</p>
  <?php
    session_start();
    ?>
    <p align="center">
        <?php
        if (isset($_SESSION['usuario'])) {
            // Si hay una sesión iniciada, muestra el enlace "Menú Admin"
            echo '<a href="../loguearse/menu-admin.php">Menú Admin</a> | ';
        }
        ?>
       
        <a href="../loguearse/form-login.php">Login</a>
    </p>
    <p>&nbsp;</p>
    
    <div>
        <label for="filtroNombre" style='margin-bottom: 10px; margin-top: 20px; margin-left: 20px;'>Codigo:</label>
    <input type="text" id="filtroNombre" onkeyup="filtrar()" />
    
      <label for="filtroDescripcion" style='margin-bottom: 10px; margin-top: 20px; margin-left: 20px;'>Descripción:</label>
    <input type="text" id="filtroDescripcion" onkeyup="filtrar()" />
    
    <label for="filtroTipo" style='margin-bottom: 10px; margin-top: 20px; margin-left: 20px;'>Tipo:</label>
    <input type="text" id="filtroTipo" onkeyup="filtrar()" />

    </div>
<p>&nbsp;</p>
    <?php
    try {
        $databasePath = __DIR__ . '/../conexiones/nomenclador.sqlite';
        $conexion = new PDO('sqlite:' . $databasePath);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_tpt = "SELECT * FROM tabla_general";
        $resultado_tpt = $conexion->query($query_tpt);

        if ($resultado_tpt) {
            $datos = $resultado_tpt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border='1' class='tabla_bestias' style='margin-bottom: 10px; margin-top: 20px; margin-left: 20px;'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th class='tipo'>Clasificacion</th><th>Imagen</th></tr>";

            foreach ($datos as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
              
                echo "<td class='nombre'>" . htmlspecialchars($row['nombre']) ."<span class='tooltip'>".htmlspecialchars($row['nombre'])." </span>" . "</td>" ;
                
                
			
                echo "<td class='descripcion'>" . htmlspecialchars($row['descripcion']) ."<span class='tooltip'>".htmlspecialchars($row['descripcion'])." </span>" . "</td>";
                echo "<td class='tipo'>" . htmlspecialchars($row['tipo']) ."<span class='tooltip'>".htmlspecialchars($row['tipo'])." </span>" ."</td>";

                if (!empty($row['imagen'])) {
                    echo "<td class='ampliar-imagen'><img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' width='100' height='100'/></td>";
                } else {
                    echo "<td>No hay imagen</td>";
                }

               
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    ?>
</body>
</html>
