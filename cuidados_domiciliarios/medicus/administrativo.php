<?php
session_start();
if ($_SESSION['usuario'] != '0002') {
    header('Location:index.php');
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
                <a class="navbar-brand" href="#"><b>MEDICUS</b></a>
            </div>
            <div>
                <a href="../logout.php" class="text-decoration-none text-dark m-2">Logout</a>
            </div>
        </nav>

    </header>

    <!------------------------- FIN NAV - COMIENZA S. 1 ----------------------------------------->
    <div id="section1" class="container-fluid bg-primary text-white" style="padding:100px 20px;">
        <div class="container">
            <?php

            if (isset($_SESSION['nuevo_domicilio'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['nuevo_domicilio'] . "</div>";
                unset($_SESSION['nuevo_domicilio']);
            }
            ?>
            <form action="nuevo_domicilio.php" method="post" enctype="multipart/form-data" class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="text" class="form-control text-success" placeholder="Nombre y Apellido" name="nombre" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="text" class="form-control text-success" placeholder="Medico tratante" name="medico" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="number" class="form-control text-success" placeholder="Medicard" name="medicard" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="number" class="form-control text-success" placeholder="Telefono" name="telefono" required>
                            </div>
                        </div>

                        <hr>
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="text" class="form-control text-success" placeholder="Ubicacion" name="ubicacion" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-2">
                                <input type="text" class="form-control text-success" placeholder="Procedimiento" name="procedimiento" required>
                            </div>
                        </div>

                        <hr>
                        <!------------------->
                        <div class="row ">
                            <div class="col mt-2">
                                <textarea class="form-control text-success" placeholder="Google Maps (width='400' height='250')" rows="5" name="domicilio"></textarea>
                            </div>
                        </div>
                        <hr>


                        <!-------------->
                        <div class="d-grid gap-2">
                            <button name="btn" class="btn btn-success" type="submit">Cargar domicilio</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>