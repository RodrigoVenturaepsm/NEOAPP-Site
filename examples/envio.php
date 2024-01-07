<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

// Lista de palavras proibidas
$palavrasProibidas = array("Caralho", "Merda", "Fodasse",);

if (isset($_POST["send"])) {
    
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
    $mail->SMTPAuth = true; // Requesição de Autenticação   
    $mail->Username = 'rodrigonana3@gmail.com'; // Gmail username
    $mail->Password = 'phbqwptqyzbeptny'; // Gmail appPassword
    $mail->SMTPSecure = 'ssl'; // Modo de segurança de transmição de dados
    $mail->Port = 465;

    $mail->setFrom($_POST["email"], $_POST["primeiro_nome"] . ' ' . $_POST["segundo_nome"]);
    $mail->addAddress('rodrigonana3@gmail.com'); 
    $mail->addReplyTo($_POST["email"], $_POST["primeiro_nome"] . ' ' . $_POST["segundo_nome"]);
    $mail->isHTML(true);


    $mail->Body = <<<EOT
    Primeiro Nome: {$_POST['primeiro_nome']}.<br>
    Segundo Nome: {$_POST['segundo_nome']}.<br>
    Email: {$_POST['email']}.<br>
    Mensagem: {$_POST['mensagem']}


    EOT;
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
