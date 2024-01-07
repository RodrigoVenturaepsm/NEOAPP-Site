<?php
include "ligaBD.php";
$liga = liga1();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motoristaId = $_POST['motoristaId'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Adicione mais campos conforme necessário

    $sql = "UPDATE busdrivers SET phone_busdriver = '$phone', name_busdriver = '$name', email_busdriver = '$email' WHERE id_busdriver = $motoristaId";

    if (mysqli_query($liga, $sql)) {
        header("Location: Lista_motoristas.php");
        exit;
    } else {
        echo "Erro ao atualizar motorista: " . mysqli_error($liga);
    }
}
?>
