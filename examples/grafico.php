<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Resultado da Forecast</title>

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
    } else {
        echo "Erro na execução das consultas: " . $conn->error;
    }
    ?>

    <canvas id="monthlyChart" width="850" height="145"></canvas>

    <style>
    #monthlyChart {
        color: white;
    }
    #monthlyChart * {
        color: white;
    }
</style>

<script>
    // Extrai os valores mensais para o gráfico
    let monthlyValues = <?php echo json_encode(array_values($results)); ?>;

    // Configuração do gráfico
    let ctx = document.getElementById('monthlyChart').getContext('2d');
    let monthlyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mês 1', 'Mês 2', 'Mês 3', 'Mês 4', 'Mês 5', 'Mês 6', 'Mês 7', 'Mês 8', 'Mês 9', 'Mês 10', 'Mês 11', 'Mês 12'],
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
                title: {
                    display: true,
                    text: 'Título do Gráfico',
                    font: {
                        size: 16
                    }
                }
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
