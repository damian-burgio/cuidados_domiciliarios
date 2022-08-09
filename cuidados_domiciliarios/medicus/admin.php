<?php
session_start();
if ($_SESSION['usuario'] != '0001') {
    header('Location:../index.php');
    $_SESSION['mensaje'] = '<h3>Error</h3>';
}

include('../datos_usuario.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/consulta_medica.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=DM+Sans&family=Italiana&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/datatables.min.css">

    <title>CUIDADOS DOMICILIARIOS</title>
    <style>
        body {
            position: relative;
            font-family: 'DM Sans', sans-serif;
        }

        .credit-card-div span {
            padding-top: 10px;
        }

        .credit-card-div img {
            padding-top: 30px;
        }

        .credit-card-div .small-font {
            font-size: 9px;
        }

        .credit-card-div .pad-adjust {
            padding-top: 10px;
        }

        .navbar-brand {
            font-family: 'Raleway', sans-serif;
        }

        hr {
            border: 2px solid black;
        }
    </style>


</head>


<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    <header>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><b>MEDICUS</b></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#section2">Historial de prestaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section3">Prestaciones del dia</a>
                        </li>
                        <li>
                            <a href="../logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <!------------------------- FIN NAV - COMIENZA SECCION ----------------------------------------->


    <?php
    include('db.php');
    $sql = "SELECT * FROM paciente";
    $result = $conn->query($sql);
    ?>

    <div id="section2" class="container-fluid bg-light" style="padding:100px 20px;">
        <h1>Historial de prestaciones</h1>
        <?php

        if (isset($_SESSION['mensaje'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['mensaje'] . "</div>";
            unset($_SESSION['mensaje']);
        }
        ?>
        <div class="container mt-3">


            <div class="table-responsive">
                <table id="table_id" class="table table-hover table-striped display">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>TA</th>
                            <th>Temperatura</th>
                            <th>Evolucion</th>
                            <th>Profesional</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($result as $resultados) {
                        ?>
                            <tr>
                                <td><?php echo $resultados['fecha']; ?></td>
                                <td><?php echo $resultados['nombre']; ?></td>
                                <td><?php echo $resultados['ta']; ?></td>
                                <td><?php echo $resultados['temperatura']; ?></td>
                                <td><?php echo $resultados['evolucion']; ?></td>
                                <td><?php echo $resultados['profesional']; ?></td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $resultados['id']; ?>">
                                            VER
                                        </button>
                                        <button type="button" class="btn btn-block btn-info mt-1" data-bs-toggle="modal" data-bs-target="#ModalEDITAR<?php echo $resultados['id']; ?>">
                                            MODIFICAR
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger mt-1"><a onclick="return confirm('¿Realmente desea eliminar el registro?')" class="text-decoration-none text-white" href="borrar.php?id=<?php echo $resultados['id']; ?>">
                                                ELIMINAR
                                            </button></a>
                                    </div>
                                </td>
                            </tr>

                            <!--MODAL VER-->
                            <div class="modal fade" id="myModal<?php echo $resultados['id']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo $resultados['nombre']; ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="form-group">
                                                    <label for=""><?php echo $resultados['fecha']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">TA: <?php echo $resultados['ta']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">TEMPERATURA: <?php echo $resultados['temperatura']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">EVOLUCION: <?php echo $resultados['evolucion']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">PROFESIONAL: <?php echo $resultados['profesional']; ?></label>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL EDITAR-->
                            <div class="modal fade" id="ModalEDITAR<?php echo $resultados['id']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo $resultados['nombre']; ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="modificar.php" method="POST">
                                                <div class="form-group mt-2">
                                                    <label for="">Fecha: </label>
                                                    <input type="text" name="fecha" value="<?php echo $resultados['fecha']; ?>">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="">Nombre: </label>
                                                    <input type="text" name="nombre" value="<?php echo $resultados['nombre']; ?>">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="">TA: </label>
                                                    <input type="text" name="ta" value="<?php echo $resultados['ta']; ?>">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="">TEMPERATURA: </label>
                                                    <input type="text" name="temperatura" value="<?php echo $resultados['temperatura']; ?>">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="">EVOLUCION: </label>
                                                    <input type="text" name="evolucion" value="<?php echo $resultados['evolucion']; ?>">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="">PROFESIONAL: </label>
                                                    <input type="text" name="profesional" value="<?php echo $resultados['profesional']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success mt-2" value="Modificar">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!------------------------- FIN SECCION 2 - COMIENZA S. 3 ----------------------------------------->
    <?php
    $sql = "SELECT * FROM domicilios";
    $domicilio = $conn->query($sql);
    ?>
    <div id="section3" class="container-fluid bg-secondary text-white" style="padding:100px 20px;">
        <h1>Prestaciones del dia</h1>
        <div class="container mt-3">
            <h3>Algo para decir</h3>
            <p>Aca irian las prestaciones que tengo que realizar ese dia.</p>

            <div class="table-responsive">
                <table id="table_domicilios" class="table table-hover table-striped display">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>Prestacion</th>
                            <th>Mapa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($domicilio as $domicilios) {
                        ?>
                            <tr>
                                <td><?php echo date('d/m/Y'); ?></td>
                                <td><?php echo $domicilios['nombre']; ?></td>
                                <td><?php echo $domicilios['procedimiento']; ?></td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#domicilios_modal<?php echo $domicilios['id']; ?>">
                                        Ver
                                    </button>
                                </td>
                            </tr>

                            <!--MODAL-->
                            <div class="modal fade text-dark" id="domicilios_modal<?php echo $domicilios['id']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nombre: <?php echo $domicilios['nombre']; ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="">Direccion: <?php echo $domicilios['domicilio']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Procedimiento: <?php echo $domicilios['procedimiento']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="container justify-content-center">
                                                        <label for="">Calle: <?php echo $domicilios['ubicacion']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Telefono: <?php echo $domicilios['telefono']; ?></label>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>




        <script src="lib/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="lib/bootstrap.js"></script>
        <script src="lib/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });

                $('#table_domicilios').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });
            });
        </script>
</body>

</html>