<?php
include "ligaBD.php";

if (isset($_GET['id'])) {
    $busdriverId = $_GET['id'];

    $liga = liga1();

    // Excluir registros associados na tabela type_busdrivers
    $sqlDeleteTypeBusdrivers = "DELETE FROM type_busdrivers WHERE busdriver_id = $busdriverId";
    mysqli_query($liga, $sqlDeleteTypeBusdrivers);

    // Excluir registros associados na tabela inspect_forms
    $sqlDeleteInspectForms = "DELETE FROM inspect_forms WHERE busdriver_id = $busdriverId";
    mysqli_query($liga, $sqlDeleteInspectForms);

    // Excluir o motorista
    $sqlDeleteBusdriver = "DELETE FROM busdrivers WHERE id_busdriver = $busdriverId";

    if (mysqli_query($liga, $sqlDeleteBusdriver)) {
        echo "Registro excluído com sucesso!";
        // Redirecionar de volta para a página Lista_motoristas.php
        header("Location: Lista_motoristas.php");
        exit();
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($liga);
        die();
    }

    mysqli_close($liga);
} else {
    echo "ID do motorista não fornecido.";
}
?>
