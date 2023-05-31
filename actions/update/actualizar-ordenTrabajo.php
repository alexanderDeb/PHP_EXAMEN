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
    <title>orden de trabajo</title>
</head>

<body>
    <?php require('../../components/navbar.php') ?>

    <div class="center">
        <form method="POST" action='./filesUpdates/ordenTrabajo-update.php?id=<?php echo $id ?>' class="form-edited">
            <label for="">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
            <label for="">Fecha</label>
            <input name="fecha" type="date" placeholder="fecha">
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>

</html>