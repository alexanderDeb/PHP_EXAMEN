<?php
// llamar clase de conexion
include '../../db/connection.php';

try {
    $connection = Connection::getInstance()->getDbInstance();

    $ordentrabajodet = $connection->prepare("SELECT * FROM detalleordentrabajo");

    $ordentrabajodet->execute();

    $resordentrabajodet = $ordentrabajodet->fetchAll();

    $autos = $connection->prepare("SELECT * FROM autos");

    $autos->execute();

    $resautos = $autos->fetchAll();

    $trabajador = $connection->prepare("SELECT * FROM trabajador");

    $trabajador->execute();

    $restrabajador = $trabajador->fetchAll();

    $estado = $connection->prepare("SELECT * FROM estado");

    $estado->execute();

    $resestado = $estado->fetchAll();

    $id = explode('=', $_SERVER['QUERY_STRING'])[1];
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
    <div class="center">
        <form method="POST" action="./DOCUMENTO.php" class="form-edited">
            <div class="first">
                <div>
                    <label for="">idOrden</label>
                    <input type="text" value="<?php echo $id ?>" disabled name="idOrden">
                </div>
                <div>
                    <label for="">Vehiculo</label>
                    <select name="idAutos" id="idAutos">
                        <option>Seleccionar</option>
                        <?php
                        foreach ($resautos as $row) {
                            echo "<option value={$row['id']}>" . $row['placa'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Direccion</label>
                    <input type="text" name="direccion">
                </div>
                <div>
                    <label for="">Tiempo</label>
                    <input type="date" name="tiempo">
                </div>
                <div>
                    <label for="">valor</label>
                    <input type="number" name="valor">
                </div>
            </div>
            <div class="first">
                <div>
                    <label for="">Estado de la orden</label>
                    <select name="idEstado" id="idEstado">
                        <option>Seleccionar</option>
                        <?php
                        foreach ($resestado as $row) {
                            echo "<option value={$row['id']}>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Trabajador</label>
                    <select name="idTrabajador" id="idTrabajador">
                        <option>Seleccionar</option>
                        <?php
                        foreach ($restrabajador as $row) {
                            echo "<option value={$row['id']}>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">trabajos</label>
                    <select name="trabajo" id="trabajo">
                        <option>Selecionar</option>
                        <option value="revision tecnicomecanica">revision tecnicomecanica</option>
                        <option value="cambio de llantas">cambio de llantas</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Añadir">
                </div>
            </div>
            <div class="first document">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No. Orden</th>
                            <th>Vehiculo</th>
                            <th>Trabajador</th>
                            <th>Estado</th>
                            <th>Direccion</th>
                            <th>Trabajo</th>
                            <th>Tiempo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <!-- cuerpo -->
                    <tbody>
                        <?php
                        foreach ($resordentrabajodet as $row) {
                            echo
                            "<tr>
              <td>" . $row['id'] . "</td>
              <td>" . $row['idOrden'] . "</td>
              <td>" . $row['idAutos'] . "</td>
              <td>" . $row['idTrabajador'] . "</td>
              <td>" . $row['idEstado'] . "</td>
              <td>" . $row['direccion'] . "</td>
              <td>" . $row['trabajo'] . "</td>
              <td>" . $row['tiempo'] . "</td>
              <td>" . $row['valor'] . "</td>
            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>

</html>