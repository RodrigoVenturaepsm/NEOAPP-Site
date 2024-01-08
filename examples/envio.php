<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';

    // Lista de palavras proibidas
    $palavrasProibidas = array("Cara...", "Mer...", "Fod...", "Fd...");

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
        $mail->Username = 'movimento.3t@gmail.com'; // Gmail username
        $mail->Password = 'vhplpeqtktzyukjq'; // Gmail appPassword
        $mail->SMTPSecure = 'ssl'; // Modo de segurança de transmição de dados
        $mail->Port = 465;

        $mail->setFrom("movimento.3t@gmail.com", "3T Movimento");
        $mail->addAddress($_POST["Email"]); 
        $mail->addCC($_POST["Emailcc"]);
        $mail->addBCC($_POST["Emailbcc"]);
        $mail->isHTML(true);


        /* <<<EOT*/
        $mail->Subject = ($_POST["Assunto"]);

        $mail->Body = ($_POST['mensagem']);
        
        //EOT;
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
