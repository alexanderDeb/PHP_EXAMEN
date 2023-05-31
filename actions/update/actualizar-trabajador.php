<!DOCTYPE html>
<html lang="en">
<?php
include '../../db/connection.php';

$id = explode('=', $_SERVER['QUERY_STRING'])[1];

$connection = Connection::getInstance()->getDbInstance();

$Get_cargo = $connection->prepare("SELECT * FROM cargo");

$Get_cargo->execute();

$res_cargo = $Get_cargo->fetchAll();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/styles/style.css">
  <title>trabajador</title>
</head>

<body>
  <?php require('../../components/navbar.php') ?>

  <div class="center">
    <form method="POST" action='./filesUpdates/trabajador-update.php?id=<?php echo $id ?>' class="form-edited">
      <label for="">Nombre</label>
      <input name="nombre" type="text" placeholder="Nombre">
      <label for="">Celular</label>
      <input name="celular" type="number" placeholder="Celular">
      <label for="">Direccion</label>
      <input name="direccion" type="text" placeholder="Direccion">
      <label for="">idCargo</label>
      <select name="idCargo" id="">
        <option>Seleccionar</option>
        <?php
        foreach ($res_cargo as $row) {
          echo
          "
              <option value={$row["id"]}>" . $row["nombre"] . "</option>
            ";
        }
        ?>
      </select>
      <input type="submit" value="Registrar">
    </form>
  </div>
</body>

</html>