<?php
include "ligaBD.php";
$liga = liga1();

if (isset($_GET['id'])) {
    $motoristaId = $_GET['id'];

    $sql = "SELECT * FROM busdrivers WHERE id_busdriver = $motoristaId";
    $resultado = mysqli_query($liga, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $motorista = mysqli_fetch_assoc($resultado);
    } else {
        echo "Motorista não encontrado.";
        exit;
    }
} else {
    echo "ID do motorista não fornecido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/neo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
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
          <li>
            <a href="./dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
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
          <li class="active">
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
        <div class="panel-header panel-header-sm">
        </div>

        
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Editar motorista</h4>
                </div>
                <div class="card-body">
                    <form action="atualizar_motorista.php" method="POST">
                        <input type="hidden" name="motoristaId" value="<?php echo $motorista['id_busdriver']; ?>">
                            <!-- Campos para edição -->
                            <div class="form-group">
                                <label for="phone">Telemóvel</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $motorista['phone_busdriver']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $motorista['name_busdriver']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $motorista['email_busdriver']; ?>">
                            </div>
                            <!-- Adicione outros campos conforme necessário -->

                            <button type="submit" class="btn btn-success" onclick="return confirmarEdit()">Salvar</button>

                            <!-- Botão de Cancelar -->
                            <a href="Lista_motoristas.php" class="btn btn-danger" onclick="return confirmCancel()">Cancelar</a>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function confirmarEdit(){
        return confirm("As alterações serão enviadas para a base de dados!");
    }

    function confirmCancel() {
        return confirm("Tem certeza que deseja cancelar? Todas as alterações não salvas serão perdidas.");
    }
    
</script>

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
