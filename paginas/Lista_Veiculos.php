<?php
  include "ligaBD.php";
  $liga1 = liga1();
  
  $sql = "SELECT * 
  FROM vehicles 
  JOIN european_vehicles_license ON  european_vehicles_license.id_european_vehicle_license = vehicles.european_vehicle_license_id
  JOIN kid_vehicles_license ON  kid_vehicles_license.id_kid_vehicle_license = vehicles.kid_vehicle_license_id
  JOIN vehicles_certificate ON vehicles_certificate.id_vehicle_certificate = vehicles.vehicle_certificate_id
  JOIN vehicles_inspection ON  vehicles_inspection.id_vehicle_inspection = vehicles.vehicle_inspection_id
  JOIN tacographs_vehicle ON  tacographs_vehicle.id_tacograph_vehicle = vehicles.tacograph_vehicle_id;";


  
  $resultado = mysqli_query($liga1, $sql);
  if(mysqli_num_rows($resultado)>0){
   
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/neo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    NEOapp
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />

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

</head>

<body class="">
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
          <li>
            <a href="./Monitoramento_autocarros.php">
              <i class="now-ui-icons transportation_bus-front-12"></i>
              <p>Monitoramento de Autocarros</p>
            </a>
          </li>
          <li class="active">
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
      
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
               
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th scope="col" class="text-center">Nº</th>
                      <th scope="col" class="text-center">Inspeção</th>
                      <th scope="col" class="text-center">Certificado</th>
                      <th scope="col" class="text-center">Licença europeia</th>
                      <th scope="col" class="text-center">Licença crianças</th>
                      <th scope="col" class="text-center">Tacógrafo</th>
                  
                    </thead>
                    <tbody>
                      <?php
                      
                    
                        while ($row = mysqli_fetch_assoc($resultado)) {
                      ?>
                          <tr>
                            <th scope="row" class="text-center"><?php echo $row['id_vehicle']; ?></th>
                            <td class="text-center"><?php echo $row['valid_vehicle_inspection']; ?></td>
                            <td class="text-center"><?php echo $row['valid_vehicle_certificate']; ?></td>
                            <td class="text-center"><?php echo $row['valid_european_vehicle_license']; ?></td>
                            <td class="text-center"><?php echo $row['valid_kid_vehicle_license']; ?></td>
                            <td class="text-center"><?php echo $row['valid_tacograph_vehicle']; ?></td>
                  
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
  </div>
  
</body>

</html>


<?php
    
  }else{
    echo "Não há resultados";
  }  


?>