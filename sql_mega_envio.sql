CREATE  TABLE  cliente(
    id_cliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 codigo VARCHAR(20),
    nombre_cliente VARCHAR(20),
    apellido_cliente VARCHAR(20),
    telefono_cliente INT,
    dni int(20)
);

CREATE TABLE cuenta(
	id_cuenta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_cliente INT, /* fk id_cliente */
    id_tipo_banco INT(11), /* fk id_tipo_banco */ 
    num_cuenta VARCHAR(255),
    nombre_titular_cuenta VARCHAR(20),
    apellido_titular_cuenta VARCHAR(20),
    cedula_titular_cuenta INT(11)
);
  
CREATE TABLE transferencias(
	id_transferencia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fecha DATE,
    importe_titular INT,
    id_cuenta_destino INT, /* fk ID_CUENTA_DESTINO */
    importe_cliente INT,
    id_medio_pago_cliente INT/* fk MEDIO DE PAGO */
);

CREATE TABLE medios_de_pago (
	id_medios_de_pago INT PRIMARY KEY NOT NULL,
    medio_de_pago VARCHAR(15)
    );

CREATE TABLE banco (
	id_banco INT PRIMARY KEY NOT NULL,
	tipo_banco  VARCHAR(10) NULL
);

CREATE TABLE gastos (
  id_gasto INT PRIMARY KEY NOT NULL,
  fecha_gasto DATE,
  importe_gasto INT NULL,
  motivo_gasto VARCHAR(45) NULL
);

CREATE TABLE usuarios (
   id_usuarios INT PRIMARY KEY NOT NULL,
   email VARCHAR(255) NULL,
   pass VARCHAR(32) NOT NULL,
   create_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
   );

CREATE TABLE tasa (
   id INT PRIMARY KEY NOT NULL auto_increment,
   valor INT 
   );


 ALTER TABLE cuenta ADD CONSTRAINT fk_cliente_id
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente);

 ALTER TABLE cuenta ADD CONSTRAINT fk_banco_id
    FOREIGN KEY (id_tipo_banco) REFERENCES banco(id_banco); 

 ALTER TABLE transferencias ADD CONSTRAINT fk_cuenta_id
    FOREIGN KEY (id_cuenta_destino) REFERENCES cuenta(id_cuenta); 

 ALTER TABLE transferencias ADD CONSTRAINT fk_medios_de_pago_id
    FOREIGN KEY (id_medio_pago_cliente) REFERENCES medios_de_pago(id_medios_de_pago); 