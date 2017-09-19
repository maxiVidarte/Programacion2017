<?php 
include_once "./Clases/Policia.php";
include_once "./Clases/Persona.php";
Persona::Saludar2();
Persona::Saludar();
$persona = new Persona("pepe");
$persona->Saludar();
$persona->Saludar2();
?>