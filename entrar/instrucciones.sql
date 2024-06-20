/*   GRABACIONES, INSERTAR    */

INSERT INTO tabla (c1,c2,c3) VALUES ('v1','v2','v3');

------------------------------------*****************INSERTAR EJERCICIO - Mi nombre en una tabla llamada equipo******************------------------------------------

INSERT INTO equipo (equip_name) VALUES ('Miguelonsio');

------------------------------------*****************INSERTAR EJERCICIO - Tabla personal, nombre, apellidos y edad profesor ******************-----------------------

INSERT INTO personal (personal_name, personal_apellido1, personal_apellido2, teacher_age) VALUES ('Alfonso','Carro','Morris','18');

------------------------------------*****************INSERTAR EJERCICIO - Mi nombre en una tabla llamada equipo******************------------------------------------

/*   CONSULTAS   */

SELECT * FROM tabla;

SELECT campo FROM tabla;

SELECT campo1, campo2, campo3 FROM tabla;

------------------------------------*****************CONSULTAS EJERCICIO - Todos los Datos tabla equipo******************------------------------------------

SELECT * FROM equipo;

------------------------------------*****************CONSULTAS EJERCICIO - nombre y primer apellido de tabla personal******************------------------------------------

SELECT nombre,primer_apellido FROM personal;

------------------------------------*****************CONSULTAS EJERCICIO - nombre de personas cuya edad es > 30******************------------------------------------

SELECT nombre FROM personal WHERE personal_age > 30;


SELECT nombre, primer_apellido FROM personal WHERE personal_age <= 35 AND location = 'Cambre';

SELECT * FROM personal WHERE nombre LIKE '%maría%' AND location = 'Oleiros' AND personal_age = 40;



/*            ORDENANDO INFORMACION              */



SELECT * FROM tabla ORDER BY campo ASC 

SELECT * FROM tabla ORDER BY rand()

/*     LIMITANDO     */

SELECT * FROM tabla LIMIT cantidad

------------------------------------*****************10 productos al azar de la categoria televisores pero que su precio sea inferior a 500 lereles******************------------------------------------

SELECT * FROM productos WHERE categoria = 'televisor' AND precio < 500 ORDER BY rand() LIMIT 10;

------------------------------------***************** todas las personas que se llamen ANA y sean de cambre o que se llamen Juan y sean de Oleiros         ******************------------------------------------

SELECT * FROM personal WHERE (name = 'Ana' AND location = 'Cambre') OR (name = 'Juan' AND location = 'Oleiros');


/*  CONSULTA SACANDO DATOS DE CUENTA O SUMAS   */


SELECT COUNT(campo) AS CUENTA FROM tabla 

SELECT COUNT(*) FROM CAMPO

SELECT SUM(campo) AS suma FROM tabla

SELECT SUM(campo * campo) AS suma FROM tabla

SELECT SUM(*) AS suma, campo1, campo2 FROM tabla

SELECT AVG(campo) AS promedio FROM tabla



/*  AGRUPACIONES */


SELECT * FROM tabla GROUP BY campo

/*       UNIONEs        */

SELECT * FROM usuarios INNER JOIN direcciones USING(id_usu);

SELECT * FROM usuarios INNER JOIN direcciones USING(id_usu) INNER JOIN provincia USING (id_prov)

SELECT * FROM usuarios INNER JOIN metodos USING(id_usu)

SELECT * FROM usuarios u INNER JOIN carro USING(id_usu) INNER JOIN dentro (id_car) INNER JOIN productos p USING(id_pro) INNER JOIN imagenes i ON p.id_pro = i.id_pro




SELECT * FROM usuarios u INNER JOIN direcciones USING(id_usu) INNER JOIN metodos m ON  u.id_usu = m.id_usu ;


SELECT u.nom, p.name FROM usuarios u INNER JOIN metodos m USING(id_usu) INNER JOIN tarjetas t ON t.id_tar = m.id_tar INNER JOIN productos  



/****       ACTUALIZAR         ****/


UPDATE productos SET precio = '50' WHERE product_id=6;

UPDATE direcciones SET localidad_dir = "Muros" WHERE localidad_dir = "muros";

-- Actualizar provincia del usuario numero 5

UPDATE direcciones d SET "d.id_prov" = 4 WHERE id_usu = 5;

-- Borrar 

DELETE FROM dentro WHERE id_car = 16; 
DELETE FROM car WHERE id_car = 16;