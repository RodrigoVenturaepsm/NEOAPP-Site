<?php
include_once "ligaBD.php";

$liga1 = liga1(); 

$certificate_name = ""; 
$certificate_id = ""; 
$vehicle_id = ""; 
$plate_vehicle = ""; 
$valid = ""; 
$entity = ""; 
$value_pay = "";


$certificate_name = mysqli_real_escape_string($liga1, $certificate_name);
$plate_vehicle = mysqli_real_escape_string($liga1, $plate_vehicle);

$sql = "CALL certificate_invalid_current_month()";

$result = $liga1->query($sql);


// Feche a conexão
$liga1->close();


?>
