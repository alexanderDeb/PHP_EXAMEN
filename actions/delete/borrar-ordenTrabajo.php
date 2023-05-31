<?php
include '../../db/connection.php';
$id = explode('=', $_SERVER['QUERY_STRING'])[1];
$connection = Connection::getInstance()->getDbInstance();
$q = $connection->prepare("DELETE FROM ordentrabajo WHERE id={$id}");
$status = $q->execute();

$res = [
    "success" => $status,
    "rows_affected" => $q->rowCount()
];

print_r($_SERVER);

header("Location: " . $_SERVER['HTTP_REFERER'], true, 301);
exit();
