

-- Create tables section -------------------------------------------------

-- Table Cliente

CREATE TABLE Cliente
(
  cli_id Int NOT NULL AUTO_INCREMENT,
  cli_rut Int NOT NULL,
  cli_nombre Varchar(30) NOT NULL,
  cli_apellido Varchar(30) NOT NULL,
  cli_direccion Varchar(120) NOT NULL,
  cli_telefono Varchar(20) NOT NULL,
  cli_correo Varchar(80),
  cli_pass Varchar(80) NOT NULL,
  comu_id Int,
 PRIMARY KEY (cli_id)
)
;

-- Table Pedido

CREATE TABLE Pedido
(
  ped_id Int NOT NULL AUTO_INCREMENT,
  ped_subtotal Int,
  ped_peso Int,
  ped_total Int,
  ped_fecha Date,
  ped_mano_obra Int,
  ped_imagen Varchar(5000),
  ped_detalle Varchar(500),
  cli_id Int,
  usu_id Int,
  id_modo Int,
  est_id Int,
  suc_id Int,
 PRIMARY KEY (ped_id)
)
;


-- Table Compra

CREATE TABLE Compra
(
  com_id Int NOT NULL AUTO_INCREMENT,
  com_total Int,
  com_fecha Date,
  com_nula Int,
  usu_id Int,
  id_modo Int,
 PRIMARY KEY (com_id)
)
;

-- Table Comuna

CREATE TABLE Comuna
(
  comu_id Int NOT NULL AUTO_INCREMENT,
  comu_nombre Varchar(40) NOT NULL,
  region_id Int,
 PRIMARY KEY (comu_id)
)
;

-- Table Modo_Pago

CREATE TABLE Modo_Pago
(
  id_modo Int NOT NULL AUTO_INCREMENT,
  tipo_modo Varchar(30) NOT NULL,
 PRIMARY KEY (id_modo)
)
;

-- Table Usuarios

CREATE TABLE Usuarios
(
  usu_id Int NOT NULL AUTO_INCREMENT,
  usu_nick Varchar(20) NOT NULL,
  usu_clave Varchar(30) NOT NULL,
  usu_nombre Varchar(50) NOT NULL,
  usu_apellido Varchar(50) NOT NULL,
  tip_id Int,
  suc_id Int,
 PRIMARY KEY (usu_id)
)
;

-- Table Tipo_Usuarios

CREATE TABLE Tipo_Usuarios
(
  tip_id Int NOT NULL AUTO_INCREMENT,
  tip_descripcion Varchar(50) NOT NULL,
 PRIMARY KEY (tip_id)
)
;

-- Table Detalle_Pedido

CREATE TABLE Detalle_Pedido
(
  det_id Int NOT NULL AUTO_INCREMENT,
  det_cantidad Int NOT NULL,
  det_subtotal Int NOT NULL,
  ped_id Int,
  pro_cod Varchar(14),
 PRIMARY KEY (det_id)
)
;

-- Table Sucursal

CREATE TABLE Sucursal
(
  suc_id Int NOT NULL AUTO_INCREMENT,
  suc_nombre Varchar(100) NOT NULL,
  suc_direccion Varchar(120) NOT NULL,
 PRIMARY KEY (suc_id)
)
;

-- Table Gastos

CREATE TABLE Gastos
(
  gas_id Int NOT NULL AUTO_INCREMENT,
  gas_fecha Date NOT NULL,
  gas_monto Int NOT NULL,
  gas_descripcion Varchar(200) NOT NULL,
  suc_id Int,
  tg_id Int,
 PRIMARY KEY (gas_id)
)
;

-- Table Detalle_Compra

CREATE TABLE Detalle_Compra
(
  det_id Int NOT NULL AUTO_INCREMENT,
  det_cantidad Int NOT NULL,
  det_subtotal Int NOT NULL,
  com_id Int,
  pro_cod Varchar(14),
 PRIMARY KEY (det_id)
)
;

-- Table Productos

CREATE TABLE Productos
(
  pro_cod Varchar(14) NOT NULL,
  pro_nombre Varchar(200) NOT NULL,
  pro_precio_venta Int NOT NULL,
  pro_precio_compra Int NOT NULL,
  pro_imagen Varchar(200),
  pro_peso Int NOT NULL,
  pro_talla Varchar(10),
  pro_color Varchar(10),
  pro_descripcion Varchar(500),
  pro_estado Int NOT NULL,
  subcat_id Int,
  marca_id Int,
 PRIMARY KEY (pro_cod)
)
;

