<?php
include("../modelo/funciones.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>SCCYCLES</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- 
    Circle Template 
    http://www.templatemo.com/preview/templatemo_410_circle 
    -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/templatemo_misc.css">
    <link rel="stylesheet" href="../css/templatemo_style.css">

    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="../js/vendor/jquery-1.10.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>


    <script>

    function modalNoticia(id){

    $.ajax({
    url: "/biciomatic/modal/modal_detalle_noticia.php", // link of your "whatever" php
    async: true,
    cache: false,
    type: "POST",
    data:{codigo:id}, // all data will be passed here
    success: function(data){
        $("#divModal").html(data);

    }
    });
    }

    </script>
	<!-- templatemo 410 circle -->
</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->


    <div class="bg-overlay"></div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 col-sm-12">
                <div class="sidebar-menu">

                    <div class="logo-wrapper">
                        <a rel="nofollow" href="vista_inicio.php"><img src="../images/logo 2.0.png" alt="Circle Template" style="width:100%">
                        <h1 class="logo">

                            <span href="http://www.templatemo.com/preview/templatemo_410_circle">Atencion unica</span></a>
                        </h1>
                    </div> <!-- /.logo-wrapper -->

                    <div class="menu-wrapper">
                        <ul class="menu">
                            <li><a class="show-4" href="#">Inicio</a></li>
                            <li><a class="show-2" href="#">Team</a></li>
                            <li><a class="show-3" href="#">Servicios</a></li>
                            <li><a class="show-6" href="#">Noticias</a></li>
                       <!-- <li><a class="show-4" href="#">Productos</a></li>-->
                            <li><a class="show-5" href="#" onclick="templatemo_map();">Contactanos</a></li>
                            <li><a rel="nofollow" href="../app/index.php">Arma Tu Bicicleta</a></li>
                        </ul> <!-- /.menu -->
                        <a href="#" class="toggle-menu"  ><i class="fa fa-bars"></i></a>

                    </div> <!-- /.menu-wrapper -->

                    <!--Arrow Navigation-->
                    <a id="prevslide" class="load-item"><i class="fa fa-angle-left"></i></a>
                    <a id="nextslide" class="load-item"><i class="fa fa-angle-right"></i></a>

                </div> <!-- /.sidebar-menu -->
            </div> <!-- /.col-md-4 -->




    <!-- ///////////////////////////////////////LOGIN//////////////////////////////////////////////////////// -->

            <div class="col-md-8 col-sm-12">
                
                <div id="menu-container">

                    <div id="menu-1" class="services content">
                        <div class="row">
                            <ul class="tabs">
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab1" class="icon-item">
                                        <p>Iniciar sesion</p>
                                        <i class="fa fa-user"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab2" class="icon-item">
                                        <p>Noticias y Eventos</p>
                                        <i class="fa fa-calendar"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab3" class="icon-item">
                                        <p>Registrarse</p>
                                        <i class="fa fa-inbox"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                            </ul> <!-- /.tabs -->
                            <div class="col-md-12 col-sm-12">
                                <div class="toggle-content text-center" id="tab1">
                                    <h3>Iniciar Sesion</h3>
                                    <form id="login" action="control/control_login.php" method="post" name="login" role="form">
                                        <p>Usuario: </p><input type="email" id="email"  name="email" class="form-control" placeholder="Correo" title="falta ingresar correo" required="true"/>
                                        <p>Contraseña: </p><input type="password" id="password" name="password" class="form-control" placeholder="contraseña"  title="falta ingresar contraseña" required="true"/>
                                        <input type="submit" id="btnlogin" value="Iniciar sesion" >
                                        <p>¿Olvido Contraseña?   </p> <a onclick="redir();">Registrarse</a>
                                    </form>
                                </div>

    <!-- /////////////////////////////////////// FIN LOGIN   /////////////////////////////////////////////////////// -->


                                <div class="toggle-content text-center" id="tab2">
                                    <h3>Noticias y Eventos</h3>
                                    <p>Nulla consequat nibh mattis metus sodales, at eleifend tortor tempor. Sed auctor lacus felis. Maecenas auctor enim libero, vel viverra nulla fringilla quis. Sed eget aliquet arcu. Suspendisse ac dignissim nunc, id pretium elit. Nunc id neque vel leo semper gravida non ut enim. Cras sed posuere magna.
                                    <br><br>Morbi eget ante sed felis tristique interdum. In varius eros ac est interdum, quis scelerisque elit semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                </div>

                                <div class="toggle-content text-center" id="tab3">
                                    <h3>Llena el formulario</h3>
                                   <div class="row col-md-6 col-md-offset-3">  
                                        <form id="registro" method="POST" action="control/controlRCliente.php">

                                        <p >
                                           Rut:        <input type="text" name="rut" id="rut" placeholder="ingrese rut" class="form-control" required/>
                                           Nombre:     <input type="text" name="nombre" id="nombre" placeholder="ingrese nombre" class="form-control" required/>
                                           Apellido:   <input type="text" name="apellido" id="apellido" placeholder="ingrese apellido" class="form-control" required/>
                                           Direccion:  <input type="text" name="direccion" id="direccion" placeholder="ingrese direccion" class="form-control" required/>
                                           Telefono:   <input type="text" name="telefono" id="telefono" placeholder="ingrese telefono" class="form-control" required/>
                                           Correo:     <input type="email" name="correo" id="correo" placeholder="ingrese correo" class="form-control" required/>
                                           Nick:       <input type="text" name="nick" id="nick" placeholder="ingrese nick" class="form-control" required/>
                                           Contraseña: <input type="text" name="contraseña" id="contraseña" placeholder="ingrese contraseña" class="form-control" required/>
                                           Comuna:     <select id="comuna" name="comuna" class="form-control" required>
                                                               <option value="1">comuna1</option>
                                                               <option value="2">comuna2</option>
                                                               <option value="3">comuna3</option>
                                                               <option value="4">comuna4</option>
                                                               <option value="5">comuna5</option>
                                                              </select> </p>
                                            <br><input type="submit" id="btncrear" value="Crear cuenta" >
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.services -->


                    <div id="menu-2" class="about content">
                        <div class="row">
                            <ul class="tabs">
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab4" class="icon-item">
                                        <i class="fa fa-umbrella"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab5" class="icon-item">
                                        <i class="fa fa-camera"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab6" class="icon-item">
                                        <i class="fa fa-coffee"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                            </ul> <!-- /.tabs -->
                            <div class="col-md-12 col-sm-12">
                                <div class="toggle-content text-center" id="tab4">
                                    <h3>Quienes Somos</h3>
                                    <p> Somos una tienda especializada en servicio técnico de bicicletas, dedicados a la venta, mantención de todo tipo de bicicletas. Nuestro objetivo es entregar un servicio técnico de excelencia tanto en la tienda como también en las principales carreras. Una mantención de la bicicleta periódicamente, con sus servicios al día trae consigo una perduración del producto a lo largo del tiempo. </p>
                                </div>

                                <div class="toggle-content text-center" id="tab5">
                                    <h3>What We Do</h3>
                                    <p>Donec quis orci nisl. Integer euismod lacus nec risus sollicitudin molestie vel semper turpis. In varius imperdiet enim quis iaculis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris ac mauris aliquam magna molestie posuere in id elit. Integer semper metus felis, fringilla congue elit commodo a. Donec eget rutrum libero.
                                    <br><br>Nunc dui elit, vulputate vitae nunc sed, accumsan condimentum nisl. Vestibulum a dui lectus. Vivamus in justo hendrerit est cursus semper sed id nibh. Donec ut dictum lorem, eu molestie nisi. Quisque vulputate quis leo lobortis fermentum. Ut sit amet consectetur dui, vitae porttitor lectus.</p>
                                </div>

                                <div class="toggle-content text-center" id="tab6">
                                    <h3>Our Team</h3>
                                    <p>Aliquam erat volutpat. Vivamus tempus, nisi varius imperdiet molestie, velit mi feugiat felis, sit amet fringilla mi massa sit amet arcu. Mauris dictum nisl id felis lacinia congue. Aliquam lectus nisi, sodales in lacinia quis, lobortis vel sem. Vestibulum elit nisi, placerat eget auctor ut, dictum at libero.
                                    <br><br>Proin enim odio, eleifend eget euismod vitae, pharetra sed lacus. Donec at sapien nunc. Mauris vehicula quis diam nec dignissim. Nulla consequat nibh mattis metus sodales, at eleifend tortor tempor. Sed auctor lacus felis. </p>
                                </div>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="member-item">
                                    <div class="thumb">
                                        <img src="../images/team/RogelioCano.png" alt="Rogelio Cano" data-rel="lightbox" class="overlay" href="images/team/RogelioCano.png">
                                    </div>
                                    <h4>Rogelio Cano</h4>
                                                  
                                 <button type="button" class="btn btn-primary"  onclick="$('#mimodal1').modal('show')" >Seguir Leyendo</button>
                               </div> <!-- /.member-item -->
                            </div> <!-- /.col-md-4 -->


                            <div class="col-md-4 col-sm-4">
                                <div class="member-item">
                                    <div class="thumb">
                                        <img src="../images/team/EstebanCastro.png" alt="Esteban Castro" data-rel="lightbox" class="overlay" href="images/team/EstebanCastro.png">
                                    </div>
                                    <h4>Esteban Castro</h4>
                                                       
                                 <button type="button" class="btn btn-primary"  onclick="$('#mimodal2').modal('show')" >Seguir Leyendo</button>
                                </div> <!-- /.member-item -->
                            </div> <!-- /.col-md-4 -->


                            <div class="col-md-4 col-sm-4">
                                <div class="member-item">
                                    <div class="thumb">
                                        <img src="../images/team/RodrigoFarias.png" alt="Rodrigo Farias" data-rel="lightbox" class="overlay" href="images/team/RodrigoFarias.png">
                                    </div>
                                    <h4>Rodrigo Farias</h4>
                                       
                                 <button type="button" class="btn btn-primary"  onclick="$('#mimodal3').modal('show')" >Seguir Leyendo</button>
                                </div> <!-- /.member-item -->
                            </div> <!-- /.col-md-4 -->

                            <div class="col-md-4 col-sm-4">
                                <div class="member-item">
                                    <div class="thumb">
                                        <img src="../images/team/IgnacioSaavedra.PNG" alt="Ignacio Saavedra" data-rel="lightbox" class="overlay" href="images/team/IgnacioSaavedra.PNG">
                                    </div>
                                    <h4>Ignacio Saavedra</h4>
                                                   
                                 <button type="button" class="btn btn-primary"  onclick="$('#mimodal4').modal('show')" >Seguir Leyendo</button>
                                </div> <!-- /.member-item -->
                            </div> <!-- /.col-md-4 -->

                        </div> <!-- /.row -->
                    </div> <!-- /.about -->

            
                    <!-- MODALES -->
                     <div class="modal fade " id="mimodal1" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">                                         
                                                    <h4 class="modal-title" id="myModalLabel">Rogelio Cano</h4>
                                                  </div>                                        
                                                  <div class="modal-body">
                                                    Rogelio cano, a partir del año 2009 empezó a dedicarse mas al descenso competitivo, y de la mano de su gran amigo Esteban castro empezaron a entrenar ya que se le venían un par de años muy duros para el ya que pasaría a una de las categorías mas peleadas que es junior varones, luego de entrenar mucho, llegaron los resultados, mas de 15 carreras ganadas, muchos top 10 en la general de Copa Chile, 3 Valparaíso cerro abajo corridos y 2 campeonatos nacionales, hacen que esta experiencia a sus cortos 4 años corriendo con todo que sea en el día de hoy uno de los corredores con mas técnica y frialdad al momento de correr.
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button>                                  
                                                 </div>                                       
                                                </div>
                                            </div>
                                        </div>         

                    <div class="modal fade " id="mimodal2" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">                                         
                                                    <h4 class="modal-title" id="myModalLabel">Esteban Castro</h4>
                                                  </div>                                        
                                                  <div class="modal-body">
                                                        Esteban Abraham Castro Piña, Nacido el 22 de Julio de 1991, tiene toda una vida ligada al descenso, desde pequeño solo con 7 años iba a ver correr a los mejores exponentes del descenso nacional, e internacional, partió compitiendo en el año 2000 en la disciplina de Cross Country ya que en ese tiempo había una limitante de edad para correr Descenso, no resaltaba por su buen desempeño al subir, pero en la bajada se veía la diferencia adelantando más de 12 lugares por vuelta tan solo en la bajada, dentro de su primer año de competencia en XC, quedo en el puesto número  12 a nivel nacional, el año 2002 presencio su primer panamericano que fue realizado en chile lo cual lo definió y le dio la convicción de querer correr un panamericano más adelante, ser seleccionado nacional. Ya con el correr de los años las cosas se empezaron a dar para Esteban, ya que en el año 2005 Gano su primera carrera, realizada en mall Sport, en los campeonatos interescolares (siempre manteniendo la constancia en los campeonatos, los que el año 2007 y 2008 lo dejaron 3 en el ranking) de montainbike, siempre un exponente digno de ver por su calidad técnica al saltar y por su estilo. El año 2006 se corona campeón nacional con una ventaja de más de 7 segundos con el segundo lugar, siendo intermedia lo deja dentro de los 30 más rápidos del campeonato. Hasta el año 2009 los podios eran recurrentes para Esteban, que lo llevaron a ese mismo año, ser seleccionado nacional para el campeonato panamericano efectuado en chile quedando numero 4° en categoría junior y 21 en la general del panamericano, correr su primer Valparaíso cerro abajo, quedando en la posición 33°, y su victoria en la connotada carrera AQ brothers realizada en Reñaca, su posición en la general fue en el puesto 14°, ya desde el 2010 ha sido un corredor elite que se ha mantenido dentro del top 20, y las proyecciones para estos años con el equipo SC CYCLES, es dar lo mejor de sí para poder mantenerse dentro de los 20 más rápidos de chile.
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button>                                  
                                                 </div>                                       
                                                </div>
                                            </div>
                                        </div> 

                     <div class="modal fade bs-example-modal-sm" id="mimodal3" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">                                         
                                                    <h4 class="modal-title" id="myModalLabel">Rodrigo Farias</h4>
                                                  </div>                                        
                                                  <div class="modal-body">
                                                        RODRIGO IGNACIO FARÍAS MARTINEZ nació en Febrero de 1994 y es corredor de descenso (o downhill o DH), una especialidad del ciclismo de montaña o mountain bike. Desde muy pequeño le gustaba saltar en bicicleta junto a sus hermanos Nicolás y Andrea y sus primos Tomás y Matías Garnitz, todos los cuales son actualmente corredores de descenso. En los bosques del sector Los Romeros de Concon, construían tarimas y peraltes que Rodrigo disfrutaba saltándolos en su pequeña bicicleta. Ocasionalmente participaba en carreras de BMX que se desarrollaban en Viña del Mar, siempre logrando llegar en los primeros lugares.
                                                        En enero de 2009 corrió su primera carrera de descenso en la competencia de Árbol Huacho (Quilpué) y de allí no ha parado más. En Marzo de 2009, a solo 2 meses de iniciarse en este deporte, fue invitado por la Federación de Ciclismo de Chile, como figura promisoria, para representar a Chile en los Panamericanos de Mountain Bike que se realizaron en La Parva. En ese tiempo, por su edad, le correspondió competir en la categoría intermedia o cadetes (corredores de 15 y 16 años)
                                                        Con el tiempo, Rodrigo empezó a ser figura casi permanente en los podios destacándose el 1er lugar en Árbol Huacho, Quilpué (Oct 2009), el 3er lugar en la 3ª Fecha Copa Chile, Concepción (Oct 2009) y 2º Lugar en la Copa Racing Store Gravedad Cero, Talca (Dic 2009).
                                                        En el año 2010 se incorporó a los registros del recientemente formado Club Deportivo Team Concón Downhill. Aún en categoría intermedia, en el año 2010 destacaron sus participaciones en la 1ª fecha de la Copa AQBrothers, Sausalito en febrero (3er Lugar), la carrera a beneficio de los damnificados del 27F en mayo en San Fernando (2º lugar), 2ª fecha Copa AQBrothers, Sausalito en mayo (1er Lugar), Copa Longride en Los Andes en setiembre (2º lugar), 1ª fecha Copa Chile en septiembre en Paine (3er lugar) y en la Copa Cannondale en noviembre en las Termas de Chillán (2º lugar). En Diciembre fue a competir una fecha del Open Shimano en San Carlos de Bariloche, obteniendo el 6º lugar en su categoría.
                                                        Finaliza el año 2010 obteniendo el 3er lugar en la Copa Chile y como Vice campeón del Ranking Nacional 2010 categoría Intermedia.
                                                        El año 2011 es invitado a incorporarse al Tamarugal Honda Racing Team, con fuerte presencia en todas las versiones del Dakar y que había abierto su rama de ciclismo de montaña, rama a la cual ya se había incorporado su hermana Andrea. Esta invitación le permitió mejorar su equipamiento y cambiar su bicicleta por una de competición. Después de algún tiempo de ambientación al nuevo equipamiento vinieron nuevamente los podios, ahora en categoría Junior, la más exigente del circuito después de la máxima categoría que es Elite. Destacaron ese año el 1er Lugar en La Parva Downhill Cup (enero), el 3er lugar en la 1ª fecha del Interescolar Soprole, y el 2ª Lugar en la 2ª y en la 3ª fecha del Interescolar Soprole, y el 1er lugar en la última fecha de este campeonato, logrando el título de Vice campeón Inter escolar Junior 2011. Después vinieron el 3er lugar en la Copa Aniversario ciudad de Los Andes (julio), 2º lugar en Catemu (Agosto), 3er lugar en la Copa Longride Los Andes (Octubre), 2º lugar en la Copa Cerro El Sobrero de Melipilla (Octubre), 3er lugar en AQBrother Reñaca (Noviembre), 2º lugar en la 2ª fecha de la Copa Chile Reñaca y 2º Lugar en la Copa Pichidegua (Diciembre). Termina el 2011 como Vicecampeón de la Copa Chile y Vicecampeón del Ranking Nacional 2011, categoría Junior.
                                                        En año 2012, fue invitado a participar en el VCA (Valparaíso Cerro Abajo), la principal competencia de descenso que se desarrolla en Chile con corredores de Chile, Perú, Bolivia, Brasil, Ecuador, Eslovaquia, Francia, Estados Unidos, Canadá y otros países. Rodrigo fue el corredor más joven de esta versión del VCA ya que sólo pueden correr competidores mayores de 18 años, edad que Rodrigo había cumplido hacía apenas 2 días. Rodrigo fue el mejor corredor de la categoría junior de esa versión del VCA.
                                                        Entre los resultados del 2012 destacan el 1er lugar de la Copa Mongoose en la Termas de Chillán (enero), el 3er lugar en el Selectivo para los Panamericanos de México realizado en La Parva (febrero), el 1er lugar en la Copa Quaker Cannondale en la Termas de Chillán (marzo) , 1er lugar en la Copa King of the Hill en Peñaflor (marzo), el 1er lugar en las 3 fechas del Inter escolar Soprole desarrollado en Piedra Roja y en el cual se tituló Campeón 2011 , el 1er lugar en la Copa Curacaví Downhill (junio), 3er lugar en la 2ª Fecha de la Copa Chile en Peñaflor (octubre) y el 1er lugar en la 4ª fecha de la Copa Chile en Talca (Diciembre). Terminó el 2012 en el 3er lugar de la Copa Chile Categoría Junior.
                                                        El año 2013 sube a la categoría Elite, la máxima categoría del ciclismo de montaña y obtiene el 5º lugar en la copa Nevados Downhill realizado a principios de enero en las Termas de Chillán.
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button>                                  
                                                 </div>                                       
                                                </div>
                                            </div>
                                        </div>      

                        <div class="modal fade" id="mimodal4">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">                                         
                                                    <h4 class="modal-title" id="myModalLabel">Ignacio Saavedra</h4>
                                                  </div>                                        
                                                  <div class="modal-body">
                                                        Ignacio Saavedra, tiene mas de 10 años como mecánico de bicicletas, y mas aun corriendo, desempeñando su talento en el XC, DH o enduro, ha tenido diversos resultados positivos a lo largo de los años. Durante este año de conocimiento de su bicicleta intense ha podido lograr un par de podios en la categoría master a1. 
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button>                                  
                                                 </div>                                       
                                                </div>
                                            </div>
                                        </div>     
                      <!-- FIN MODALES -->

                    <div id="menu-3" class="services content">
                        <div class="row">
                            <ul class="tabs">
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab7" class="icon-item">
                                        <p>Reparacion</p>
                                        <i class="fa fa-cogs"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab8" class="icon-item">
                                        <p>Tuning</p>
                                        <i class="fa fa-leaf"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <a href="#tab9" class="icon-item">
                                        <p>Mantenimiento</p>
                                        <i class="fa fa-users"></i>
                                    </a> <!-- /.icon-item -->
                                </li>
                            </ul> <!-- /.tabs -->
                            <div class="col-md-12 col-sm-12">
                                <div class="toggle-content text-center" id="tab7">
                                    <h3>Our Services</h3>
                                    <p>You can easily change icons by <a rel="nofollow" href="http://fontawesome.info/font-awesome-icon-world-map/">Font Awesome</a>. Example: <strong>&lt;i class=&quot;fa fa-users&quot;&gt;&lt;/i&gt;</strong> In varius eros ac est interdum, quis scelerisque elit semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    <br><br>Donec mattis enim sit amet nisl faucibus, eu pulvinar nibh facilisis. Aliquam erat volutpat. Vivamus tempus, nisi varius imperdiet molestie, velit mi feugiat felis, sit amet fringilla mi massa sit amet arcu. Mauris dictum nisl id felis lacinia congue. Aliquam lectus nisi, sodales in lacinia quis, lobortis vel sem. Vestibulum elit nisi, placerat eget auctor ut, dictum at libero.</p>
                                </div>

                                <div class="toggle-content text-center" id="tab8">
                                    <h3>Our Support</h3>
                                    <p>Nulla consequat nibh mattis metus sodales, at eleifend tortor tempor. Sed auctor lacus felis. Maecenas auctor enim libero, vel viverra nulla fringilla quis. Sed eget aliquet arcu. Suspendisse ac dignissim nunc, id pretium elit. Nunc id neque vel leo semper gravida non ut enim. Cras sed posuere magna.
                                    <br><br>Morbi eget ante sed felis tristique interdum. In varius eros ac est interdum, quis scelerisque elit semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                </div>

                                <div class="toggle-content text-center" id="tab9">
                                    <h3>Mantenimiento</h3>
                                    <p>
                                            Una mantención de la bicicleta periódicamente y hecho de la manera correcta y con sus servicios al día trae consigo una perduración del producto a lo largo del tiempo.
                                           <br>Alguno de nuestros servicios son:
                                           <br>Servicio Full Bicicleta: Consta de un desarme completo de la bicicleta (rígida o doble suspensión), lavado de bicicleta, engrase de masas, dirección, motor, centrado de las ruedas, cambio de piolas y fundas de cambio.
                                           <br>Servicio medio Bicicleta: Consta de un lavado de bicicleta completo, centrado de ruedas, ajuste de frenos y cambios, con lubricación.
                                            <br>Servicio de horquilla
                                            <br>Servicio de shock
                                            <br>Servicio de frenos
                                            <br>Sistema tubular
                                            <br>Lavado de transmisión
                                            <br>Enrayado de ruedas
                                           <br> Cambio de rodamientos de masas, cuadros, dirección, etc.
                                            <br>Servicio de cambio de bujes para shock y pernos mandados hacer a medida.
                                    </p>
                                </div>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.services -->




<!-- ////////////////////////////////////////////////GALERIA DE PRODUCTOS//////////////////////////////////////////////////////-->
                    <div id="menu-4" class="gallery content">
                        <div class="row">
                            
                            <?php 

                            $res = MuestraProductos();
                            foreach ($res as $x) {
                                

                              echo(   '<div class="col-md-4 col-ms-6">
                                <div class="g-item">
                                    <img src="../'. $x['pro_imagen'] .'" alt="">
                                    <a data-rel="lightbox" class="overlay" href="'. $x['pro_imagen'] .'">
                                        <span>+</span>
                                    </a>
                                </div> <!-- /.g-item --> 
                            </div> <!-- /.col-md-4 -->');
                            
                              
                            }

                           
                           
                            ?>

                        </div> <!-- /.row -->
                    </div> <!-- /.productos -->



                    <!-- ////////////////////////////////////////////////FIN GALERIA DE PRODUCTOS//////////////////////////////////////////////////////-->

                    <div id="menu-5" class="contact content">
                        <div class="row">
                        	
                            <div class="col-md-12">
                                <div class="toggle-content text-center spacing">
                                    <h3>Contactanos</h3>
                                    <p>Donec mattis enim sit amet nisl faucibus, eu pulvinar nibh facilisis. Aliquam erat volutpat. Vivamus tempus, nisi varius imperdiet molestie, velit mi feugiat felis, sit amet fringilla mi massa sit amet arcu. Mauris dictum nisl id felis lacinia congue. Aliquam lectus nisi, sodales in lacinia quis, lobortis vel sem.
                                    <br><br><strong>Address:</strong> Av las condes #12255 Local 41
                                    <br><strong>Email:</strong> contacto@sccycles.cl | <strong>Tel:</strong> 02-22417085 ó 09-8370245</p>
                                </div>
                            </div> <!-- /.col-md-12 -->
                            
                          <!--  <div class="col-md-12">
                                <div class="google-map">
                                </div> <!-- /.google-map -->
                           <!-- </div> <!-- /.col-md-12 -->
                            
                            <div class="col-md-12">
                                <div class="contact-form">
                                    <div class="row">
                                    	<form action="../control/control_contacto.php" method="post">
                                            <fieldset class="col-md-4">
                                                <input id="name" type="text" name="name" placeholder="Nombre">
                                            </fieldset>
                                            <fieldset class="col-md-4">
                                                <input type="email" name="email" id="email" placeholder="Correo">
                                            </fieldset>
                                            <fieldset class="col-md-4">
                                                <input type="text" name="subject" id="subject" placeholder="Asunto">
                                            </fieldset>
                                            <fieldset class="col-md-12">
                                                <textarea name="message" id="message" placeholder="Mensaje"></textarea>
                                            </fieldset>
                                            <fieldset class="col-md-12">
                                                <input type="submit" name="send" value="Enviar" id="submit" class="button">
                                            </fieldset>
                                        </form>
                                    </div> <!-- /.row -->
                                </div> <!-- /.contact-form -->
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.contact -->

        <!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->
                    <div id="menu-6" class="contact content">
                        <div class="row">
                            
                            <div class="col-md-12" >
                                <div class="toggle-content text-center spacing">
                                    <h3 >Noticias</h3>
                                  <!-- /  <p></p>-->





                                     <?php
                                      $res2 = MuestraNoticias();
                                        foreach ($res2 as $y)
                                        {
                                                  echo(' <div class="row">
                                                          <div class="col-sm-12 ">
                                                            <div class="thumbnail">
                                                              <img  class="col-sm-4 " style="height: 130px; width: 200px; " src="../'.$y['not_imagen'].'" alt="...">
                                                              <div class="caption">
                                                                <h3>'.$y['not_titulo'].'</h3>
                                                                <p>'.$y['not_subtitulo'].'</p>

                                                              </div>
                                                       <a onClick="modalNoticia('.$y['not_id'].')" class="btn btn-sm btn-info"><span
                            class="glyphicon glyphicon-plus-sign"></span> Ver Mas </a>
                                                            </div>
                                                          </div>
                                                        </div>');
                                        }
                                    ?>

                                </div>
                            </div> <!-- /.col-md-12 -->

                        </div> <!-- /#menu-container -->

                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
    
    <div class="container-fluid">   
        <div class="row">
            <div class="col-md-12 footer">
                <p id="footer-text">Copyright &copy; 2014 <a href="#">Bici-O-Matic</a>
                 | Fotos de  <a rel="nofollow" href="http://unsplash.com">ASDF</a></p>
            </div><!-- /.footer --> 
        </div>
    </div> <!-- /.container-fluid -->

   
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/jquery.easing-1.3.js"></script>
 
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript">
            
			jQuery(function ($) {

                $.supersized({

                    // Functionality
                    slide_interval: 3000, // Length between transitions
                    transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed: 700, // Speed of transition

                    // Components                           
                    slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    slides: [ // Slideshow Images
                        {
                            image: '../images/fondo/templatemo-slide-1.jpg'
                        }, {
                            image: '../images/fondo/templatemo-slide-2.jpg'
                        }, {
                            image: '../images/fondo/templatemo-slide-3.jpg'
                        }, {
                            image: '../images/fondo/templatemo-slide-4.jpg'
                        }
                    ]

                });
            });
            
    </script>
    
    	<!-- Google Map -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../js/vendor/jquery.gmap3.min.js"></script>
        
        <!-- Google Map Init-->
       <!-- <script type="text/javascript">
           function templatemo_map() {
                $('.google-map').gmap3({
                    marker:{
                        address: '-33.3732583,-70.5170125' 
                    },
                        map:{
                        options:{
                        zoom: 15,
                        scrollwheel: false,
                        streetViewControl : true
                        }
                    }
                });
            }

         /*   function redir()
            {
                $(location).attr('href','#tab3');

            } 
        </script>-->
        <div id="divModal">
            </div>
</body>
</html>