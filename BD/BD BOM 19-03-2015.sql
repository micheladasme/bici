

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
  cli_nick Varchar(80) NOT NULL,
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
  ped_total Int,
  ped_fecha Date,
  ped_mano_obra Int,
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
  com_id Int,
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
  cat_id Int,
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

-- Table Estado

CREATE TABLE Estado
(
  est_id Int NOT NULL AUTO_INCREMENT,
  est_nombre Varchar(40) NOT NULL,
 PRIMARY KEY (est_id)
)
;

-- Table Carro

CREATE TABLE Carro
(
  c_id Int NOT NULL AUTO_INCREMENT,
  c_codigo Int NOT NULL,
  c_nombre Varchar(200) NOT NULL,
  c_imagen Varchar(200) NOT NULL,
  c_cantidad Int NOT NULL,
  c_valor Int NOT NULL,
  c_peso Int NOT NULL,
  c_subtotal Int NOT NULL,
  c_cliente Int,
 PRIMARY KEY (c_id)
)
;

-- Table venta

CREATE TABLE venta
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

ALTER TABLE Pedido ADD CONSTRAINT Relationship31 FOREIGN KEY (est_id) REFERENCES Estado (est_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Gastos ADD CONSTRAINT Relationship19 FOREIGN KEY (tg_id) REFERENCES Tipo_Gastos (tg_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Producto_Ubicacion ADD CONSTRAINT Relationship18 FOREIGN KEY (suc_id) REFERENCES Sucursal (suc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Producto_Ubicacion ADD CONSTRAINT Relationship15 FOREIGN KEY (ubc_id) REFERENCES Ubicacion (ubc_id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE Detalle_Pedido ADD CONSTRAINT Relationship13 FOREIGN KEY (com_id) REFERENCES Pedido (ped_id) ON DELETE NO ACTION ON UPDATE NO ACTION
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

ALTER TABLE Productos ADD CONSTRAINT Relationship42 FOREIGN KEY (cat_id) REFERENCES Categorias (cat_id) ON DELETE NO ACTION ON UPDATE NO ACTION
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



-- INSERTS  

INSERT INTO `categorias` (`cat_id`, `cat_nombre`, `cat_descripcion`) VALUES
(1, 'Ruedas', 'Ruedas'),
(2, 'Cuadros', 'Cuadros'),
(3, 'Mochilas', 'Mochilas'),
(4, 'Brace', 'Brace'),
(5, 'Jofa', 'Jofa'),
(6, 'Rodillera', 'Rodillera'),
(7, 'Codera', 'Codera'),
(8, 'Bicicleta Nueva', 'Bicicleta Nueva'),
(9, 'Antiparrras', 'Antiparras'),
(10, 'Casco', 'Casco'),
(11, 'Manilla AG', 'Manilla AG'),
(12, 'Expansor', 'Expansor'),
(13, 'Corona', 'Corona'),
(14, 'Guia', 'Guia');


INSERT INTO `subcategoria` (`subcat_id`, `subcat_nombre`, `cat_id`) VALUES
(1, 'De Montaña', 1),
(2, 'Snaggletooth', 13),
(3, 'Super Pro', 13),
(4, 'MonoVeloce', 13),
(5, 'Downhill', 13);

INSERT INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_direccion`) VALUES
(1, 'Sucursal 1', 'Sucursal 1');

INSERT INTO `tipo_usuarios` (`tip_id`, `tip_descripcion`) VALUES
(1, 'Super Administrador'),
(2, 'Gerente'),
(3, 'Administrador Local'),
(4, 'Mecanico'),
(5, 'Vendedor');

INSERT INTO `marca` (`marca_id`, `marca_nombre`) VALUES 
(1, 'INTENSE'),
(2, 'ODI'),
(3, 'BLACKSPIRE'),
(4, 'LEATT'),
(5, 'XBRAND');

INSERT INTO `modo_pago` (`id_modo`, `tipo_modo`) VALUES 
(1, 'Efectivo'),
(2, 'Tarjeta');

INSERT INTO `productos`(`pro_cod`, `pro_nombre`, `pro_precio_venta`, `pro_precio_compra`, `pro_imagen`, `pro_peso`, `pro_talla`, `pro_color`, `pro_descripcion`, `pro_estado`, `cat_id`, `marca_id`) 
VALUES 
(00002,'UZZI ',3000,2100,NULL,20,'M','LIMA','DESCRIPCION2',1,2,1),
(00003,'TRACER CARBON 27,5',5000,3500,NULL,30,'S','NEGRO','DESCRIPCION3',1,2,1),
(00004,'M9',25000,17500,NULL,60,'M','PLATA','DESCRIPCION4',1,2,1),
(00005,'M9',50000,35000,NULL,80,'M','ROJO FLUOR','DESCRIPCION5',1,2,1),
(00006,'CARBINE SL ',22000,15400,NULL,35,'M','NEGRO ROJO','DESCRIPCION6',1,2,1),
(00007,'951',69690,48783,NULL,50,'M','PLATA','DESCRIPCION7',1,2,1),
(00008,'MOCHILA ENDURO ',70000,49000,NULL,20,'M','LIMA','DESCRIPCION8',1,3,4),
(00009,'LEATT BRACE ',7000,4900,NULL,30,'L','ROJO','DESCRIPCION9',1,4,4),
(00010,'LEATT BRACE ',5500,3850,NULL,60,'S','CARBON','DESCRIPCION10',1,4,4),
(00011,'LEATT BRACE ',4690,3283,NULL,80,'L','NEGRO','DESCRIPCION11',1,4,4),
(00012,'LEATT BRACE ',2200,1540,NULL,35,'L','CARBON','DESCRIPCION12',1,4,4),
(00013,'LEATT BRACE ',28900,20230,NULL,50,'L','BLANCO','DESCRIPCION13',1,4,4),
(00014,'JOFA',59000,41300,NULL,20,'U','NARANJA','DESCRIPCION14',1,5,4),
(00015,'JOFA',15000,10500,NULL,30,'U','AZUL','DESCRIPCION15',1,5,4),
(00016,'JOFA',17500,12250,NULL,60,'U','ROJA','DESCRIPCION16',1,5,4),
(00017,'LEATT BRACE ',18600,13020,NULL,80,'S','BLANCO','DESCRIPCION17',1,4,4),
(00018,'RODILLERA CANILLERA',3300,2310,NULL,35,'S','NEGRO','DESCRIPCION18',1,6,4),
(00019,'RODILLERA CANILLERA',42100,29470,NULL,50,'L','ROJO','DESCRIPCION19',1,6,4),
(00020,'CODERA KEVLAR',13700,9590,NULL,20,'L','BLANCO','DESCRIPCION20',1,7,4),
(00021,'RODILLERA KEVLAR',2000,1400,NULL,30,'L','NARANJA','DESCRIPCION21',1,6,4),
(00022,'RODILLERA KEVLAR',5000,3500,NULL,60,'S','AZUL','DESCRIPCION22',1,6,4),
(00023,'951 BOXXER RC2 X9 ELIX',3300,2310,NULL,20,'M','VERDE','DESCRIPCION23',1,8,1),
(00024,'UZZI 36 X9 ELIX',42100,29470,NULL,30,'M','ROJA','DESCRIPCION24',1,8,1),
(00025,'TRACER XFUSION ',13700,9590,NULL,60,'M','NARANJA','DESCRIPCION25',1,8,1),
(00026,'CARBINE 27,5 XT FOX 34',2000,1400,NULL,80,'M','ROJA','DESCRIPCION26',1,8,1),
(00027,'CARBINE 29 FULL',5000,3500,NULL,35,'M','NARANJA','DESCRIPCION27',1,8,1),
(00028,'CARBINE 26 ELIX SLX 32',2210,1547,NULL,20,'M','ROJA','DESCRIPCION28',1,8,1),
(00029,'HARD EDDIE XT 32',2210,1547,NULL,30,'M','NEGRA','DESCRIPCION29',1,8,1),
(00030,'ANTIPARRAS',10000,7000,NULL,50,'U','ROJAS','DESCRIPCION30',1,9,5),
(00031,'ANTIPARRAS',15000,10500,NULL,50,'U','AZUL','DESCRIPCION31',1,9,5),
(00032,'ANTIPARRAS',20000,14000,NULL,50,'U','AZUL','DESCRIPCION32',1,9,5),
(00033,'ANTIPARRAS',11000,7700,NULL,50,'U','BLANCA','DESCRIPCION33',1,9,5),
(00034,'ANTIPARRAS',12000,8400,NULL,50,'U','NARANJA','DESCRIPCION34',1,9,5),
(00035,'TROY LLE',30000,21000,NULL,50,'U','LIMA','DESCRIPCION35',1,10,2),
(00036,'TROY LLE',30000,21000,NULL,50,'U','NERGO','DESCRIPCION36',1,10,2),
(00037,'AG',70000,49000,NULL,200,'U','NARANJO','DESCRIPCION37',1,11,2),
(00038,'AG',70000,49000,NULL,200,'U','NEGRO','DESCRIPCION38',1,11,2),
(00039,'EXPANSOR ',90000,63000,NULL,200,'U','ROJO','DESCRIPCION39',1,12,2),
(00040,'CORONA SMAGGLETOOTH',50000,35000,NULL,300,'32T','NEGRA','DESCRIPCION40',1,13,3),
(00041,'CORONA SMAGGLETOOTH',50000,35000,NULL,300,'30T','AZUL','DESCRIPCION41',1,13,3),
(00042,'CORONA SMAGGLETOOTH',50000,35000,NULL,300,'30T','MORADA','DESCRIPCION42',1,13,3),
(00043,'CORONA SMAGGLETOOTH',50000,35000,NULL,300,'30T','VERDE','DESCRIPCION43',1,13,3),
(00044,'CORONA SMAGGLETOOTH',50000,35000,NULL,300,'30T','ROJA','DESCRIPCION44',1,13,3),
(00045,'CORONA SUPER PRO',25000,17500,NULL,300,'36T','VERDE','DESCRIPCION45',1,13,3),
(00046,'CORONA SUPER PRO',25000,17500,NULL,300,'22T','NEGRA','DESCRIPCION46',1,13,3),
(00047,'CORONA SUPER PRO',25000,17500,NULL,300,'34T','AZUL','DESCRIPCION47',1,13,3),
(00048,'CORONA SUPER PRO',25000,17500,NULL,300,'36T','AZUL','DESCRIPCION48',1,13,3),
(00049,'CORONA MONOVELOCE',44000,30800,NULL,300,'32T','NEGRA','DESCRIPCION49',1,13,3),
(00050,'CORONA DOWNHILL',36000,25200,NULL,300,'37T','NEGRA','DESCRIPCION50',1,13,3),
(00051,'CORONA DOWNHILL',36000,25200,NULL,300,'38T','NEGRA','DESCRIPCION51',1,13,3),
(00052,'RUEDA GUIA STINGER',30000,21000,NULL,300,'U','NEGRO','DESCRIPCION52',1,1,3),
(00053,'GUIA SUP EINFACH XDM',25000,17500,NULL,300,'32T-42T','NEGRA','DESCRIPCION53',1,14,3),
(00054,'GUIA SUP EINFACH XDM',25000,17500,NULL,300,'U','NEGRO','DESCRIPCION54',1,14,3),
(00055,'GUIA SUP EINFACH XDM',25000,17500,NULL,300,'U','BLANCA','DESCRIPCION55',1,14,3),
(00056,'GUIA DERGUIDE SLIDER',26000,18200,NULL,300,'U','NEGRA','DESCRIPCION56',1,14,3),
(00057,'GUIA DERGUIDE SLIDER',26000,18200,NULL,300,'U','BLANCA','DESCRIPCION57',1,14,3),
(00058,'GUIA DH ISC605 DERGUIDE',33000,23100,NULL,300,'36T-40T','NEGRO','DESCRIPCION58',1,14,3),
(00059,'GUIA DH ISC605 DERGUIDE',33000,23100,NULL,300,'36T-40T','BLANCO','DESCRIPCION59',1,14,3),
(00060,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,300,'36T-40T','BLANCO','DESCRIPCION60',1,14,3),
(00061,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,300,'32T-36T','BLANCO','DESCRIPCION61',1,14,3),
(00062,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,300,'32T-36T','AZUL','DESCRIPCION62',1,14,3),
(00063,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,300,'36T-40T','NEGRO','DESCRIPCION63',1,14,3),
(00064,'GUIA END ISCG05 TWENTY',31000,21700,NULL,300,'32T-36-T','NEGRO','DESCRIPCION64',1,14,3),
(00065,'GUIA END ISSCG OLD TRAILX',32000,22400,NULL,300,'32T-38T','NEGRO','DESCRIPCION65',1,14,3),
(00066,'GUIA END ISSCG OLD TRAILX',32000,22400,NULL,300,'32T-38T','BLANCO','DESCRIPCION66',1,14,3);




INSERT INTO `usuarios` (`usu_id`, `usu_nick`, `usu_clave`, `usu_nombre`, `usu_apellido`, `tip_id`, `suc_id`) VALUES
(1, 'mic.adasme', 'mic.adasme', 'Michel', 'Adasme', 1, 1),
(2, 'ale.llanos', 'ale.llanos', 'Alejandro', 'Llanos', 2, 1),
(3, 'local', 'local', 'Adm', 'Local', 3, 1),
(4, 'mecanico', 'mecanico', 'Señor', 'Mecanico', 4, 1),
(5, 'vendedor', 'vendedor', 'Señor', 'Vendedor', 5, 1);



INSERT INTO `noticias` (`not_id`, `not_titulo`,`not_subtitulo` ,`not_fecha`, `not_contenido`, `not_imagen`, `usu_id`) VALUES
(1, 'asdasdasd','asdasdasddasdasdasdasdasdas', '2015-03-06', 'asfñaskdjasdanlfkanl', NULL, 1);


INSERT INTO `region` (`region_id`, `region_nombre`, `region_orden`, `region_activo`) VALUES
(1, 'Región de Tarapacá', 0, 1),
(2, 'Región de Antofagasta', 0, 1),
(3, 'Región de Atacama', 0, 1),
(4, 'Región de Coquimbo', 0, 1),
(5, 'Región de Valparaiso', 0, 1),
(6, 'Región del Libertador General Bernardo O Higgins', 0, 1),
(7, 'Región del Maule', 0, 1),
(8, 'Región del Bío-Bío', 0, 1),
(9, 'Región de la Araucanía', 0, 1),
(10, 'Región de Los Lagos', 0, 1),
(11, 'Región de Aysén del General Carlos Ibáñez del Campo', 0, 1),
(12, 'Región de Magallanes y la Antártica Chilena', 0, 1),
(13, 'Región Metropolitana', 0, 1),
(14, 'Región de Los Ríos', 0, 1),
(15, 'Región de Arica y Parinacota', 0, 1);

INSERT INTO `comuna` (`comu_id`, `comu_nombre`, `region_id`) VALUES
(1, 'ARICA', 15),
(2, 'IQUIQUE', 1),
(3, 'HUARA', 1),
(4, 'PICA', 1),
(5, 'POZO ALMONTE', 1),
(6, 'TOCOPILLA', 2),
(7, 'ANTOFAGASTA', 2),
(8, 'MEJILLONES', 2),
(9, 'TALTAL', 2),
(10, 'CALAMA', 2),
(11, 'CHAÑARAL', 3),
(12, 'DIEGO DE ALMAGRO', 3),
(13, 'COPIAPO', 3),
(14, 'CALDERA', 3),
(15, 'TIERRA AMARILLA', 3),
(16, 'VALLENAR', 3),
(17, 'FREIRINA', 3),
(18, 'HUASCO', 3),
(19, 'LA SERENA', 4),
(20, 'LA HIGUERA', 4),
(21, 'COQUIMBO', 4),
(22, 'ANDACOLLO', 4),
(23, 'VICUÑA', 4),
(24, 'PAIHUANO', 4),
(25, 'OVALLE', 4),
(26, 'MONTE PATRIA', 4),
(27, 'PUNITAQUI', 4),
(28, 'RIO HURTADO', 4),
(29, 'COMBARBALA', 4),
(30, 'ILLAPEL', 4),
(31, 'CANELA', 4),
(32, 'SALAMANCA', 4),
(33, 'LOS VILOS', 4),
(34, 'VALPARAISO', 5),
(35, 'QUINTERO', 5),
(36, 'PUCHUNCAVI', 5),
(37, 'VIÑA DEL MAR', 5),
(38, 'QUILPUE', 5),
(39, 'VILLA ALEMANA', 5),
(40, 'CASABLANCA', 5),
(41, 'ISLA DE PASCUA', 5),
(42, 'SAN ANTONIO', 5),
(43, 'SANTO DOMINGO', 5),
(44, 'ALGARROBO', 5),
(45, 'EL QUISCO', 5),
(46, 'CARTAGENA', 5),
(47, 'EL TABO', 5),
(48, 'QUILLOTA', 5),
(49, 'LA CRUZ', 5),
(50, 'LA CALERA', 5),
(51, 'HIJUELAS', 5),
(52, 'NOGALES', 5),
(53, 'LIMACHE', 5),
(54, 'OLMUE', 5),
(55, 'PETORCA', 5),
(56, 'CABILDO', 5),
(57, 'PAPUDO', 5),
(58, 'ZAPALLAR', 5),
(59, 'LA LIGUA', 5),
(60, 'SAN FELIPE', 5),
(61, 'PUTAENDO', 5),
(62, 'PANQUEHUE', 5),
(63, 'CATEMU', 5),
(64, 'SANTA MARIA', 5),
(65, 'LLAY LLAY', 5),
(66, 'LOS ANDES', 5),
(67, 'CALLE LARGA', 5),
(68, 'RINCONADA', 5),
(69, 'SAN ESTEBAN', 5),
(70, 'SANTIAGO CENTRO', 13),
(71, 'LAS CONDES', 13),
(72, 'PROVIDENCIA', 13),
(73, 'SANTIAGO OESTE', 13),
(75, 'CONCHALI', 13),
(76, 'COLINA', 13),
(77, 'RENCA', 13),
(78, 'LAMPA', 13),
(79, 'QUILICURA', 13),
(80, 'TIL-TIL', 13),
(81, 'QUINTA NORMAL', 13),
(82, 'PUDAHUEL', 13),
(83, 'CURACAVI', 13),
(84, 'SANTIAGO SUR', 13),
(85, 'PEÑAFLOR', 13),
(86, 'TALAGANTE', 13),
(87, 'ISLA DE MAIPO', 13),
(88, 'MELIPILLA', 13),
(89, 'EL MONTE', 13),
(90, 'MARIA PINTO', 13),
(91, 'ÑUÑOA', 13),
(92, 'LA REINA', 13),
(93, 'LA FLORIDA', 13),
(94, 'MAIPU', 13),
(95, 'SAN MIGUEL', 13),
(96, 'LA CISTERNA', 13),
(97, 'LA GRANJA', 13),
(98, 'SAN BERNARDO', 13),
(99, 'CALERA DE TANGO', 13),
(100, 'PUENTE ALTO', 13),
(101, 'PIRQUE', 13),
(102, 'SAN JOSE DE MAIPO', 13),
(103, 'BUIN', 13),
(104, 'PAINE', 13),
(105, 'RANCAGUA', 6),
(106, 'MACHALI', 6),
(107, 'GRANEROS', 6),
(108, 'SAN PEDRO', 13),
(109, 'ALHUE', 13),
(110, 'CODEGUA', 6),
(111, 'SAN FRANCISCO DE MOSTAZAL', 6),
(112, 'DOÑIHUE', 6),
(113, 'COLTAUCO', 6),
(114, 'COINCO', 6),
(115, 'PEUMO', 6),
(116, 'LAS CABRAS', 6),
(117, 'SAN VICENTE', 6),
(118, 'PICHIDEGUA', 6),
(119, 'REQUINOA', 6),
(120, 'OLIVAR', 6),
(121, 'RENGO', 6),
(122, 'MALLOA', 6),
(123, 'QUINTA DE TILCOCO', 6),
(124, 'SAN FERNANDO', 6),
(125, 'CHIMBARONGO', 6),
(126, 'NANCAGUA', 6),
(127, 'PLACILLA', 6),
(128, 'SANTA CRUZ', 6),
(129, 'LOLOL', 6),
(130, 'PALMILLA', 6),
(131, 'PERALILLO', 6),
(132, 'CHEPICA', 6),
(133, 'PAREDONES', 6),
(134, 'MARCHIGUE', 6),
(135, 'PUMANQUE', 6),
(136, 'LITUECHE', 6),
(137, 'PICHILEMU', 6),
(138, 'NAVIDAD', 6),
(139, 'LA ESTRELLA', 6),
(140, 'CURICO', 7),
(141, 'ROMERAL', 7),
(142, 'TENO', 7),
(143, 'RAUCO', 7),
(144, 'HUALAÑE', 7),
(145, 'LICANTEN', 7),
(146, 'VICHUQUEN', 7),
(147, 'MOLINA', 7),
(148, 'SAGRADA FAMILIA', 7),
(149, 'RIO CLARO', 7),
(150, 'TALCA', 7),
(151, 'SAN CLEMENTE', 7),
(152, 'PELARCO', 7),
(153, 'PENCAHUE', 7),
(154, 'MAULE', 7),
(155, 'CUREPTO', 7),
(156, 'SAN JAVIER', 7),
(157, 'CONSTITUCION', 7),
(158, 'EMPEDRADO', 7),
(159, 'LINARES', 7),
(160, 'YERBAS BUENAS', 7),
(161, 'COLBUN', 7),
(162, 'LONGAVI', 7),
(163, 'VILLA ALEGRE', 7),
(164, 'PARRAL', 7),
(165, 'RETIRO', 7),
(166, 'CAUQUENES', 7),
(167, 'CHANCO', 7),
(168, 'CHILLAN', 8),
(169, 'PINTO', 8),
(170, 'COIHUECO', 8),
(171, 'PORTEZUELO', 8),
(172, 'QUIRIHUE', 8),
(173, 'TREHUACO', 8),
(174, 'NINHUE', 8),
(175, 'COBQUECURA', 8),
(176, 'SAN CARLOS', 8),
(177, 'SAN GREGORIO DE ÑIQUEN', 8),
(178, 'SAN FABIAN', 8),
(179, 'SAN NICOLAS', 8),
(180, 'BULNES', 8),
(181, 'SAN IGNACIO', 8),
(182, 'QUILLON', 8),
(183, 'YUNGAY', 8),
(184, 'PEMUCO', 8),
(185, 'EL CARMEN', 8),
(186, 'COELEMU', 8),
(187, 'RANQUIL', 8),
(188, 'CONCEPCION', 8),
(189, 'TALCAHUANO', 8),
(190, 'TOME', 8),
(191, 'PENCO', 8),
(192, 'HUALQUI', 8),
(193, 'FLORIDA', 8),
(194, 'CORONEL', 8),
(195, 'LOTA', 8),
(196, 'SANTA JUANA', 8),
(197, 'CURANILAHUE', 8),
(198, 'ARAUCO', 8),
(199, 'LEBU', 8),
(200, 'LOS ALAMOS', 8),
(201, 'CAÑETE', 8),
(202, 'CONTULMO', 8),
(203, 'TIRUA', 8),
(204, 'LOS ANGELES', 8),
(205, 'SANTA BARBARA', 8),
(206, 'QUILLECO', 8),
(207, 'YUMBEL', 8),
(208, 'CABRERO', 8),
(209, 'TUCAPEL', 8),
(210, 'LAJA', 8),
(211, 'SAN ROSENDO', 8),
(212, 'NACIMIENTO', 8),
(213, 'NEGRETE', 8),
(214, 'MULCHEN', 8),
(215, 'QUILACO', 8),
(216, 'ANGOL', 9),
(217, 'PUREN', 9),
(218, 'LOS SAUCES', 9),
(219, 'RENAICO', 9),
(220, 'COLLIPULLI', 9),
(221, 'ERCILLA', 9),
(222, 'TRAIGUEN', 9),
(223, 'LUMACO', 9),
(224, 'VICTORIA', 9),
(225, 'CURACAUTIN', 9),
(226, 'LONQUIMAY', 9),
(227, 'TEMUCO', 9),
(228, 'VILCUN', 9),
(229, 'FREIRE', 9),
(230, 'CUNCO', 9),
(231, 'LAUTARO', 9),
(232, 'GALVARINO', 9),
(233, 'PERQUENCO', 9),
(234, 'NUEVA IMPERIAL', 9),
(235, 'CARAHUE', 9),
(236, 'PUERTO SAAVEDRA', 9),
(237, 'PITRUFQUEN', 9),
(238, 'GORBEA', 9),
(239, 'TOLTEN', 9),
(240, 'LONCOCHE', 9),
(241, 'VILLARRICA', 9),
(242, 'PUCON', 9),
(243, 'VALDIVIA', 14),
(244, 'CORRAL', 14),
(245, 'MARIQUINA', 14),
(246, 'MAFIL', 14),
(247, 'LOS LAGOS', 14),
(248, 'FUTRONO', 14),
(249, 'LANCO', 14),
(250, 'PANGUIPULLI', 14),
(251, 'LA UNION', 14),
(252, 'PAILLACO', 14),
(253, 'RIO BUENO', 14),
(254, 'LAGO RANCO', 14),
(255, 'OSORNO', 10),
(256, 'PUYEHUE', 10),
(257, 'SAN PABLO', 10),
(258, 'PUERTO OCTAY', 10),
(259, 'RIO NEGRO', 10),
(260, 'PURRANQUE', 10),
(261, 'PUERTO MONTT', 10),
(262, 'COCHAMO', 10),
(263, 'MAULLIN', 10),
(264, 'LOS MUERMOS', 10),
(265, 'CALBUCO', 10),
(266, 'PUERTO VARAS', 10),
(267, 'LLANQUIHUE', 10),
(268, 'FRESIA', 10),
(269, 'FRUTILLAR', 10),
(270, 'CASTRO', 10),
(271, 'CHONCHI', 10),
(272, 'QUEILEN', 10),
(273, 'QUELLON', 10),
(274, 'PUQUELDON', 10),
(275, 'QUINCHAO', 10),
(276, 'CURACO DE VELEZ', 10),
(277, 'ANCUD', 10),
(278, 'QUEMCHI', 10),
(279, 'DALCAHUE', 10),
(280, 'CHAITEN', 10),
(281, 'FUTALEUFU', 10),
(282, 'PALENA', 10),
(284, 'COYHAIQUE', 11),
(285, 'AYSEN', 11),
(286, 'CISNES', 11),
(287, 'CHILE CHICO', 11),
(288, 'RIO IBAÑEZ', 11),
(289, 'COCHRANE', 11),
(290, 'PUNTA ARENAS', 12),
(291, 'PUERTO NATALES', 12),
(292, 'PORVENIR', 12),
(293, 'GENERAL LAGOS', 15),
(294, 'PUTRE', 15),
(295, 'CAMARONES', 15),
(296, 'CAMINA', 1),
(297, 'COLCHANE', 1),
(298, 'MARIA ELENA', 2),
(299, 'SIERRA GORDA', 2),
(300, 'OLLAGÜE', 2),
(301, 'SAN PEDRO DE ATACAMA', 2),
(302, 'ALTO DEL CARMEN', 3),
(303, 'ANTUCO', 8),
(304, 'MELIPEUCO', 9),
(305, 'CURARREHUE', 9),
(306, 'TEODORO SCHMIDT', 9),
(307, 'SAN JUAN DE LA COSTA', 10),
(308, 'HUALAIHUE', 10),
(309, 'GUAITECAS', 11),
(310, 'O´HIGGINS', 11),
(311, 'TORTEL', 11),
(312, 'LAGO VERDE', 11),
(313, 'TORRES DEL PAINE', 12),
(314, 'RIO VERDE', 12),
(315, 'SAN GREGORIO', 12),
(316, 'LAGUNA BLANCA', 12),
(317, 'PRIMAVERA', 12),
(318, 'TIMAUKEL', 12),
(319, 'NAVARINO', 12),
(320, 'PELLUHUE', 7),
(321, 'JUAN FERNANDEZ', 5),
(322, 'PEÑALOLEN', 13),
(323, 'MACUL', 13),
(324, 'CERRO NAVIA', 13),
(325, 'LO PRADO', 13),
(326, 'SAN RAMON', 13),
(327, 'LA PINTANA', 13),
(328, 'ESTACION CENTRAL', 13),
(329, 'RECOLETA', 13),
(330, 'INDEPENDENCIA', 13),
(331, 'VITACURA', 13),
(332, 'LO BARNECHEA', 13),
(333, 'CERRILLOS', 13),
(334, 'HUECHURABA', 13),
(335, 'SAN JOAQUIN', 13),
(336, 'PEDRO AGUIRRE CERDA', 13),
(337, 'LO ESPEJO', 13),
(338, 'EL BOSQUE', 13),
(339, 'PADRE HURTADO', 13),
(340, 'CONCON', 5),
(341, 'SAN RAFAEL', 7),
(342, 'CHILLAN VIEJO', 8),
(343, 'SAN PEDRO DE LA PAZ', 8),
(344, 'CHIGUAYANTE', 8),
(345, 'PADRE LAS CASAS', 9),
(346, 'ALTO HOSPICIO', 1);

INSERT INTO `cliente` (`cli_id`, `cli_rut`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_telefono`, `cli_correo`, `cli_nick`, `cli_pass`, `comu_id`) VALUES
(1, 180647945, 'Michel', 'Adasme', 'Las Guias 7555, Naltagua', '51194592', 'mic.adasme@gmail.com', 'mic.adasme', '12345', 87);

INSERT INTO `ubicacion` VALUES
(1, 'Tienda'),
(2, 'Bodega');

INSERT INTO `estado_servicio` VALUES
(1, 'En Reparacion'),
(2, 'Listo Para Entrega'),
(3, 'Entregado Y Completado');

INSERT INTO `estado` VALUES
(1, 'Solo Creacion'),
(2, 'Enviado, Esperando Aprobacion'),
(3, 'En Proceso de Armado'),
(4, 'Listo Para Entrega'),
(5, 'Entregado Y Completado');