-- Table Ubicacion

CREATE TABLE Ubicacion
(
  ubc_id Int NOT NULL AUTO_INCREMENT,
  ubc_descripcion Varchar(50) NOT NULL,
 PRIMARY KEY (ubc_id)
)
;

-- Table Producto_Ubicacion

CREATE TABLE Producto_Ubicacion
(
  ubc_id Int NOT NULL,
  pu_id Int NOT NULL AUTO_INCREMENT,
  pu_cantidad Int NOT NULL,
  suc_id Int NOT NULL,
  pro_cod Varchar(14) NOT NULL,
  pu_para Varchar(2) NOT NULL,
  PRIMARY KEY (pu_id)

)
;


-- Table Categorias

CREATE TABLE Categorias
(
  cat_id Int NOT NULL AUTO_INCREMENT,
  cat_nombre Varchar(50) NOT NULL,
  cat_descripcion Varchar(100),
 PRIMARY KEY (cat_id)
)
;

-- Table Tipo_Gastos

CREATE TABLE Tipo_Gastos
(
  tg_id Int NOT NULL AUTO_INCREMENT,
  tg_descripcion Varchar(50) NOT NULL,
 PRIMARY KEY (tg_id)
)
;

-- Table Estado_Armado

CREATE TABLE Estado_Armado
(
  est_id Int NOT NULL AUTO_INCREMENT,
  est_nombre Varchar(40) NOT NULL,
 PRIMARY KEY (est_id)
)
;

-- Table tmp_armado

CREATE TABLE Tmp_armado
(
  arm_id Int NOT NULL AUTO_INCREMENT,
  arm_codigo Int NOT NULL,
  arm_nombre Varchar(200) NOT NULL,
  arm_imagen Varchar(200) NOT NULL,
  arm_cantidad Int NOT NULL,
  arm_valor Int NOT NULL,
  arm_peso Int NOT NULL,
  arm_subtotal Int NOT NULL,
  arm_cliente Int,
 PRIMARY KEY (arm_id)
)
;

-- Table venta

CREATE TABLE Venta
(
  v_id Int NOT NULL AUTO_INCREMENT,
  v_codigo Varchar(30) NOT NULL,
  v_nombre Varchar(1000) NOT NULL,
  v_cantidad Int NOT NULL,
  v_valor Int NOT NULL,
  v_subtotal Int NOT NULL,
  v_vendedor Int NOT NULL,
 PRIMARY KEY (v_id)
)
;

-- Table Subcategoria

CREATE TABLE Subcategoria
(
  subcat_id Int NOT NULL AUTO_INCREMENT,
  subcat_nombre Varchar(50) NOT NULL,
  cat_id Int,
 PRIMARY KEY (subcat_id)
)
;

-- Table Servicio

CREATE TABLE Servicio
(
  ser_id Int NOT NULL AUTO_INCREMENT,
  ser_documento Varchar(200) NOT NULL,
  ser_total int NOT NULL,
  ser_fecha_ingreso Date NOT NULL,
  ser_fecha_entrega Date NOT NULL,
  cli_id Int,
  est_ser_id Int,
 PRIMARY KEY (ser_id)
)
;

-- Table Estado_Servicio

CREATE TABLE Estado_Servicio
(
  est_ser_id Int NOT NULL AUTO_INCREMENT,
  est_ser_nombre Varchar(40) NOT NULL,
 PRIMARY KEY (est_ser_id)
)
;

-- Table Caja

CREATE TABLE Caja
(
  caja_id Int NOT NULL AUTO_INCREMENT,
  caja_fecha Date,
  caja_hora_inicio Time,
  caja_hora_termino Time,
  caja_inicial Int,
  caja_final Int,
  usu_id Int,
 PRIMARY KEY (caja_id)
)
;

-- Table Region

CREATE TABLE Region
(
  region_id Int NOT NULL,
  region_nombre Varchar(300) NOT NULL,
  region_orden Int NOT NULL,
  region_activo Int NOT NULL,
  PRIMARY KEY (region_id)

)
;


-- Table Noticias

