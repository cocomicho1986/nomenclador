<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ingresar Nuevo Registro</title>
    <link href="../css/encantamiento.css" rel="stylesheet" type="text/css" />
        <link href="../css/formularios.css" rel="stylesheet" type="text/css" />
    <style>
    select.scrollable {
        height: auto;
        max-height: 50px; /* Ajusta la altura máxima según tus necesidades */
        overflow-y: auto;
    }
</style>
</head>
<body>
<?php
session_start();

if (empty($_SESSION["usuario"])) {
    echo("<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=inicio.php'>");
    exit();
}
?>
<div class="container">
    <form action="proc-guardar.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <label for="nombre">Codigo:</label>
        <input type="text" id="nombre" name="nombre" required>
        </div>
        <br>
        <div class="form-row">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
        </div>
        <br>
        <div class="form-row">
           <label for="tipo">Tipo:</label>
<select name="tipo" class="scrollable">
    <option value="01-abrazaderas" <?php echo $registro['tipo'] == '01-abrazaderas' ? 'selected' : ''; ?>>01-abrazaderas</option>
    <option value="02-aisladores y aislantes" <?php echo $registro['tipo'] == '02-aisladores y aislantes' ? 'selected' : ''; ?>>02-aisladores y aislantes</option>
    <option value="03-alambres" <?php echo $registro['tipo'] == '03-alambres' ? 'selected' : ''; ?>>03-alambres</option>
      <option value="04-anillos" <?php echo $registro['tipo'] == '04-anillos' ? 'selected' : ''; ?>>04-anillos</option>
        <option value="05-arandelas" <?php echo $registro['tipo'] == '05-arandelas' ? 'selected' : ''; ?>>05-arandelas</option>
          <option value="07-artefactos alumbrados-ext.inc" <?php echo $registro['tipo'] == '07-artefactos alumbrados-ext.inc' ? 'selected' : ''; ?>>07-artefactos alumbrados-ext.inc</option>
            <option value="08-automotores-repuest. y acces." <?php echo $registro['tipo'] == '08-automotores-repuest. y acces.' ? 'selected' : ''; ?>>08-automotores-repuest. y acces.</option>
    <!-- Agrega más opciones aquí -->
     <option value="10-bases-interceptores" <?php echo $registro['tipo'] == '10-bases-interceptores' ? 'selected' : ''; ?>>10-bases-interceptores</option>
     <!-- Agrega más opciones aquí -->
     <option value="11-brazos" <?php echo $registro['tipo'] == '11-brazos' ? 'selected' : ''; ?>>11-brazos</option>
     <!-- Agrega más opciones aquí -->
     <option value="12-bolsas" <?php echo $registro['tipo'] == '12-bolsas' ? 'selected' : ''; ?>>12-bolsas</option>
     <!-- Agrega más opciones aquí -->
     <option value="13-borneras y bornes" <?php echo $registro['tipo'] == '13-borneras y bornes' ? 'selected' : ''; ?>>13-borneras y bornes</option>
     <!-- Agrega más opciones aquí -->
     <option value="14-buffet y limpieza" <?php echo $registro['tipo'] == '14-buffet y limpieza' ? 'selected' : ''; ?>>14-buffet y limpieza</option>
     <!-- Agrega más opciones aquí -->
     <option value="15-bulones" <?php echo $registro['tipo'] == '15-bulones' ? 'selected' : ''; ?>>15-bulones</option>
     <!-- Agrega más opciones aquí -->
     <option value="16-buzones" <?php echo $registro['tipo'] == '16-buzones' ? 'selected' : ''; ?>>16-buzones</option>
     <!-- Agrega más opciones aquí -->
     <option value="18-cables y conductores" <?php echo $registro['tipo'] == '18-cables y conductores' ? 'selected' : ''; ?>>18-cables y conductores</option>
       <!-- Agrega más opciones aquí -->
     <option value="19-cajas" <?php echo $registro['tipo'] == '19-cajas' ? 'selected' : ''; ?>>19-cajas</option>
       <!-- Agrega más opciones aquí -->
     <option value="20-caños y codos" <?php echo $registro['tipo'] == '20-caños y codos' ? 'selected' : ''; ?>>20-caños y codos</option>
       <!-- Agrega más opciones aquí -->
     <option value="21-capacitores" <?php echo $registro['tipo'] == '21-capacitores' ? 'selected' : ''; ?>>21-capacitores</option>
       <!-- Agrega más opciones aquí -->
     <option value="23-celdas p/subest.-accesorios" <?php echo $registro['tipo'] == '23-celdas p/subest.-accesorios' ? 'selected' : ''; ?>>23-celdas p/subest.-accesorios</option>
       <!-- Agrega más opciones aquí -->
     <option value="25-cintas" <?php echo $registro['tipo'] == '25-cintas' ? 'selected' : ''; ?>>25-cintas</option>
       <!-- Agrega más opciones aquí -->
     <option value="26-columnas, postes y accesorios" <?php echo $registro['tipo'] == '26-columnas, postes y accesorios' ? 'selected' : ''; ?>>26-columnas, postes y accesorios</option>
       <!-- Agrega más opciones aquí -->
     <option value="28-combustible" <?php echo $registro['tipo'] == '28-combustible' ? 'selected' : ''; ?>>28-combustible</option>
       <!-- Agrega más opciones aquí -->
     <option value="29-construcciones obra civil" <?php echo $registro['tipo'] == '29-construcciones obra civil' ? 'selected' : ''; ?>>29-construcciones obra civil</option>
       <!-- Agrega más opciones aquí -->
     <option value="30-contactores" <?php echo $registro['tipo'] == '30-contactores' ? 'selected' : ''; ?>>30-contactores</option>
          <!-- Agrega más opciones aquí -->
     <option value="31-crucetas y mensulas" <?php echo $registro['tipo'] == '31-crucetas y mensulas' ? 'selected' : ''; ?>>31-crucetas y mensulas</option>
          <!-- Agrega más opciones aquí -->
     <option value="32-chapas" <?php echo $registro['tipo'] == '32-chapas' ? 'selected' : ''; ?>>32-chapas</option>
          <!-- Agrega más opciones aquí -->
     <option value="34-descargadores" <?php echo $registro['tipo'] == '34-descargadores' ? 'selected' : ''; ?>>34-descargadores</option>
          <!-- Agrega más opciones aquí -->
     <option value="36-elec.mat.gral" <?php echo $registro['tipo'] == '36-elec.mat.gral' ? 'selected' : ''; ?>>36-elec.mat.gral</option>
          <!-- Agrega más opciones aquí -->
     <option value="37-empalmes y terminales" <?php echo $registro['tipo'] == '37-empalmes y terminales' ? 'selected' : ''; ?>>37-empalmes y terminales</option>
          <!-- Agrega más opciones aquí -->
     <option value="39-fusibles" <?php echo $registro['tipo'] == '39-fusibles' ? 'selected' : ''; ?>>39-fusibles</option>
          <!-- Agrega más opciones aquí -->
     <option value="41-ganchos-guardacabos" <?php echo $registro['tipo'] == '41-ganchos-guardacabos' ? 'selected' : ''; ?>>41-ganchos-guardacabos</option>
          <!-- Agrega más opciones aquí -->
     <option value="42-grampas-collares" <?php echo $registro['tipo'] == '42-grampas-collares' ? 'selected' : ''; ?>>42-grampas-collares</option>
          <!-- Agrega más opciones aquí -->
     <option value="43-preensamblados" <?php echo $registro['tipo'] == '43-preensamblados' ? 'selected' : ''; ?>>43-preensamblados</option>
          <!-- Agrega más opciones aquí -->
     <option value="45-herrajes en gral" <?php echo $registro['tipo'] == '45-herrajes en gral' ? 'selected' : ''; ?>>45-herrajes en gral</option>
      <option value="46-herramientas y utiles" <?php echo $registro['tipo'] == '46-herramientas y utiles' ? 'selected' : ''; ?>>46-herramientas y utiles</option>
       <option value="47-hierros y planchuelas" <?php echo $registro['tipo'] == '47-hierros y planchuelas' ? 'selected' : ''; ?>>47-hierros y planchuelas</option>
        <option value="50-imprenta y papeleria" <?php echo $registro['tipo'] == '50-imprenta y papeleria' ? 'selected' : ''; ?>>50-imprenta y papeleria</option>
         <option value="51-instrumental para medicion" <?php echo $registro['tipo'] == '51-instrumental para medicion' ? 'selected' : ''; ?>>51-instrumental para medicion</option>
          <option value="52-interruptores" <?php echo $registro['tipo'] == '52-interruptores' ? 'selected' : ''; ?>>52-interruptores</option>
           <option value="57-lamparas" <?php echo $registro['tipo'] == '57-lamparas' ? 'selected' : ''; ?>>57-lamparas</option>
            <option value="58-lineas-accesorios de montaje" <?php echo $registro['tipo'] == '58-lineas-accesorios de montaje' ? 'selected' : ''; ?>>58-lineas-accesorios de montaje</option>
             <option value="59-lubricantes,aceites y desinc" <?php echo $registro['tipo'] == '59-lubricantes,aceites y desinc' ? 'selected' : ''; ?>>59-lubricantes,aceites y desinc</option>
              <option value="61-medidores" <?php echo $registro['tipo'] == '61-medidores' ? 'selected' : ''; ?>>61-medidores</option>
               <option value="62-medidores-repuestos y acces" <?php echo $registro['tipo'] == '62-medidores-repuestos y acces' ? 'selected' : ''; ?>>62-medidores-repuestos y acces</option>
                <option value="63-morseteria" <?php echo $registro['tipo'] == '63-morseteria' ? 'selected' : ''; ?>>63-morseteria</option>
                 <option value="64-muebles, maquinas y utiles" <?php echo $registro['tipo'] == '64-muebles, maquinas y utiles' ? 'selected' : ''; ?>>64-muebles, maquinas y utiles</option>
                  <option value="70-pernos" <?php echo $registro['tipo'] == '70-pernos' ? 'selected' : ''; ?>>70-pernos</option>
                   <option value="71-pintura y afines" <?php echo $registro['tipo'] == '71-pintura y afines' ? 'selected' : ''; ?>>71-pintura y afines</option>
                    <option value="73-portafusibles" <?php echo $registro['tipo'] == '73-portafusibles' ? 'selected' : ''; ?>>73-portafusibles</option>
                     <option value="74-portalamparas" <?php echo $registro['tipo'] == '74-portalamparas' ? 'selected' : ''; ?>>74-portalamparas</option>
                     
                                  
</select>
</div>
        <br>
        <div class="form-row">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
        </div>
        <br>
        <div class="form-row">
        <input type="submit" value="Ingresar">
        </div>
    </form>
    </div>
    <p><a href="inicio_editable.php">Volver</a></p>
</body>
</html>
