<?php
include "ligaBD.php";
$liga1 = liga1();
$liga2 = liga2();

$sql1 = "SELECT * FROM consume_vehicle_60days";

$resultado1 = mysqli_query($liga1, $sql1);
if (mysqli_num_rows($resultado1) > 0) {

    $sql2 = "SELECT * FROM evaluation_vehicles";

    $resultado2 = mysqli_query($liga2, $sql2);
    if (mysqli_num_rows($resultado2) > 0) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
            <link rel="icon" type="image/png" href="../assets/img/neo.ico">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>NEOapp</title>
            <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
            <!-- Fonts and icons -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
            <!-- CSS Files -->
            <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
            <!-- CSS Just for demo purpose, don't include it in your project -->
            <link href="../assets/demo/demo.css" rel="stylesheet" />
        </head>

        <body class="user-profile">
            <div class="wrapper ">
                <div class="sidebar" data-color="green">
                    <div class="logo">
                        <a class="simple-text logo-normal">
                            NEOapp
                        </a>
                    </div>
                    <div class="sidebar-wrapper" id="sidebar-wrapper">
                        <ul class="nav">
                            <li>
                                <a href="./dashboard.php">
                                    <i class="now-ui-icons design_app"></i>
                                    <p>Ocorrências</p>
                                </a>
                            </li>
                            <li>
                                <a href="./Relatorio_veiculos.php">
                                    <i class="now-ui-icons business_badge"></i>
                                    <p>Relatório dos veículos</p>
                                </a>
                            </li>
                            <li>
                                <a href="./Relatorio_motoristas.php">
                                    <i class="now-ui-icons business_badge"></i>
                                    <p>Relatório dos motoristas</p>
                                </a>
                            </li>
                            <li>
                                <a href="./map.php">
                                    <i class="now-ui-icons location_map-big"></i>
                                    <p>Rotas</p>
                                </a>
                            </li>
                            <li class="active ">
                                <a href="./user.php">
                                    <i class="now-ui-icons transportation_bus-front-12"></i>
                                    <p>Monitoramento de Autocarros</p>
                                </a>
                            </li>
                            <li>
                                <a href="./Lista_Veiculos.php">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <p>Lista de veículos</p>
                                </a>
                            </li>
                            <li>
                                <a href="./Lista_motoristas.php">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <p>Lista de Motoristas</p>
                                </a>
                            </li>
                            <li>
                                <a href="./Enviar.php">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                    <p>Envio de email</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-panel" id="main-panel">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
                        <div class="container-fluid">
                            <div class="navbar-wrapper-center mx-auto text-center">
                                
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                    <div class="panel-header panel-header-sm">
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="title">Consumo de combustível dos autocarros</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th scope="col">Veículo</th>
                                                <th scope="col">Km 60 dias</th>
                                                <th scope="col">Combustivel/100km</th>
                                                <th scope="col">Adblue/100km</th>
                                                <th scope="col">Água/100km</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                mysqli_data_seek($resultado1, 0);
                                                while ($row1 = mysqli_fetch_assoc($resultado1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $row1['vehicle_id']; ?></th>
                                                        <td class="text-center"><?php echo $row1['sum_km']; ?></td>
                                                        <td class="text-center"><?php echo $row1['fuel_supply']; ?></td>
                                                        <td class="text-center"><?php echo $row1['adblue_supply']; ?></td>
                                                        <td class="text-center"><?php echo $row1['water_supply']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="title">Lista das notas dos autocarros dada pelo motorista</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th scope="col">Veículo</th>
                                                <th scope="col">Direção</th>
                                                <th scope="col">Motor</th>
                                                <th scope="col">Partida</th>
                                                <th scope="col">Transmissão</th>
                                                <th scope="col">Suspensão</th>
                                                <th scope="col">Escape</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                mysqli_data_seek($resultado2, 0);
                                                while ($row2 = mysqli_fetch_assoc($resultado2)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $row2['vehicle_id']; ?></th>
                                                        <td class="text-center"><?php echo $row2['note_steering_system']; ?></td>
                                                        <td class="text-center"><?php echo $row2['note_motor_system']; ?></td>
                                                        <td class="text-center"><?php echo $row2['note_start_system']; ?></td>
                                                        <td class="text-center"><?php echo $row2['note_transmission_system']; ?></td>
                                                        <td class="text-center"><?php echo $row2['note_suspension_system']; ?></td>
                                                        <td class="text-center"><?php echo $row2['note_exhaust_system']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--   Core JS Files   -->
            <script src="../assets/js/core/jquery.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script src="../assets/js/core/bootstrap.min.js"></script>
            <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
            <!--  Google Maps Plugin    -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
            <!-- Chart JS -->
            <script src="../assets/js/plugins/chartjs.min.js"></script>
            <!--  Notifications Plugin    -->
            <script src="../assets/js/plugins/bootstrap-notify.js"></script>
            <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
            <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
            <script src="../assets/demo/demo.js"></script>
        </body>

        </html>

<?php

    } else {
        echo "Não há resultados";
    }
} else {
    echo "Não há resultados";
}
?>
