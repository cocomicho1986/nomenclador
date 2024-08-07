<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
//try {
    // Cambia 'prueba.sqlite' por el nombre de tu archivo de base de datos SQLite
  //  $conexion = new PDO('sqlite:C:\AppServ\www\appserv\nomenclador\nomenclador.sqlite');
   // $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}// catch (PDOException $e) {
  //  echo 'Error de conexión: ' . $e->getMessage();
  //  exit(); // Salir si hay un error de conexión
//}
?>
<?php
try {
    // Usar __DIR__ para obtener el directorio actual del script
    $databasePath = __DIR__ . '/nomenclador.sqlite';
//   $databasePath = __DIR__ . '/nom1/nomenclador.sqlite';

    $conexion = new PDO('sqlite:' . $databasePath);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit(); // Salir si hay un error de conexión
}
?>


</body>
</html>