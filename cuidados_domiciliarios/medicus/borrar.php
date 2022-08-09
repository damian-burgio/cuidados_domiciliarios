<?php
session_start();
include('db.php');


$id = $_GET['id'];

$sql = "DELETE FROM paciente WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION['mensaje'] = 'Datos eliminados con exito.';
    header('location:admin.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>