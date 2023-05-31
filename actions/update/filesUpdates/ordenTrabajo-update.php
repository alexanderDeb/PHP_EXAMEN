<?php
try {
    // llamar clase de conexion
    include '../../../db/connection.php';

    $id = explode('=', $_SERVER['QUERY_STRING'])[1];
    // hacer la conexion a la base de datos
    $connection = Connection::getInstance()->getDbInstance();

    $query = $connection->prepare("UPDATE ordentrabajo SET descripcion=?, fecha=? WHERE id='$id'");
    $status = $query->execute([$_POST['descripcion'], $_POST['fecha']]);

    $res = [
        "success" => $status,
        "rows_affected" => $query->rowCount()
    ];

    print_r($res);
    print_r($id);
} catch (\Throwable $th) {
    print_r($th);
    print_r($id);
}


header("Location: " . $_SERVER['HTTP_REFERER'], true, 301);
exit();