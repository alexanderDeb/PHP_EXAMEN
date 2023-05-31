<?php
try {
  // llamar clase de conexion
  include '../../db/connection.php';

  // hacer la conexion a la base de datos
  $connection = Connection::getInstance()->getDbInstance();

  $query = $connection->prepare("INSERT INTO trabajador (nombre, celular, direccion, idCargo) VALUES (?,?,?,?)");
  $status = $query->execute([$_POST['nombre'], $_POST['celular'], $_POST['direccion'], $_POST['idCargo']]);

  $res = [
    "success" => $status,
    "rows_affected" => $query->rowCount()
  ];

  print_r($res);
} catch (\Throwable $th) {
  print_r($th);
}


header("Location: " . $_SERVER['HTTP_REFERER'], true, 301);
exit();