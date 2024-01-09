<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';


// Inclusão do nosso ficheiro ligaBD
include "ligaBD.php";
$liga = liga1();

// Consulta SQL para obter os e-mails dos motoristas
$sql = "SELECT email_busdriver FROM busdrivers";
$result = $liga->query($sql);

// Exibir os e-mails em uma lista suspensa
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["email_busdriver"] . "'>" . $row["email_busdriver"] . "</option>";
  }
}

// Lista de palavras proibidas
$palavrasProibidas = array("Cara...", "Mer...", "Fod...", "Fd...");

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])) {
    // Verifica palavrões na mensagem
    $mensagem = $_POST['mensagem'];

    foreach ($palavrasProibidas as $palavraProibida) {
        if (stripos($mensagem, $palavraProibida) !== false) {
            echo "
                <script>
                    alert('Mensagem contém palavrões. Por favor, se nos quer enviar alguma mensagem, altere a linguagem!');
                    document.location.href = './Enviar.php';
                </script>
            ";
            exit;
        }
    }

    $mail = new PHPMailer(true);

    $mail->isSMTP(); // Modo de envio de email
    $mail->Host = 'smtp.gmail.com'; // Servidor de smtp da Google
    $mail->SMTPAuth = true; // Requisição de Autenticação   
    $mail->Username = 'movimento.3t@gmail.com'; // Gmail username
    $mail->Password = 'vhplpeqtktzyukjq'; // Gmail appPassword
    $mail->SMTPSecure = 'ssl'; // Modo de segurança de transmissão de dados
    $mail->Port = 465;

    $mail->setFrom("movimento.3t@gmail.com", "3T Movimento");

    // Adiciona os e-mails conforme selecionado no formulário
    if (isset($_POST["Email"]) && in_array($_POST["Email"], $emails)) {
        $mail->addAddress($_POST["Email"]);
    }
    if (isset($_POST["Emailcc"])) {
        $mail->addCC($_POST["Emailcc"]);
    }
    if (isset($_POST["Emailbcc"])) {
        $mail->addBCC($_POST["Emailbcc"]);
    }

    $mail->isHTML(true);

    $mail->Subject = $_POST["Assunto"];
    $mail->Body = $_POST['mensagem'];

    try {
        $mail->send();
        echo "
            <script>
                alert('Enviado com sucesso');
                document.location.href = './Enviar.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "
            <script>
                alert('Erro no envio: {$mail->ErrorInfo}');
            </script>
        ";
    }
}
?>
