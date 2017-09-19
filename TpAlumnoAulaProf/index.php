<?php 
include_once "./Alumno.php";
include_once "./Persona.php";
include_once "./Aula.php";
include_once "./Instituto.php";

$instituto = new Instituto("Los Pitagoricos");
$alum1 = new Alumno("maximiliano","vidarte","masculino",1234);
$alum2 = new Alumno("cintia","rifici","femenino",1235);
$alum3 = new Alumno("chuck","norris","masculino",1);
$profe1 = new Profesor("Steven","Seagal","masculino",2);
$profe2 = new Profesor("Keanu","reeves","masculino",3);
$aula1 = new Aula("Programacion");
$aula1->AgregarAlumno($alum1);
$aula1->AgregarAlumno($alum2);
$aula1->AgregarAlumno($alum3);
$aula1->AgregarProfesor($profe1);
$aula1->AgregarProfesor($profe2);
$aula2 = new Aula("Laboratorio");
$aula3 = new Aula("Ingles");
$instituto->AgregarAula($aula1);
$aula2->AgregarAlumno($alum1);
$aula2->AgregarProfesor($profe1);
$aula3->AgregarProfesor($profe1);
$instituto->AgregarAula($aula2);
$instituto->AgregarAula($aula3);


//$instituto->AlumnoEnAulaNyA("maximiliano","vidarte");
//$instituto->AlumnoPorLibreta(1235);
//$instituto->ProfesoresPorLegajo(2);
//$instituto->AlumnoCantidadPorLibreta(1234);
//$instituto->PersonaPorApellidoEnAulas("norris");
$instituto->CantidadYListadoConMismoApNomSex("maximiliano","vidarte","masculino");
?>