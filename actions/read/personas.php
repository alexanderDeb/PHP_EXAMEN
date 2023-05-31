<!DOCTYPE html>
<html lang="en">

<?php
try {
  // llamar clase de conexion
  include '../../db/connection.php';

  // hacer la conexion a la base de datos
  $connection = Connection::getInstance()->getDbInstance();
  // crear el query
  $q = $connection->prepare("SELECT * FROM persona");
  // execute la peticion
  $q->execute();
  // almacenar resultado
  $res = $q->fetchAll();
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
  <title>Personas</title>
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
            <th>Estrato</th>
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
            <td>" . $row['estrato'] . "</td>
            <td class='row'>
              <a class='boton' href='../delete/borrar-persona.php?id=" . $row['id'] . "'>Borrar</a>
              <a class='boton' href='../update/actualizar-persona.php?id=" . $row['id'] . "'>Actualizar</a>
            </td>
          </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="part-right">
      <form method="POST" action="../insertar/insertar-personas.php" class="form">
        <div><h2>Personas</h2></div>
        <label for="">Nombre</label>
        <input name="nombre" type="text" placeholder="Nombre">
        <label for="">Celular</label>
        <input name="celular" type="text" placeholder="Celular">
        <label for="">Direccion</label>
        <input name="direccion" type="text" placeholder="Direccion">
        <label for="">Estrato</label>
        <select name="estrato" id="estrato">
          <option>Seleccionar</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        <input type="submit" value="Registrar">
      </form>
    </div>
  </div>
</body>

</html>