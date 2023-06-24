<!DOCTYPE html>
<html>

<head>
    <?php include "./uis/head.php" ?>

     <!-- TABULATOR -->
     <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    <!-- <script type="module" src="./controller/clientes_controller.js" defer></script> -->
    <title>Registrar BD Remota</title>
</head>
<body>

<?php include_once "./uis/header.php"; ?>

<?php include "./uis/menu-lateral.php" ?>

<div class="container mt-4 col-6" style="text-align:center">
  <h2>Formulario</h2>
  <form id="myForm" method="post">
    <div class="form-group mb-2">
      <label for="ip">IP</label>
      <input type="text" class="form-control" id="ip" name="ip" required>
    </div>
    <div class="form-group mb-2">
      <label for="db">Base de datos</label>
      <input type="text" class="form-control" id="db" name="db" required>
    </div>
    <div class="form-group mb-2">
      <label for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="form-group mb-2">
      <label for="clave">Contraseña</label>
      <input type="text" class="form-control" id="clave" name="clave" required>
    </div>
    <div class="form-group mb-2">
      <label for="pais">País</label>
      <input type="text" class="form-control" id="pais" name="pais" required>
    </div>
    <div class="form-group mb-2">
      <label for="cojer">Cojer</label>
      <input type="text" class="form-control" id="cojer" name="cojer" required>
    </div>
    <div class="form-group mb-2">
      <label for="tabla">Tabla</label>
      <input type="text" class="form-control" id="tabla" name="tabla" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
  </form>
</div>

<div class="container">

    
            <div id="table"></div>
       </div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="module" src="./controller/bd_remota.js"></script>

<?php include "./uis/footer.php"; ?>
</body>

</html>
