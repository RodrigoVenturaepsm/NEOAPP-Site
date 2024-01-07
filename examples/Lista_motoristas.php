<?php
  include "ligaBD.php";
  $liga = liga1();
  
  $sql = "SELECT * FROM busdrivers ORDER BY id_busdriver" ;

  $resultado = mysqli_query($liga, $sql);
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
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
                <div class="row">
                  <div class="col-md-8">
                      <h4 class="card-title">Listagem dos motoristas</h4>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="criar_motorista.php" class="btn btn-info float-right">Criar motorista</a>
                  </div>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">

                      <th scope="col">id condutor</th>
                      <th scope="col">Telemóvel</th>
                      <th scope="col">Password da app do condutor</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Email do condutor</th>
                      <th scope="col">id da licença do condutor</th>
                      <th scope="col">id da licença da abilitação do condutor</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                    </thead>
                    <tbody>
                      <?php
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($resultado)) {
                      ?>
                      
                          <tr>
                            <th scope="row"><?php echo $counter++; ?></th>
                            <td><?php echo $row['phone_busdriver']; ?></td>
                            <td><input type="password" value="<?php echo $row['password_app_busdriver']; ?>" readonly></td>
                            <td><?php echo $row['name_busdriver']; ?></td>
                            <td><?php echo $row['email_busdriver']; ?></td>
                            <td><?php echo $row['busdriver_license_id']; ?></td>
                            <td><?php echo $row['busdriver_license_ability_id']; ?></td>
                            <td><a href="Editar_motorista.php?id=<?php echo $row['id_busdriver']; ?>" class="btn btn-warning">Editar</a></td>
                            <td><button type="button" class="btn btn-danger" onclick="deleteBusdriver(<?php echo $row['id_busdriver']; ?>)">Eliminar</button></td>
                            
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

  <script>
    
    function deleteBusdriver(busdriverId) {
        if (confirm("Tem certeza que deseja excluir este motorista?")) {
            // Se o usuário confirmar, chame o PHP para excluir
            window.location.href = "delete_motorista.php?id=" + busdriverId;
        } else {
            alert("Exclusão cancelada pelo usuário.");
        }
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

<?php
    
  }else{
    echo "Não há resultados";
  }  


?>