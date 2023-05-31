<!DOCTYPE html>
<html lang="en">

<?php
try {
    // llamar clase de conexion
    include '../../db/connection.php';

    // hacer la conexion a la base de datos
    $connection = Connection::getInstance()->getDbInstance();
    // crear el query
    $q = $connection->prepare("SELECT * FROM ordentrabajo");
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
    <title>OrdenTrabajo</title>
</head>

<body>
    <?php require('../../components/navbar.php') ?>
    <div class="container">
        <div class="part-left">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($res as $row) {
                        echo
                        "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['descripcion'] . "</td>
            <td>" . $row['fecha'] . "</td>
            <td class='row'>
              <a class='boton' href='../delete/borrar-ordenTrabajo.php?id=" . $row['id'] . "'>Borrar</a>
              <a class='boton' href='../update/actualizar-ordenTrabajo.php?id=" . $row['id'] . "'>Actualizar</a>
              <a class='boton' href='../Documentos/ordenTrabajo.php?id=" . $row['id'] . "'>Documento</a>
            </td>
          </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="part-right">
            <form method="POST" action="../insertar/insertar-ordenTrabajo.php" class="form">
                <div>
                    <h2>Orden de trabajo</h2>
                </div>
                <label for="">Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Escribe la descripcion de la orden de trabajo"></textarea>
                <label for="">Fecha</label>
                <input name="fecha" type="date" placeholder="fecha">
                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>
</body>

</html>