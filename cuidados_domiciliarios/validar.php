<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
session_start();
$_SESSION['usuario'] = $usuario;


$conexion = mysqli_connect("localhost", "root", "", "roles");

$consulta = "SELECT * FROM usuarios where usuario='$usuario' and clave='$clave'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);
if (isset($filas['id_cargo'])) {
    if ($filas['id_cargo'] == 1) { //administrador
        header("location:medicus/admin.php");
    } else if ($filas['id_cargo'] == 2) { //profesional
        header("location:medicus/profesional.php");
    } else if ($filas['id_cargo'] == 3) { //administrativo
        header("location:medicus/administrativo.php");
    } else {
?>
        header("location:index.php");
        <?php
        include("index.php");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
<?php
    }
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>