<?php
//1)hacer un insert
INSERT INTO `datos`(`NOMBRE`, `APELLIDO`, `FECHANAC`, `NACIONALIDAD`) VALUES ('NATALIA','NATALIA','19/09/2017','ARGENTINO')
//2) INSERTAR VARIOS
INSERT INTO `datos`(`NOMBRE`, `APELLIDO`, `FECHANAC`, `NACIONALIDAD`) VALUES ('MAXIMILIANO','VIDARTE','19/09/2017','ARGENTINO'),('MARTIN','PEREZ','11/11/1111','PERUANO'),('CHUCK','NORRIS','22/12/1222','ARGENTINO')
//3)BORRAR TODO
DELETE FROM `datos`
//4)BORRAR POR ID
DELETE FROM `datos` WHERE ID=6
//5)BORRAR POR NOMBRE 
DELETE FROM `datos` WHERE NOMBRE='MAXIMILIANO'
//6)UPDATE
DATE `datos` SET `NOMBRE`='JUAN'(CON ESTO SE CARGAN TODOS LOS NOMBRES DE LA TABLA)
//7)VER TODA LA TABLA
SELECT * FROM `datos`
//8)VER PARTE QUE QUIERO CON UN ALIAS
SELECT `NOMBRE` AS 'USUARIO', `APELLIDO`, `FECHANAC`, `NACIONALIDAD` FROM `datos` WHERE 1(CON EL ALIAS USUARIO LA TABLA NOMBRE ME FIGURA COMO USUARIO AUNQUE NO SE HAYA CREADO)
//9)TRAER RELACIONANDO TABLAS
select d.NOMBRE, l.DESCRIPCION
from datos as d , localidad as l
where d.LOCALIDAD= l.ID
CONSEJOs 
PRIMERO HACER EL FROM.
SEGUNDO CONFIGURAR BIEN EL WHERE.
?>