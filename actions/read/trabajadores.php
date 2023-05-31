<!DOCTYPE html>
<html lang="en">
<?php
// llamar clase de conexion
include '../../db/connection.php';

try {
  // hacer la conexion a la base de datos
  $connection = Connection::getInstance()->getDbInstance();
  // crear el query
  $q = $connection->prepare("
SELECT t.id as id, t.nombre as nombre, t.celular as celular, t.direccion as direccion, c.nombre as cargo 
FROM trabajador as t
JOIN cargo as c
ON t.idCargo = c.id 
");
  // execute la peticion
  $q->execute();
  // almacenar resultado
  $res = $q->fetchAll();

  $Get_cargo = $connection->prepare("SELECT * FROM cargo");

  $Get_cargo->execute();

  $res_cargo = $Get_cargo->fetchAll();
} catch (\Throwable $th) {
  print_r($th);
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/styles/style.css">
  <title>Trabajadores</title>
</head>

<body>
  <?php require('../../components/navbar.php') ?>
  <div class="container">
    <div class="part-left">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Direccion</th>
            <th>Cargo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php

          foreach ($res as $row) {
            echo
            "<tr>
              <td>" . $row['id'] . "</td>
              <td>" . $row['nombre'] . "</td>
              <td>" . $row['celular'] . "</td>
              <td>" . $row['direccion'] . "</td>
              <td>" . $row['cargo'] . "</td>
              <td class='row'>
                <a class='boton' href='../delete/borrar-trabajador.php?id=" . $row['id'] . "'>Borrar</a>
                <a class='boton' href='../update/actualizar-trabajador.php?id=" . $row['id'] . "'>Actualizar</a>
              </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="part-right">
      <form method="POST" action="../insertar/insertar-trabajadores.php" class="form">
        <div>
          <h2>Trabajadores</h2>
        </div>
        <label for="">Nombre</label>
        <input name="nombre" type="text" placeholder="Nombre">
        <label for="">Celular</label>
        <input name="celular" type="text" placeholder="Celular">
        <label for="">Direccion</label>
        <input name="direccion" type="text" placeholder="Direccion">
        <label for="">Cargo</label>
        <select name="idCargo" id="idCargo">
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
  </div>
</body>

</html>