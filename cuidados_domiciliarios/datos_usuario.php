<?php 

$usuario = $_SESSION['usuario'];
$conexion = mysqli_connect("localhost", "root", "", "roles");

$consulta = "SELECT * FROM usuarios where usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

$nombre_usuario = $filas['nombre'];


?>