<!DOCTYPE html>
<html lang="en">
<?php
include '../../db/connection.php';

$id = explode('=', $_SERVER['QUERY_STRING'])[1];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/styles/style.css">
    <title>Persona</title>
</head>

<body>
    <?php require('../../components/navbar.php') ?>

    <div class="center">
        <form method="POST" action='./filesUpdates/persona-update.php?id=<?php echo $id ?>' class="form-edited">
            <label for="">Nombre</label>
            <input name="nombre" type="text" placeholder="Nombre">
            <label for="">Celular</label>
            <input name="celular" type="number" placeholder="Celular">
            <label for="">Direccion</label>
            <input name="direccion" type="text" placeholder="Direccion">
            <label for="">estrato</label>
            <select name="estrato" id="estrato">
                <option>Seleciona</option>
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
</body>

</html>