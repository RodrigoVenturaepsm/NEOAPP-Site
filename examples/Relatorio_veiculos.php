

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/neo.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Now UI Dashboard by Creative Tim</title>
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

  <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="green">
        <div class="logo">
          <a class="simple-text logo-normal">
            NEOapp
          </a>
        </div>

        <!-- MENU PRINCIPAL -->
        <div class="sidebar-wrapper" id="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="./dashboard.php">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="active">
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

            <li>
              <a href="./Monitoramento_autocarros.php">
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
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="title">Certificados do mês corrente</h5>
                </div>
                  
                <div class="card-body">
                  <table class="table">
                    <thead class=" text-primary">                     
                      <th scope="col">certificate_name</th>
                      <th scope="col">certificate_id</th>
                      <th scope="col">vehicle_id</th>
                      <th scope="col">plate_vehicle</th>
                      <th scope="col">valid</th>
                      <th scope="col">entity</th>
                      <th scope="col">value_pay</th>                                   
                    </thead>
                                              
                    <tbody>
                      <?php
                        include "LigacaoProcedures/ligaProcedure_mes_corrente.php";
                        $resultados1 = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($resultados1 as $row1) {
                      ?>
                      
                      <tr>
                        <th scope="row"><?php echo $row1['certificate_name']; ?></th>
                        <td><?php echo $row1['certificate_id']; ?></td>
                        <td><?php echo $row1['vehicle_id']; ?></td>
                        <td><?php echo $row1['plate_vehicle']; ?></td>
                        <td><?php echo $row1['valid']; ?></td>
                        <td><?php echo $row1['entity']; ?></td>
                        <td><?php echo $row1['value_pay']; ?></td>
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
                  <h5 class="title">Certificados a expirar no próximo mês</h5>
                </div>
                                      
                <div class="card-body">
                  <table class="table">
                    <thead class=" text-primary">
                      <th scope="col">certificate_name</th>
                      <th scope="col">certificate_id</th>
                      <th scope="col">vehicle_id</th>
                      <th scope="col">plate_vehicle</th>
                      <th scope="col">valid</th>
                      <th scope="col">entity</th>
                      <th scope="col">value_pay</th>                   
                    </thead>
                                      
                    <tbody>
                      <?php
                        include "LigacaoProcedures/ligaProcedure_proximo_mes.php";
                        $resultados2 = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($resultados2 as $row2) {
                      ?>
                      <tr>
                        <th scope="row"><?php echo $row2['certificate_name']; ?></th>
                        <td><?php echo $row2['certificate_id']; ?></td>
                        <td><?php echo $row2['vehicle_id']; ?></td>
                        <td><?php echo $row2['plate_vehicle']; ?></td>
                        <td><?php echo $row2['valid']; ?></td>
                        <td><?php echo $row2['entity']; ?></td>
                        <td><?php echo $row2['value_pay']; ?></td>
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
      
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
  </body>
</html>
