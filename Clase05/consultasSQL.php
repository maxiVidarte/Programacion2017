<?php 
//UNA VEZ CREADA LAS TABLAS SE HACEN LOS INSERT
//PROVEEEDORES
INSERT INTO `PROVEEDORES`(`NUMERO`, `NOMBRE`, `DOMICILIO`, `LOCALIDAD`) 
VALUES (100,'PEREZ','PERON 876','QUILMES'),
(101,'GIMENEZ','MITRE 750','AVELLANEDA'),
(102,'AGUIRRE','BOEDO 634','BERNAL')
//PRODUCTOS
INSERT INTO `PRODUCTOS`(`PNUMERO`, 'PNOMBRE`, `PRECIO`, `TAMAÑO`) '
VALUES (1,'CARAMELOS','1.5','CHICO'),
(2,'CIGARRILLOS','45.89','MEDIANO'),
(3,'GASEOSA','15.80','GRANDE')
//ENVIOS
INSERT INTO `envios`(`NUMERO`, `PNUMERO`, `CANTIDAD`) 
VALUES (100,1,500),
(100,1,1500),
(100,3,100),
(101,2,55),
(101,3,225),
(102,1,600),
(102,3,300)
//EJERCICIO 03 CONSULTAS
1) SELECT * FROM `productos` ORDER BY productos.PNOMBRE ASC
2) SELECT * FROM `proveedores` WHERE LOCALIDAD='QUILMES'
3) SELECT * FROM `envios` WHERE CANTIDAD>=200 AND CANTIDAD<=300  o SELECT * FROM `envios` WHERE CANTIDAD BETWEEN 200 and 300
4) SELECT SUM(CANTIDAD) FROM `envios`
5) SELECT PNUMERO FROM `envios` LIMIT 3
6) SELECT proveedores.nombre as proveedores, productos.PNOMBRE as productos FROM `envios`,`productos`, `proveedores` WHERE envios.NUMERO= proveedores.NUMERO AND productos.PNUMERO= envios.PNUMERO
7) SELECT Cantidad,precio,(Cantidad * Precio) FROM `envios`,`productos`
8) SELECT SUM(envios.Cantidad) as 'cantidad total' FROM envios WHERE envios.numero = 102 and envios.pNumero=1
9) SELECT productos.pNumero FROM productos inner JOIN envios on envios.pNumero= productos.pNumero INNER JOIN proveedores on envios.Numero = proveedores.Numero where proveedores.Localidad= 'Avellaneda'
10)SELECT proveedores.Domicilio as Domicilio,proveedores.Localidad as localidades FROM proveedores WHERE proveedores.Localidad LIKE '%i%'
11)INSERT INTO `productos`(`pNumero`, `pNombre`, `Precio`, `Tamaño`) VALUES (4,'CHOCOLATE','25.35','CHICO')
12)INSERT INTO `proveedores`(`Numero`, `Nombre`, `Domicilio`, `Localidad`) VALUES (103,'Norris','Oyuela 898','Lanus')
13)INSERT INTO `proveedores`(`Numero`, `Nombre`, `Domicilio`, `Localidad`) VALUES (107,'Rosales','','La Plata')
14)UPDATE `productos` SET `Precio`='97.50' WHERE productos.Tamaño='Grande'
15)
?>