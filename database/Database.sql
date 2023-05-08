CREATE DATABASE carstore;
USE carstore;

CREATE TABLE automoviles
(
	idautomovil			INT AUTO_INCREMENT PRIMARY KEY,
	marca 				VARCHAR(30) 	NOT NULL,
	modelo 				VARCHAR(30) 	NOT NULL,
	precio				DECIMAL(9,2) NOT NULL,
	tipocombustible	VARCHAR(20) NOT NULL,
	color					VARCHAR(30) NOT NULL,
	create_at			DATETIME NOT NULL DEFAULT NOW(),
	update_ut			DATETIME NULL,

	CONSTRAINT uk_automovil_marca_modelo UNIQUE (marca, modelo)
)ENGINE = INNODB;

DELIMITER $$
CREATE PROCEDURE spu_listar_automoviles()
BEGIN	
	SELECT * FROM automoviles;
END $$


DELIMITER $$
CREATE PROCEDURE spu_crear_automovil(
_marca VARCHAR(30),
_modelo VARCHAR(30),
_precio DECIMAL(9,2),
_tipocombustible  VARCHAR(20),
_color				VARCHAR(30)
)
BEGIN	
	INSERT INTO automoviles(marca,modelo, precio, tipocombustible, color) 
	VALUES (_marca, _modelo, _precio, _tipocombustible, _color);
END $$

DELIMITER $$
CREATE PROCEDURE spu_obtener_automovil(
_idautomovil INT
)
BEGIN	
	SELECT * FROM automoviles WHERE idautomovil = _idautomovil;
END $$

DELIMITER $$
CREATE PROCEDURE spu_editar_automovil(
_marca VARCHAR(30),
_modelo VARCHAR(30),
_precio DECIMAL(9,2),
_tipocombustible  VARCHAR(20),
_color				VARCHAR(30),
_idautomovil		INT
)
BEGIN	
	UPDATE automoviles SET marca = _marca , modelo = _modelo, precio = _precio, tipocombustible = _tipocombustible, color = _color
	WHERE idautomovil = _idautomovil;
	
END $$


CALL spu_editar_automovil('Kia', "modelo editado", 3000, "Gasolina premiun", "negro", 36)
CALL  spu_crear_automovil("Nisan", "Camry", 20000, 'GNV', "blanco");
