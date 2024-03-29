<?php
include "ligaBD.php";
$liga = liga1();

// Consulta SQL para obter os e-mails da base de dados
$sql = "SELECT email FROM sua_tabela_de_emails";
$result = $conn->query($sql);

// Exibir os e-mails em uma lista suspensa
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["email"] . "'>" . $row["email"] . "</option>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data (preventing SQL injection)
    $phone = ($_POST['phone']);
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    // Validate input data (add more validation as needed)
    if (empty($phone) || empty($name) || empty($email) || empty($password)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Assuming busdriver_license_id and busdriver_license_ability_id accept NULL values
    $sql = "INSERT INTO busdrivers (phone_busdriver, name_busdriver, email_busdriver, password_app_busdriver, busdriver_license_id, busdriver_license_ability_id) 
    VALUES ('$phone', '$name', '$email', '$password', 1,1)";

    if (mysqli_query($liga, $sql)) {
        header("Location: Lista_motoristas.php");
        exit;
    } else {
        // Log the error
        error_log("Erro ao criar motorista: " . mysqli_error($liga));
        echo "Erro ao criar motorista. Por favor, tente novamente mais tarde.";
    }
}
?>
