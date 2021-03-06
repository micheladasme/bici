-- INSERTS  

INSERT INTO `categorias` (`cat_id`, `cat_nombre`, `cat_descripcion`) VALUES
(1, 'Ruedas', 'Ruedas'),
(2, 'Cuadros', 'Cuadros'),
(3, 'Bicicleta Nueva', 'Bicicleta Nueva'),
(4, 'Manilla AG', 'Manilla AG'),
(5, 'Expansor', 'Expansor'),
(6, 'Corona', 'Corona'),
(7, 'Guia', 'Guia'),
(8, 'Piñones', 'Piñones'),
(9, 'Cambios', 'Cambios'),
(10, 'Horquilla', 'Horquilla'),
(11, 'Asiento', 'Asiento'),
(12, 'Biela', 'Biela'),
(13, 'Pedal', 'Pedal'),
(14, 'Manubrio', 'Manubrio'),
(15, 'Frenos', 'Frenos'),
(16, 'Cadena', 'Cadena'),
(17, 'Accesorios Rider', 'Accesorios Rider'),
(18, 'Accesorios Bicicleta', 'Accesorios Bicicleta');


INSERT INTO `subcategoria` (`subcat_id`, `subcat_nombre`, `cat_id`) VALUES
(1, 'Llanta', 1),
(2, 'Neumaticos', 1),
(3, 'De Cassette', 8),
(4, 'De Rosca', 8),
(5, 'Cambio Trasero', 9),
(6, 'Guia', 9),
(7, 'Mando Cambio', 9),
(8, 'Horquilla', 10),  
(9, 'Sillin', 11),
(10, 'Tija', 11),
(11, 'Platos', 12),
(12, 'Cadena', 16),
(13, 'Pedal', 13),
(14, 'Manubrio', 14),
(15, 'Manillar', 14),
(16, 'Grips', 14),
(17, 'Pastilla', 15),
(18, 'Disco', 15),
(19, 'Con Suspencion Trasera', 2),
(20, 'Sin Suspencion Trasera', 2),
(21, 'Biela', 12),
(22, 'Brace', 17),
(23, 'Jofa', 17),
(24, 'Rodillera', 17),
(25, 'Codera', 17),
(26, 'Antiparrras', 17),
(27, 'Casco', 17),
(28, 'Mochilas', 17),
(29, 'Otros', 18);



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

