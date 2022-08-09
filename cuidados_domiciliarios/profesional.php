<?php
session_start();
if ($_SESSION['usuario']!='6939'){
    header('Location:index.php');
    $_SESSION['mensaje'] = '<h3>Error</h3>';
}
include('datos_usuario.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola Profesional <?php echo $nombre_usuario; ?></h1>
</body>
</html>