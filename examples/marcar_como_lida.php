<?php
include "ligaBD.php";
$liga1 = liga1();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $messageId = $_POST['messageId'];

  // Atualize o status da mensagem para lida no banco de dados
  $updateSql = "UPDATE messages SET message_status = true WHERE id_message = $messageId";
  mysqli_query($liga1, $updateSql);

  // Exibir mensagem de sucesso ou erro após a mensagem ser marcada como lida
  echo "
    <script>
      alert('Mensagem lida com sucesso');
      document.location.href = './dashboard.php';
    </script>
  ";
} else {
  // Responda com uma mensagem de erro se a solicitação não for do tipo POST
  echo "
    <script>
      alert('Não há mensagens');
      document.location.href = './dashboard.php';
    </script>
  
  ";
}
?>
