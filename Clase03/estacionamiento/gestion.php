<?php 
     include_once "./clases/estacionamiento.php";
     include_once "./clases/vehiculo.php";
     $patente = $_POST['patente'];
     $accion = $_POST['accion'];

     //var_dump($patente);
     //var_dump($accion);
    //var_dump($_GET);
    //var_dump($_POST);
    //var_dump($_FILES);
    /*
        si la accion es guardar, pasar el vehiculo al metodo guardar de estacionamiento, 
        de ser sacar se llamara al metodo sacar de estacionamiento pasandole el vehiculo como parametro
    */
    $Auto = new vehiculo($patente);
    $Auto->fechIngreso = date("Y-m-d H:i:s");
    //estacionamiento::guardar($Auto);
    estacionamiento::$accion($Auto);
?>