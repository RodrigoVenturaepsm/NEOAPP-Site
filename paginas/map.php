<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/neo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  
  <!-- Core JS Files -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <!-- Leaflet Routing Machine JS -->
  <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages, etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
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
          <li class="active">
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
      <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            
            
          </div>
          
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm"></div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              
              <div class="card-body ">
                <h1>Mapa</h1>

                <!-- Campos para a localização e destino -->
                <label for="start">Localização:</label>
                <input type="text" id="start" placeholder="Insira sua localização">

                <label for="end">Destino:</label>
                <input type="text" id="end" placeholder="Insira o destino">

                <!-- Botão para calcular a rota -->
                <button id="calculateButton">Calcular Rota</button>

                <!-- Mapa onde a rota será exibida -->
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


  <!-- Your custom scripts -->
  <script>
    var map, routingControl;

    function initMap() {
      // Verifica se o mapa já foi inicializado
      if (map) {
        console.warn("Map is already initialized.");
        return;
      }

      // Inicializa o mapa
      map = L.map('map').setView([39.238155, -8.686417],13);

      // Adiciona camada de mapa do OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Adiciona controle de rota
      routingControl = L.Routing.control({
        waypoints: [
          
        ],
        routeWhileDragging: true
      }).addTo(map);

      // Adiciona evento para calcular a rota quando o botão for clicado
      document.getElementById('calculateButton').addEventListener('click', function () {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;

        routingControl.setWaypoints([
          
        ]);

        
      });
    }

    // Chama a função initMap() após o carregamento completo do DOM
    document.addEventListener("DOMContentLoaded", function () {
      // Carrega o script da biblioteca de roteamento
      var routingScript = document.createElement('script');
      routingScript.src = 'https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js';
      routingScript.onload = function () {
        initMap();
      };
      document.head.appendChild(routingScript);
    });
  </script>


  
</body>

</html>
