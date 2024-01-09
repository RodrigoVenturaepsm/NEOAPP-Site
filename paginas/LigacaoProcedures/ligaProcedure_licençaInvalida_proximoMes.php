<?php
include_once "ligaBD.php";

$liga1 = liga1(); 


$license_name = ""; 
$license_id = ""; 
$name_busdriver = ""; 
$phone_busdriver = ""; 
$valid = ""; 
$entity = ""; 
$value_pay = "";

$sql = "CALL license_invalid_next_month()";

$result = $liga1->query($sql);


// Feche a conexão
$liga1->close();


?>