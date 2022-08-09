<?php
include('db.php');


$nombre = $_POST['nombre'];
$medico = $_POST['medico'];
$procedimiento = $_POST['procedimiento'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];
$ubicacion = $_POST['ubicacion'];

$sql =  "INSERT INTO domicilios (nombre,medico,procedimiento,ubicacion,domicilio,telefono)
VALUES ('$nombre', '$medico', '$procedimiento', '$ubicacion', '$domicilio', '$telefono')";

if(mysqli_query($conn, $sql)){
    session_start();
    $_SESSION['nuevo_domicilio'] = 'Nuevo domicilio agregado con exito.';
    header('location:administrativo.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
  





?>