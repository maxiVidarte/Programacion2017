<?php 
include "Clases/Estacionamiento.php";
include "Clases/Vehiculo.php";

$patente = $_POST['patente'];
$accion = $_POST['accion'];

$Auto = new Vehiculo($patente);
estacionamiento::$accion($Auto);

?>