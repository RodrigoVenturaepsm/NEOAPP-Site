<?php
include "ligaBD.php";
$liga = liga1();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO busdrivers (phone_busdriver, name_busdriver, email_busdriver, password_app_busdriver) 
            VALUES ('$phone', '$name', '$email', '$password')";

    if (mysqli_query($liga, $sql)) {
        header("Location: Lista_motoristas.php");
        exit;
    } else {
        echo "Erro ao criar motorista: " . mysqli_error($liga);
    }
}
?>
