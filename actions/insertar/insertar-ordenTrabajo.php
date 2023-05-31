<?php
// llamar clase de conexion
include '../../db/connection.php';

// hacer la conexion a la base de datos
$connection = Connection::getInstance()->getDbInstance();

$query = $connection->prepare("INSERT INTO ordentrabajo (descripcion, fecha) VALUES (?,?)");
$status = $query->execute([$_POST['descripcion'], $_POST['fecha']]);

$res = [
    "success" => $status,
    "rows_affected" => $query->rowCount()
];

print_r($res);


header("Location: " . $_SERVER['HTTP_REFERER'], true, 301);
exit();