<?php

include('db.php');

$id = $_POST['id'];
$fecha = $_POST['fecha'];
$ta = $_POST['ta'];
$temperatura = $_POST['temperatura'];
$evolucion = $_POST['evolucion'];
$profesional = $_POST['profesional'];

$sql =  "UPDATE paciente SET nombre='$nombre',ta='$ta',temperatura='$temperatura',profesional='$profesional',evolucion='$evolucion',fecha='$fecha' WHERE id='$id'";

if(mysqli_query($conn, $sql)){
    session_start();
    $_SESSION['mensaje'] = 'Datos modificads con exito.';
    header('location:admin.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
  

?>