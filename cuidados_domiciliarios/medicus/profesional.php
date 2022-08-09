<?php 
session_start();?>

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
                            <a class="nav-link active" aria-current="page" href="#section1">Cargar prestacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section3">Prestaciones del dia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section2">Historial de prestaciones</a>
                        </li>
                        <li>
                            <a href="../logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <!------------------------- FIN NAV - COMIENZA S. 1 ----------------------------------------->
    <div id="section1" class="container-fluid bg-primary text-white" style="padding:100px 20px;">
        <div class="container">
        <?php
        if(isset($_SESSION['insertar'])){
            echo "<div class='alert alert-success'>".$_SESSION['insertar']."</div>";
            unset($_SESSION['insertar']);
        }
        ?>
            <form action="insert.php" method="post" enctype="multipart/form-data" class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="text" class="form-control text-success" placeholder="Nombre y Apellido" name="nombre_completo" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="number" min="9999" max="999999" class="form-control text-success" placeholder="Medicard" name="medicard">
                            </div>
                        </div>

                        <hr>

                        <!--signos vitales-->
                        <div class="row mt-2">
                            <div class="col-md-3 col-sm-3 col-xs-3 mt-2">
                                <input type="number" class="form-control" min="60" max="220" placeholder="Sistolica" name="sistolica" required>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 mt-2">
                                <input type="number" class="form-control" min="30" max="110" placeholder="Diastolica" name="diastolica" required>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 mt-2">
                                <input type="number" class="form-control" step="0.01" min="33" max="41" placeholder="Temperatura" name="temperatura" required>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 mt-2">
                                <input type="number" class="form-control" min="60" max="100" placeholder="Saturacion" name="saturacion" required>

                            </div>
                        </div>

                        <hr>
                        <!--valoracion-->

                        <div class="d-grid gap-2 mt-3 mb-2">
                            <!-- Basic dropdown -->
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lesiones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <!-- Default unchecked -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="lesion" value="no tiene" checked>No tiene
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="lesion" value="upp">UPP
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                </a>
                            </div>



                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Miccion</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <!-- Default unchecked -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="miccion" value="espontanea" checked>Espontanea
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="miccion" value="sonda">Sonda Vesical
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                </a>
                            </div>


                            <!-- Basic dropdown -->
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nutricion</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <!-- Default unchecked -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="alimentacion" value="via oral" checked>Via Oral
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="alimentacion" value="sng">SNG
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                </a>
                            </div>



                            <!-- Basic dropdown -->
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estado de conciencia</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <!-- Default unchecked -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="conciencia" value="orientado" checked>Orientado
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="conciencia" value="desorientado">Desorientado
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <!------------------->
                        <div class="row ">
                            <div class="col mt-2">
                                <textarea class="form-control text-success" placeholder="Evolucion" rows="5" name="evolucion"></textarea>
                            </div>
                        </div>
                        <hr>
                        <!-------------->
                        <div class="d-grid gap-2">
                            <button name="btn" class="btn btn-success" type="submit">Finalizar</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!------------------------- FIN SECCION 1 - COMIENZA S. 2 ----------------------------------------->
    <?php
    include('db.php');
    $sql = "SELECT * FROM paciente";
    $result = $conn->query($sql);
    ?>

    <div id="section2" class="container-fluid bg-light" style="padding:100px 20px;">
        <h1>Historial de prestaciones</h1>
        <div class="container mt-3">
            <h3>Algo para decir</h3>
            <p>Utilice .table-responsive para que se agregue un scrollbar (es muy grande horizontalmente).</p>

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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $resultados['id']; ?>">
                                        VER
                                    </button>
                                </td>
                            </tr>

                            <!--MODAL-->
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
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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