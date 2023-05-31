<?php
// llamar clase de conexion
include '../../db/connection.php';

try {
  $connection = Connection::getInstance()->getDbInstance();

  $q = $connection->prepare("SELECT a.placa as placa, a.color as color, a.marca as marca, a.NoPuertas as NoPuertas, p.nombre as dueño, a.id as id FROM autos as a JOIN persona as p ON a.id_persona = p.id");

  $q->execute();

  $res = $q->fetchAll();

  $dueño = $connection->prepare("SELECT * FROM persona");

  $dueño->execute();

  $response = $dueño->fetchAll();
} catch (\Throwable $th) {
  print_r($th);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/styles/style.css">
  <title>Autos</title>
</head>

<body>
  <?php require('../../components/navbar.php') ?>
  <div class="container">
    <div class="part-left">
      <table>
        <!-- cabecera -->
        <thead>
          <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Color</th>
            <th>Marca</th>
            <th>No Puertas</th>
            <th>Dueño</th>
            <th>Actions</th>
          </tr>
        </thead>
        <!-- cuerpo -->
        <tbody>
          <?php
          foreach ($res as $row) {
            echo
              "<tr>
              <td>" . $row['id'] . "</td>
              <td>" . $row['placa'] . "</td>
              <td>" . $row['color'] . "</td>
              <td>" . $row['marca'] . "</td>
              <td>" . $row['NoPuertas'] . "</td>
              <td>" . $row['dueño'] . "</td>
              <td>
                <a class='boton' href='../delete/borrar-autos.php?id=" . $row['id'] . "'>Borrar</a>
                <a class='boton' href='../update/actualizar-autos.php?id=" . $row['id'] . "'>Actualizar</a>
              </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="part-right">
      <form method="POST" action="../insertar/insertar-autos.php" class="form">
        <div>
          <h1>Autos</h1>
        </div>
        <label for="">Placa</label>
        <input name="placa" type="text" placeholder="placa">
        <label for="">Color</label>
        <input name="color" type="text" placeholder="color">
        <label for="">Marca</label>
        <input name="marca" type="text" placeholder="marca">
        <label for="">No. Puertas</label>
        <select name="NoPuertas" id="NoPuertas">
          <option value="2">2</option>
          <option value="4">4</option>
        </select>
        <label for="">Dueño</label>
        <select name="id_persona" id="id_persona">
          <option>Seleccionar</option>
          <?php
          foreach ($response as $row) {
            echo
              "<option value={$row['id']}>" . $row['nombre'] . "</option>";
          }
          ?>
        </select>
        <input type="submit" value="Registrar">
      </form>
    </div>
  </div>

</body>

</html>