<?php
session_start();
include('db.php');
include('correo.php');
date_default_timezone_set("America/Argentina/Buenos_Aires");

if (isset($_POST['btn'])) {
  $nombre_completo = $_POST['nombre_completo'];
  $medicard = $_POST['medicard'];
  $sistolica = $_POST['sistolica'];
  $diastolica = $_POST['diastolica'];
  $temperatura = $_POST['temperatura'];
  $saturacion = $_POST['saturacion'];
  $lesion = $_POST['lesion'];
  $miccion = $_POST['miccion'];
  $alimentacion = $_POST['alimentacion'];
  $conciencia = $_POST['conciencia'];
  $evol = $_POST['evolucion'];
  $fecha = date("d/m/Y - h:i:sa");
  $profesional = $_SESSION['usuario']; //llenar con el que inicia sesion

//
  $ta = $sistolica . '/' . $diastolica;
  $evolucion = "Paciente " . $conciencia . ", con miccion " . $miccion . ". Alimentado por " . $alimentacion . ". Saturando " . $saturacion . " - " . $evol;




  //OBTENER EL CORREO DEL USUARIO LOGUEADO
  $usuario_correo = $_SESSION['usuario'];

  $sql = "SELECT correo FROM usuarios WHERE usuario = '$usuario_correo'";
  $result = $conn->query($sql);

  foreach ($result as $resultados) {
    $copia_correo = $resultados['correo'];
  }


  enviar_correo($evolucion,'yohanacesac25@gmail.com',$nombre_completo);
}
$sql = "INSERT INTO paciente (nombre,ta,temperatura,profesional,evolucion,fecha)
VALUES ('$nombre_completo', '$ta', '$temperatura', '$profesional', '$evolucion', '$fecha')";

if (mysqli_query($conn, $sql)) {
  session_start();
  $_SESSION['insertar'] = 'Datos insertados con exito.';
  header('location:profesional.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
