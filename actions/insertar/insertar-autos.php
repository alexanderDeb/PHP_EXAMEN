<?php
try {
  // llamar clase de conexion
  include '../../db/connection.php';

  // hacer la conexion a la base de datos
  $connection = Connection::getInstance()->getDbInstance();

  $query = $connection->prepare("INSERT INTO autos (placa, color, marca, NoPuertas, id_persona) VALUES (?,?,?,?,?)");
  $status = $query->execute([$_POST['placa'], $_POST['color'], $_POST['marca'], $_POST['NoPuertas'], $_POST['id_persona']]);

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