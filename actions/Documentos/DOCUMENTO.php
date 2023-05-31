<?php
try {
    // llamar clase de conexion
    include '../../db/connection.php';

    // hacer la conexion a la base de datos
    $connection = Connection::getInstance()->getDbInstance();

    $query = $connection->prepare("INSERT INTO detalleordentrabajo (idOrden, idAutos, idTrabajador, idEstado, direccion, trabajo, tiempo, valor) VALUES (?,?,?,?,?,?,?,?)");
    $status = $query->execute([$_POST['placa'], $_POST['idOrden'], $_POST['idAutos'], $_POST['idTrabajador'], $_POST['idEstado'], $_POST['direccion'], $_POST['trabajo'], $_POST['tiempo'], $_POST['valor']]);

    $res = [
        "success" => $status,
        "rows_affected" => $query->rowCount()
    ];

    print_r($res);
} catch (\Throwable $th) {
    print_r($th);
}


// header("Location: " . $_SERVER['HTTP_REFERER'], true, 301);
// exit();
