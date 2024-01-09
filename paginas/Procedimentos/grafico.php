<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Adiciona a biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


    <?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "neoapp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Chama a procedure e recupera os resultados
    $sql = "CALL annual_certificate_forecast_case();";
    $sql_result = "SELECT month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12 FROM your_result_table;";

    // Executa ambas as consultas em uma chamada
    if ($conn->multi_query($sql . $sql_result)) {
        // Resultados da procedure
        $conn->next_result();

        // Recupera os resultados
        $result = $conn->store_result();

        // Armazena os resultados em um array associativo
        $results = array();
        if ($result->num_rows > 0) {
            $results = $result->fetch_assoc();
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        $month_1 = $results['month_1'];
        $month_2 = $results['month_2'];
        $month_3 = $results['month_3'];
        $month_4 = $results['month_4'];
        $month_5 = $results['month_5'];
        $month_6 = $results['month_6'];
        $month_7 = $results['month_7'];
        $month_8 = $results['month_8'];
        $month_9 = $results['month_9'];
        $month_10 = $results['month_10'];
        $month_11 = $results['month_11'];
        $month_12 = $results['month_12'];
    } else {
        echo "Erro na execução das consultas: " . $conn->error;
    }
    ?>

    <canvas id="monthlyChart" width="1100" height="145"></canvas>

 

<script>
    // Extrai os valores mensais para o gráfico
    let monthlyValues = <?php echo json_encode(array_values($results)); ?>;

    
    // Configuração do gráfico
    let ctx = document.getElementById('monthlyChart').getContext('2d');
    let monthlyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $month_1;?> , <?php echo $month_2;?>, <?php echo $month_3;?>, <?php echo $month_4;?>, <?php echo $month_5;?>, <?php echo $month_6;?>, <?php echo $month_7;?>, <?php echo $month_8;?>, <?php echo $month_9;?>, <?php echo $month_10;?>, <?php echo $month_11;?>, <?php echo $month_12;?>],
            datasets: [{
                label: 'Valor Acumulado',
                data: monthlyValues,
                backgroundColor: 'rgba(4, 191, 138, 1)',
                borderColor: 'rgba(4, 191, 138, 1)',
                borderWidth: 1,
            }]

        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                
            },
            elements: {
                bar: {
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                }
            }
        }
    });
</script>


</body>
</html>
