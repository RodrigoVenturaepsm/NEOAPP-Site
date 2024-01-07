<?php
include "ligaBD.php"; // Certifique-se de incluir o arquivo que faz a conexão com o banco de dados

$liga = liga(); // Certifique-se de que a função 'liga()' está definida no arquivo ligaBD.php


$mounth_1 = 0;
$mounth_2 = 0;
$mounth_3 = 0;
$mounth_4 = 0;
$mounth_5 = 0;
$mounth_6 = 0;
$mounth_7 = 0;
$mounth_8 = 0;
$mounth_9 = 0;
$mounth_10 = 0;
$mounth_11 = 0;
$mounth_12 = 0;

$sql = "CALL teste_annual_certificate_forecast_case('$mounth_1', '$mounth_2', '$mounth_3', '$mounth_4', '$mounth_5', '$mounth_6', '$mounth_7', '$mounth_8', '$mounth_9', '$mounth_10', '$mounth_11', '$mounth_12')";
$result = $liga1->query($sql);

// Execute a chamada da sua procedure
//$query = "CALL teste_annual_certificate_forecast_case()";
//mysqli_query($liga, $query);

// Feche a conexão
mysqli_close($liga);

echo json_encode($resultados);
?>