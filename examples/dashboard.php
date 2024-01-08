<?php
include "ligaBD.php";
$liga1 = liga1();

$sql = "SELECT * FROM messages";

$resultado = mysqli_query($liga1, $sql);
if (mysqli_num_rows($resultado) > 0) {
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
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
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
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3 class="navbar-brand" href="#pablo">Custo com licenças dos autocarros para o próximo ano (12 meses)</h3>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-lg">
        <?php include 'grafico.php'; ?>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Mensagens</h4>
              </div>
              <div class="card-body">

                <?php
                while ($row = mysqli_fetch_assoc($resultado)) {
                  $messageId = $row['id_message'];
                  $message = $row['message'];
                  $status = $row['message_status'];
                  $alertClass = $status ? 'alert-secondary' : 'alert-warning';
                ?>
                  <div class="alert <?php echo $alertClass; ?> alert-with-icon d-flex justify-content-between align-items-center" data-notify="container">
                    <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                    <span data-notify="message" style="901d22"><?php echo $message; ?></span>
                    <div class="d-flex align-items-center">
                      <form class="mark-as-read-form" method="post" action="marcar_como_lida.php">
                        <input type="hidden" name="messageId" value="<?php echo $messageId; ?>">
                        <button type="button" aria-hidden="true" class="close mr-2 mark-as-read-button">
                          <i class="now-ui-icons ui-1_check"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Core JS Files -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Google Maps Plugin -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!-- Notifications Plugin -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function () {
      $(".mark-as-read-button").click(function () {
        // Envia a solicitação POST quando o botão é clicado
        $(this).closest("form").submit();
      });
    });
  </script>
</body>

</html>

<?php

} else {
  echo "Não há resultados";
}
?>