INSERT INTO `productos`(`pro_cod`, `pro_nombre`, `pro_precio_venta`, `pro_precio_compra`, `pro_imagen`, `pro_peso`, `pro_talla`, `pro_color`, `pro_descripcion`, `pro_estado`, `subcat_id`, `marca_id`) 
VALUES 
(00002,'UZZI ',3000,2100,NULL,197,'M','LIMA','DESCRIPCION2',1,19,1),
(00003,'TRACER CARBON 27,5',5000,3500,NULL,508,'S','NEGRO','DESCRIPCION3',1,19,1),
(00004,'M9',25000,17500,NULL,232,'M','PLATA','DESCRIPCION4',1,19,1),
(00005,'M9',50000,35000,NULL,612,'M','ROJO FLUOR','DESCRIPCION5',1,19,1),
(00006,'CARBINE SL ',22000,15400,NULL,658,'M','NEGRO ROJO','DESCRIPCION6',1,19,1),
(00007,'951',69690,48783,NULL,582,'M','PLATA','DESCRIPCION7',1,19,1),
(00008,'MOCHILA ENDURO ',70000,49000,NULL,106,'M','LIMA','DESCRIPCION8',1,28,4),
(00009,'LEATT BRACE ',7000,4900,NULL,395,'L','ROJO','DESCRIPCION9',1,22,4),
(00010,'LEATT BRACE ',5500,3850,NULL,183,'S','CARBON','DESCRIPCION10',1,22,4),
(00011,'LEATT BRACE ',4690,3283,NULL,232,'L','NEGRO','DESCRIPCION11',1,22,4),
(00012,'LEATT BRACE ',2200,1540,NULL,654,'L','CARBON','DESCRIPCION12',1,22,4),
(00013,'LEATT BRACE ',28900,20230,NULL,166,'L','BLANCO','DESCRIPCION13',1,22,4),
(00014,'JOFA',59000,41300,NULL,399,'U','NARANJA','DESCRIPCION14',1,23,4),
(00015,'JOFA',15000,10500,NULL,408,'U','AZUL','DESCRIPCION15',1,23,4),
(00016,'JOFA',17500,12250,NULL,356,'U','ROJA','DESCRIPCION16',1,23,4),
(00017,'LEATT BRACE ',18600,13020,NULL,520,'S','BLANCO','DESCRIPCION17',1,22,4),
(00018,'RODILLERA CANILLERA',3300,2310,NULL,319,'S','NEGRO','DESCRIPCION18',1,24,4),
(00019,'RODILLERA CANILLERA',42100,29470,NULL,784,'L','ROJO','DESCRIPCION19',1,24,4),
(00020,'CODERA KEVLAR',13700,9590,NULL,695,'L','BLANCO','DESCRIPCION20',1,25,4),
(00021,'RODILLERA KEVLAR',2000,1400,NULL,101,'L','NARANJA','DESCRIPCION21',1,24,4),
(00022,'RODILLERA KEVLAR',5000,3500,NULL,233,'S','AZUL','DESCRIPCION22',1,24,4),
(00023,'951 BOXXER RC2 X9 ELIX',3300,2310,NULL,334,'M','VERDE','DESCRIPCION23',1,29,1),
(00024,'UZZI 36 X9 ELIX',42100,29470,NULL,466,'M','ROJA','DESCRIPCION23',1,29,1),
(00025,'TRACER XFUSION ',13700,9590,NULL,214,'M','NARANJA','DESCRIPCION23',1,29,1),
(00026,'CARBINE 27,5 XT FOX 34',2000,1400,NULL,666,'M','ROJA','DESCRIPCION23',1,29,1),
(00027,'CARBINE 29 FULL',5000,3500,NULL,268,'M','NARANJA','DESCRIPCION23',1,29,1),
(00028,'CARBINE 26 ELIX SLX 32',2210,1547,NULL,541,'M','ROJA','DESCRIPCION23',1,29,1),
(00029,'HARD EDDIE XT 32',2210,1547,NULL,301,'M','NEGRA','DESCRIPCION23',1,29,1),
(00030,'ANTIPARRAS',10000,7000,NULL,614,'U','ROJAS','DESCRIPCION23',1,26,5),
(00031,'ANTIPARRAS',15000,10500,NULL,755,'U','AZUL','DESCRIPCION23',1,26,5),
(00032,'ANTIPARRAS',20000,14000,NULL,738,'U','AZUL','DESCRIPCION23',1,26,5),
(00033,'ANTIPARRAS',11000,7700,NULL,521,'U','BLANCA','DESCRIPCION23',1,26,5),
(00034,'ANTIPARRAS',12000,8400,NULL,390,'U','NARANJA','DESCRIPCION23',1,26,5),
(00035,'TROY LLE',30000,21000,NULL,339,'U','LIMA','DESCRIPCION23',1,10,2),
(00036,'TROY LLE',30000,21000,NULL,659,'U','NERGO','DESCRIPCION23',1,10,2),
(00037,'AG',70000,49000, 'imagenes/ag1_azul.jpg',281,'U','NARANJO','DESCRIPCION23',1,16,2),
(00038,'AG',70000,49000, 'imagenes/ag1_naranjo.jpg',706,'U','NEGRO','DESCRIPCION23',1,16,2),
(00039,'EXPANSOR ',90000,63000,NULL,604,'U','ROJO','DESCRIPCION23',1,26,2),
(00040,'CORONA SMAGGLETOOTH',50000,35000,NULL,775,'32T','NEGRA','DESCRIPCION23',1,26,3),
(00041,'CORONA SMAGGLETOOTH',50000,35000,NULL,139,'30T','AZUL','DESCRIPCION23',1,26,3),
(00042,'CORONA SMAGGLETOOTH',50000,35000,NULL,452,'30T','MORADA','DESCRIPCION23',1,26,3),
(00043,'CORONA SMAGGLETOOTH',50000,35000,NULL,793,'30T','VERDE','DESCRIPCION23',1,26,3),
(00044,'CORONA SMAGGLETOOTH',50000,35000,NULL,173,'30T','ROJA','DESCRIPCION23',1,26,3),
(00045,'CORONA SUPER PRO',25000,17500,NULL,434,'36T','VERDE','DESCRIPCION23',1,26,3),
(00046,'CORONA SUPER PRO',25000,17500,NULL,588,'22T','NEGRA','DESCRIPCION23',1,26,3),
(00047,'CORONA SUPER PRO',25000,17500,NULL,442,'34T','AZUL','DESCRIPCION23',1,26,3),
(00048,'CORONA SUPER PRO',25000,17500,NULL,606,'36T','AZUL','DESCRIPCION23',1,26,3),
(00049,'CORONA MONOVELOCE',44000,30800,NULL,397,'32T','NEGRA','DESCRIPCION23',1,26,3),
(00050,'CORONA DOWNHILL',36000,25200,NULL,115,'37T','NEGRA','DESCRIPCION23',1,26,3),
(00051,'CORONA DOWNHILL',36000,25200,NULL,722,'38T','NEGRA','DESCRIPCION23',1,26,3),
(00052,'RUEDA GUIA STINGER',30000,21000,NULL,744,'U','NEGRO','DESCRIPCION23',1,26,3),
(00053,'GUIA SUP EINFACH XDM',25000,17500,NULL,465,'32T-42T','NEGRA','DESCRIPCION23',1,26,3),
(00054,'GUIA SUP EINFACH XDM',25000,17500,NULL,779,'U','NEGRO','DESCRIPCION23',1,26,3),
(00055,'GUIA SUP EINFACH XDM',25000,17500,NULL,436,'U','BLANCA','DESCRIPCION23',1,26,3),
(00056,'GUIA DERGUIDE SLIDER',26000,18200,NULL,421,'U','NEGRA','DESCRIPCION23',1,26,3),
(00057,'GUIA DERGUIDE SLIDER',26000,18200,NULL,192,'U','BLANCA','DESCRIPCION23',1,26,3),
(00058,'GUIA DH ISC605 DERGUIDE',33000,23100,NULL,719,'36T-40T','NEGRO','DESCRIPCION23',1,26,3),
(00059,'GUIA DH ISC605 DERGUIDE',33000,23100,NULL,102,'36T-40T','BLANCO','DESCRIPCION23',1,26,3),
(00060,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,449,'36T-40T','BLANCO','DESCRIPCION23',1,26,3),
(00061,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,202,'32T-36T','BLANCO','DESCRIPCION23',1,26,3),
(00062,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,693,'32T-36T','AZUL','DESCRIPCION23',1,26,3),
(00063,'GUIA DH ISCG OLD DERGUIDE',19000,13300,NULL,643,'36T-40T','NEGRO','DESCRIPCION23',1,26,3),
(00064,'GUIA END ISCG05 TWENTY',31000,21700,NULL,504,'32T-36-T','NEGRO','DESCRIPCION23',1,26,3),
(00065,'GUIA END ISSCG OLD TRAILX',32000,22400,NULL,643,'32T-38T','NEGRO','DESCRIPCION23',1,26,3),
(00066, 'NEUMATICO 1',32000,22400, 'imagenes/neumatico 1.png',576,'32T-38T','BLANCO','DESCRIPCION23',1,2,3),
(00067, 'NEUMATICO 2',20851,21091, 'imagenes/neumatico 2.png',533,NULL,'BLANCO','DESCRIPCION23',1,2,1),
(00068, 'NEUMATICO 3',39351,16458, 'imagenes/neumatico 3.png',289,NULL,'BLANCO','DESCRIPCION23',1,2,3),
(00069, 'LLANTA 1',25143,24201, 'imagenes/llanta 1.jpg',465,NULL,'BLANCO','DESCRIPCION23',1,1,1),
(00070, 'LLANTA 2',30502,10111, 'imagenes/llanta 2.jpg',147,NULL,'BLANCO','DESCRIPCION23',1,1,3),
(00071, 'LLANTA 3',47767,19145, 'imagenes/llanta 3.jpg',487,NULL,'BLANCO','DESCRIPCION23',1,1,4),
(00072, 'FRENO PASTILLA 1',44678,19969, 'imagenes/freno pastilla 1.png',86,NULL,'BLANCO','DESCRIPCION23',1,17,1),
(00073, 'FRENO PASTILLA 2',22452,12514, 'imagenes/freno pastilla 2.png',438,NULL,'BLANCO','DESCRIPCION23',1,17,3),
(00074, 'FRENO DISCO 1',13981,13622, 'imagenes/freno disco 1.png',250,NULL,'BLANCO','DESCRIPCION23',1,18,3),
(00075, 'FRENO DISCO 2',18328,23539, 'imagenes/freno disco 2.png',758,NULL,'BLANCO','DESCRIPCION23',1,18,1),
(00076, 'MARCO 1',45172,19103, 'imagenes/marco 1.png',111,NULL,'BLANCO','DESCRIPCION23',2,19,4),
(00077, 'MARCO 2',36310,19955, 'imagenes/marco 2.png',181,NULL,'BLANCO','DESCRIPCION23',2,20,3),
(00078, 'MARCO 3',32229,20326, 'imagenes/marco 3.png',366,NULL,'BLANCO','DESCRIPCION23',2,19,2),
(00079, 'PINON 1',38019,17757, 'imagenes/pinon1.png',316,NULL,'BLANCO','DESCRIPCION23',2,3,2),
(00080, 'PINON 2',20840,21897, 'imagenes/pinon2.png',540,NULL,'BLANCO','DESCRIPCION23',2,4,1),
(00081, 'PINON 3',42318,12273, 'imagenes/pinon3.png',294,NULL,'BLANCO','DESCRIPCION23',2,3,4),
(00082, 'CAMBIO TRASERO 1',39417,11595, 'imagenes/desviador1.png',369,NULL,'BLANCO','DESCRIPCION23',1,5,2),
(00083, 'CAMBIO TRASERO 2',13038,15934, 'imagenes/desviador2.png',713,NULL,'BLANCO','DESCRIPCION23',1,5,4),
(00084, 'HORQUILLA 1',34931,19168, 'imagenes/horquilla.png',442,NULL,'BLANCO','DESCRIPCION23',2,8,1),
(00085, 'HORQUILLA 2',35798,21832, 'imagenes/horquilla 2.png',544,NULL,'BLANCO','DESCRIPCION23',2,8,2),
(00086, 'SILLIN 1',47226,22657, 'imagenes/sillin1.png',218,NULL,'BLANCO','DESCRIPCION23',2,9,4),
(00087, 'SILLIN 2',38752,11126, 'imagenes/sillin2.png',262,NULL,'BLANCO','DESCRIPCION23',2,9,2),
(00088, 'TIJA 1',44578,22616, 'imagenes/tija1.png',295,NULL,'BLANCO','DESCRIPCION23',2,10,4),
(00089, 'TIJA 2',48888,11475, 'imagenes/tija2.png',146,NULL,'BLANCO','DESCRIPCION23',2,10,1),
(00090, 'BIELA 1',48716,24810, 'imagenes/biela.png',373,NULL,'BLANCO','DESCRIPCION23',2,21,1),
(00091, 'BIELA 2',30109,14034, 'imagenes/biela1.png',404,NULL,'BLANCO','DESCRIPCION23',2,21,3),
(00092, 'BIELA 3',38018,21231, 'imagenes/biela2.png',354,NULL,'BLANCO','DESCRIPCION23',2,21,4),
(00093, 'PLATOS 1',33183,22482, 'imagenes/plato1.jpg',800,NULL,'BLANCO','DESCRIPCION23',1,11,2),
(00094, 'PLATOS 2',12111,15883, 'imagenes/plato2.jpg',515,NULL,'BLANCO','DESCRIPCION23',1,11,2),
(00095, 'CADENA 1',30073,12066, 'imagenes/cadena1.jpg',577,NULL,'BLANCO','DESCRIPCION23',1,12,4),
(00096, 'CADENA 2',38150,16288, 'imagenes/cadena2.jpg',529,NULL,'BLANCO','DESCRIPCION23',1,12,2),
(00097, 'PEDAL 1',48897,12471, 'imagenes/pedal1.png',349,NULL,'BLANCO','DESCRIPCION23',1,13,2),
(00098, 'PEDAL 2',39816,23126, 'imagenes/pedal2.png',465,NULL,'BLANCO','DESCRIPCION23',1,13,2),
(00099, 'PEDAL 3',39107,22723, 'imagenes/pedal3.png',704,NULL,'BLANCO','DESCRIPCION23',1,13,4),
(00100, 'PEDAL ARMADO 1',27752,14482, 'imagenes/pedal1perfil.png',661,NULL,'BLANCO','DESCRIPCION23',2,13,1),
(00101, 'PEDAL ARMADO 2',38147,15779, 'imagenes/pedal2perfil.png',752,NULL,'BLANCO','DESCRIPCION23',2,13,3),
(00102, 'PEDAL ARMADO 3',48924,21579, 'imagenes/pedal3perfil.png',475,NULL,'BLANCO','DESCRIPCION23',2,13,1),
(00103, 'MANUBRIO 1',14055,13672, 'imagenes/manubrio1.png',535,NULL,'BLANCO','DESCRIPCION23',2,14,1),
(00104, 'MANUBRIO 2',42438,22936, 'imagenes/manubrio2.png',121,NULL,'BLANCO','DESCRIPCION23',2,14,4),
(00105, 'MANUBRIO 3',28903,22456, 'imagenes/manubrio3.png',383,NULL,'BLANCO','DESCRIPCION23',2,14,4),
(00106, 'MANILLAR 1',16268,18969, 'imagenes/manillar1.jpg',462,NULL,'BLANCO','DESCRIPCION23',1,15,1),
(00107, 'MANILLAR 2',41962,24085, 'imagenes/manillar2.jpg',296,NULL,'BLANCO','DESCRIPCION23',1,15,1),
(00108, 'MANILLAR 3',45194,19360, 'imagenes/manillar3.jpg',308,NULL,'BLANCO','DESCRIPCION23',1,15,4),
(00109, 'GRIP 1',43481,10682, 'imagenes/ag1_rojo.jpg',619,NULL,'BLANCO','DESCRIPCION23',1,16,4),
(00110, 'GRIP 2',13253,11298, 'imagenes/odi_rojos.jpg',411,NULL,'BLANCO','DESCRIPCION23',1,16,4),
(00111, 'GUIA 1',18724,17424, 'imagenes/guia1.png',177,NULL,'BLANCO','DESCRIPCION23',1,6,3),
(00112, 'GUIA 2',11511,10007, 'imagenes/guia2.png',724,NULL,'BLANCO','DESCRIPCION23',1,6,1),
(00113, 'MANDO DE CAMBIO 1',39941,15061, 'imagenes/mando1.jpg',748,NULL,'BLANCO','DESCRIPCION23',1,7,1),
(00114, 'MANDO DE CAMBIO 2',44494,13986, 'imagenes/mando2.jpg',391,NULL,'BLANCO','DESCRIPCION23',1,7,1),
(00115, 'MANDO DE CAMBIO 3',41604,10949, 'imagenes/mando3.jpg',336,NULL,'BLANCO','DESCRIPCION23',1,7,3);


