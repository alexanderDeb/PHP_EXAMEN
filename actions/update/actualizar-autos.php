<!DOCTYPE html>
<html lang="en">
<?php
include '../../db/connection.php';

$id = explode('=', $_SERVER['QUERY_STRING'])[1];

$connection = Connection::getInstance()->getDbInstance();

$Get_persona = $connection->prepare("SELECT nombre, id FROM persona");

$Get_persona->execute();

$responsePersona = $Get_persona->fetchAll();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/styles/style.css">
    <title>autos</title>
</head>

<body>
    <?php require('../../components/navbar.php') ?>
    <div class="center">
        <form method="POST" action='./filesUpdates/autos-update.php?id=<?php echo $id ?>' class="form-edited">
            <label for="">placa</label>
            <input name="placa" type="text" placeholder="placa">
            <label for="">color</label>
            <input name="color" type="text" placeholder="color">
            <label for="">marca</label>
            <input name="marca" type="text" placeholder="marca">
            <label for="">Numero de Puertas</label>
            <select name="NoPuertas" id="NoPuertas">
                <option>Seleccionar</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            <label for="">dueño</label>
            <select name="id_persona" id="id_persona">
                <option>Seleccionar</option>
                <?php
                foreach ($responsePersona as $row) {
                    echo
                    "
              <option value={$row["id"]}>" . $row["nombre"] . "</option>
            ";
                }
                ?>
            </select>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>

</html>