CREATE TABLE Noticias
(
  not_id Int NOT NULL AUTO_INCREMENT,
  not_titulo Varchar(140) NOT NULL,
  not_subtitulo Varchar(200),
  not_contenido Varchar(1000) NOT NULL,
  not_imagen Varchar(100),
  not_fecha Date NOT NULL,
  usu_id Int,
 PRIMARY KEY (not_id)
)
;


-- Table Marca

CREATE TABLE Marca
(
  marca_id Int NOT NULL AUTO_INCREMENT,
  marca_nombre Varchar(100) NOT NULL,
 PRIMARY KEY (marca_id)
)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE Subcategoria ADD CONSTRAINT Relationship33 FOREIGN KEY (cat_id) REFERENCES Categorias (cat_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Pedido ADD CONSTRAINT Relationship31 FOREIGN KEY (est_id) REFERENCES Estado_Armado (est_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Gastos ADD CONSTRAINT Relationship19 FOREIGN KEY (tg_id) REFERENCES Tipo_Gastos (tg_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Producto_Ubicacion ADD CONSTRAINT Relationship18 FOREIGN KEY (suc_id) REFERENCES Sucursal (suc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Producto_Ubicacion ADD CONSTRAINT Relationship15 FOREIGN KEY (ubc_id) REFERENCES Ubicacion (ubc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Detalle_Pedido ADD CONSTRAINT Relationship13 FOREIGN KEY (ped_id) REFERENCES Pedido (ped_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Usuarios ADD CONSTRAINT Relationship11 FOREIGN KEY (suc_id) REFERENCES Sucursal (suc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Gastos ADD CONSTRAINT Relationship9 FOREIGN KEY (suc_id) REFERENCES Sucursal (suc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Usuarios ADD CONSTRAINT Relationship5 FOREIGN KEY (tip_id) REFERENCES Tipo_Usuarios (tip_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Pedido ADD CONSTRAINT Relationship4 FOREIGN KEY (id_modo) REFERENCES Modo_Pago (id_modo) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Pedido ADD CONSTRAINT Relationship3 FOREIGN KEY (usu_id) REFERENCES Usuarios (usu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Pedido ADD CONSTRAINT Relationship1 FOREIGN KEY (cli_id) REFERENCES Cliente (cli_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Servicio ADD CONSTRAINT Relationship36 FOREIGN KEY (cli_id) REFERENCES Cliente (cli_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Servicio ADD CONSTRAINT Relationship37 FOREIGN KEY (est_ser_id) REFERENCES Estado_Servicio (est_ser_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Caja ADD CONSTRAINT Relationship38 FOREIGN KEY (usu_id) REFERENCES Usuarios (usu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Pedido ADD CONSTRAINT Relationship39 FOREIGN KEY (suc_id) REFERENCES Sucursal (suc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Producto_Ubicacion ADD CONSTRAINT Relationship40 FOREIGN KEY (pro_cod) REFERENCES Productos (pro_cod) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Detalle_Pedido ADD CONSTRAINT Relationship41 FOREIGN KEY (pro_cod) REFERENCES Productos (pro_cod) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Productos ADD CONSTRAINT Relationship42 FOREIGN KEY (subcat_id) REFERENCES Subcategoria (subcat_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Comuna ADD CONSTRAINT Relationship44 FOREIGN KEY (region_id) REFERENCES Region (region_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Cliente ADD CONSTRAINT Relationship45 FOREIGN KEY (comu_id) REFERENCES Comuna (comu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Compra ADD CONSTRAINT Relationship47 FOREIGN KEY (usu_id) REFERENCES Usuarios (usu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Compra ADD CONSTRAINT Relationship48 FOREIGN KEY (id_modo) REFERENCES Modo_Pago (id_modo) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Detalle_Compra ADD CONSTRAINT Relationship49 FOREIGN KEY (com_id) REFERENCES Compra (com_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Detalle_Compra ADD CONSTRAINT Relationship50 FOREIGN KEY (pro_cod) REFERENCES Productos (pro_cod) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Noticias ADD CONSTRAINT Relationship51 FOREIGN KEY (usu_id) REFERENCES Usuarios (usu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Productos ADD CONSTRAINT Relationship54 FOREIGN KEY (marca_id) REFERENCES Marca (marca_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;