INSERT INTO `usuarios` (`usu_id`, `usu_nick`, `usu_clave`, `usu_nombre`, `usu_apellido`,`usu_anulado`,`tip_id`, `suc_id`) VALUES
(1, 'mic.adasme', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 'Michel', 'Adasme',0, 1, 1),
(2, 'ale.llanos', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 'Alejandro', 'Llanos',0, 2, 1),
(3, 'local', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 'Adm', 'Local', 1 ,3, 1),
(4, 'mecanico', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 'Señor', 'Mecanico', 1 , 4, 1),
(5, 'vendedor', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 'Señor', 'Vendedor', 1 , 5, 1);



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

INSERT INTO `cliente` (`cli_rut`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_telefono`, `cli_correo`, `cli_pass`, `comu_id`) VALUES
(180647945, 'Michel', 'Adasme', 'Las Guias 7555 - Naltagua', '51194592', 'mic.adasme@gmail.com', '$2y$09$6bYZRPGZ5sbCVpPhlO4pP.4Xlht7S3bQtqjo2tW7b2NPNQDYQioZW', 87);

INSERT INTO `ubicacion` VALUES
(1, 'Tienda'),
(2, 'Bodega');

INSERT INTO `tipo_gastos` VALUES
(1, 'Merma'),
(2, 'Gasto Local'),
(3, 'Mercaderia');

INSERT INTO `estado_servicio` VALUES
(1, 'En Reparacion'),
(2, 'Listo Para Entrega'),
(3, 'Entregado Y Completado');

INSERT INTO `estado_armado` VALUES
(0, 'Eliminado'),
(1, 'Solo Creacion'),
(2, 'Enviado, Esperando Aprobacion'),
(3, 'En Proceso de Armado'),
(4, 'Listo Para Entrega'),
(5, 'Entregado Y Completado');
