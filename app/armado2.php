<?php
session_start();
include("modelo/funciones.php");
$_SESSION["bicicleta"]=array();

$marcos = muestraMarcos();
$pinones = muestraPinones();
$cambiotrs = muestraCambioTrasero();
$horquillas = muestraHorquilla();
$sillin = muestraSillin();
$tijas = muestraTija();
$bielas = muestraBiela();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bici-O-Matic</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/drag-drop2.js"></script>
    <script src="js/html2canvas.js"></script>
    <script src="js/jquery.plugin.html2canvas.js"></script>
    <script>
        $( document ).ready(function() {
            $("[rel='tooltip']").tooltip();    
            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }); 
       });
    </script>
    <script type="text/javascript">
     $(function(){
        var bike;
     $('#btnSave').on('click',function() {
        html2canvas($("#widget"), {
            onrendered: function(canvas) {
                // canvas is the final rendered <canvas> element
                var bike=canvas.toDataURL("image/png");
                $('#img_val').val(bike);
                //window.open(a);
            }       
        });
             var data = $("#myForm").serialize(); 
         $.ajax({
                            url: 'control/controlIPartes.php',
                            type: 'POST',
                            data: {
                                data:data 
                            },
                            success: function(response){
                                alert('Bicicleta Ingresada');
                            },
                            error: function(response){
                                alert('Server response error.');
                            }
                        });

     });
    });
    /* $("#btnSave").click(function() { 
       html2canvas($("#widget"), {
          onrendered: function(canvas) {
                //Set hidden field's value to image data (base-64 string)
                $('#img_val').val(canvas.toDataURL("image/png"));
                //Submit the form manually
                //document.getElementById("myForm").submit();
                };
           });
       });*/

     function tablaProductos(cadena){

            $.ajax({
                    url: "control/controlIPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data:{productos:cadena}, // all data will be passed here
                    success: function(data){ 
                        $("#comp").html(data);
                        $("#precio").val($('#pre').attr("value")); 
                        $("#peso").val($('#pes').attr("value")); 
                    },
                    error:function(){
                        alert("Error Ajax");
                    }
                });
        }
    </script>
    <style>
        html{ max-width: none !important; width: 1280px;  }
        body {
            background-repeat: no-repeat;
            background-position: center;
            background-image: url("images/armado.jpg");
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; }
        /*.well{background: rgba(19, 19, 19, 0.52);}*/
        /* h1,h2,h3,h4,h5 {color: #ffffff;}*/
        /*label{color: #ffffff}*/
        #productos { float: left; width: 300px; height: 500px; margin:10px;  }
        #productos h4 { line-height: 16px; margin: 0 0 0.4em; }
        #armado { margin:auto; position: relative; width: 50%; }
        #lista {float:left; width: 320px; height: 600px; border: 1px solid black; }
        #cont-marco { width: 600px; height: 400px; left:65px; top:85px; margin: 10px; z-index: 3; position: absolute; padding: 30px 65px 15px 65px; /*border: 1px solid;*/}
        #cont-rueda { width: 270px; height: 270px; left:35px; top:260px; z-index: 1; position: absolute; /*border: 1px solid;*/}
        #cont-rueda2 { width: 270px; height: 270px; right:0px; top:260px; z-index: 1; position: absolute; /*border: 1px solid;*/}
        #cont-horquilla { width: 60px; height: 335px; right:157px; top:87px; z-index: 4; position: absolute;
            -ms-transform: rotate(-23deg); /* IE 9 */
            -webkit-transform: rotate(-23deg); /* Chrome, Safari, Opera */
            transform: rotate(-23deg); /*border: 1px solid;*/}
        #cont-pinones{width:70px; height:70px; left:135px; top:358px; z-index: 4; position: absolute; /*border: 1px solid;*/}    
        #cont-cambioTra{width:50px; height:65px; left:155px; top:383px; z-index: 5; position: absolute; /*border: 1px solid;*/}
        #cont-biela{width:115px; height:100px; left:318px; top:345px; z-index: 4; position: absolute; /*border: 1px solid;*/}
        #cont-sillin{width:145px; height:60px; left:206px; top:95px; z-index: 4; position: absolute; 
            -ms-transform: rotate(-30deg); /* IE 9 */
            -webkit-transform: rotate(-30deg); /* Chrome, Safari, Opera */
            transform: rotate(-30deg); /*border: 1px solid;*/}
        #cont-tija{width: 45px; height: 82px; left:300px; top:155px; z-index: 1; position: absolute;
            -ms-transform: rotate(-30deg); /* IE 9 */
            -webkit-transform: rotate(-30deg); /* Chrome, Safari, Opera */
            transform: rotate(-30deg); /*border: 1px solid;*/}
        #cont-manubrio{width: 80px; height: 80px; right:215px; top:50px; z-index: 4; position: absolute; /*border: 1px solid;*/}
        #cont-pedal{width: 55px; height: 50px; left:398px; top:372px; z-index: 5; position: absolute; /*border: 1px solid;*/}

        #ruedas div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #marcos div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #pinones div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #cambiotrs div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #horquillas div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #bielas div{ width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #sillines div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #tijas  div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #manubrios div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #pedales div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
     
        #accordion .glyphicon { margin-right:10px; }
        .panel-collapse>.list-group .list-group-item:first-child {border-top-right-radius: 0;border-top-left-radius: 0;}
        .panel-collapse>.list-group .list-group-item {border-width: 1px 0;}
        .panel-collapse>.list-group {margin-bottom: 0;}
        .panel-collapse .list-group-item {border-radius:0;}

        .panel-collapse .list-group .list-group {margin: 0;margin-top: 10px;}
        .panel-collapse .list-group-item li.list-group-item {margin: 0 -15px;border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}
        .panel-collapse .list-group-item li.list-group-item:last-child {padding-bottom: 0;}

        .panel-collapse div.list-group div.list-group{margin: 0;}
        .panel-collapse div.list-group .list-group a.list-group-item {border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}
  
    
            .carousel-control {
              padding-top:10%;
              width:5%;
            }

            .thumbnail {
    position:relative;
    overflow:hidden;
}
 
.caption {
    position:absolute;
    top:0;
    right:0;
    background:rgba(66, 139, 202, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}

p{
    font-size:12px;
}

.titu{

    font-size:14px;
}

  </style>
    
</head>

<body>

<?php include("header.php"); ?>

<!-- Draggables -->
<div class="row" style="margin: 0px 90px;">
<div class = "well col-xs-12">
    <form id="myForm">
        <div class="col-xs-4">
        <label> Peso : </label>
        <div class="input-group">
        <input type="text" id="peso" name="peso" class="form-control" value="" disabled>
        <div class="input-group-addon">grs.</div>
        </div>
        </div>
        <div class="col-xs-4 col-xs-offset-1">
        <label> Precio : </label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="text" id="precio" name="precio" class="form-control" value="" disabled>

        </div>
            </div>
        <div class="col-xs-2 col-xs-offset-1">
            <a  id="btn1" class="btn btn-danger"> Limpiar</a>
            <a id="btnSave" class="btn btn-fresh"><span class="glyphicon glyphicon-floppy-saved"> </span> Guardar Creacion</a>

            </div>
        </div>
    </form>
</div>
</div>
<div class="row" style="margin: 0px 30px">
    <div class="well col-xs-3" style="margin: 0px 0px 0px 50px">

            <h4> Partes de Bicicletas</h4>

            <div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Ruedas</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                               
                                <div id="ruedas" class="gallery ui-helper-reset ui-helper-clearfix">
                                  
                                    <div id="rueda1" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/RUEDA DE 26''.png" style="width:100%; height:100%"/>
                                    </div>
                                    <div id="rueda2" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/RUEDA DE 27.5''.png" style="width:95%; height:95%; margin:3%;"/>
                                    </div>
                                    <div id="rueda3" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/RUEDA DE 29''.png" style="width:90%; height:90%; margin:5%;"/>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Marcos</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div id="marcos" class="gallery ui-helper-reset ui-helper-clearfix">
                                    
                                    <?php foreach ($marcos as $key => $m) { ?>
                                        
                                    <div id="marcos<?php print($m['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="marco" value="<?php print($m['pro_cod']); ?>">
                                        <img src="../<?php print($m['pro_imagen']);?>" style="width:90%; height: 80%;"/>
                                    </div>    
                                    


                                    <?php } ?>
                                
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Piñones</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div id="pinones" class="gallery ui-helper-reset ui-helper-clearfix">
                                    
                                    <?php foreach ($pinones as $key => $p) { ?>
                                    <div id="pinones<?php print($p['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="pinones" value="<?php print($p['pro_cod']); ?>">
                                        <img src="../<?php print($p['pro_imagen']); ?>" style="width:100%; height: 100%"/>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Cambio Trasero</a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">  
                                <div id="cambiotrs" class="gallery ui-helper-reset ui-helper-clearfix">
                                    
                                    <?php foreach ($cambiotrs as $key => $c) { ?>
                                    <div id="cambiotrs<?php print($c['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="cambioTrs" value="<?php print($c['pro_cod']); ?>">
                                        <img src="../<?php print($c['pro_imagen']); ?>" style="width:100%; height: 100%"/>
                                    </div>
                                    <?php } ?>

                                </div>
                                
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Horquillas</a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div id="horquillas" class="gallery ui-helper-reset ui-helper-clearfix">
                                    
                                    <?php foreach ($horquillas as $key => $h) { ?>
                                    <div id="horquilla<?php print($h['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="horquilla" value="<?php print($h['pro_cod']); ?>">
                                        <img src="../<?php print($h['pro_imagen']); ?>" style="width:60%; height: 100%; margin:0% 10%;"/>
                                    </div>
                                     <?php } ?>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                        Sillin</a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div id="sillines" class="gallery ui-helper-reset ui-helper-clearfix">
                                    <?php foreach ($sillin as $key => $s) { ?>
                                    <div id="sillin<?php print($s['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" name="sillin" style="display:inline-block" value="<?php print($s['pro_cod']); ?>">
                                        <img src="../<?php print($s['pro_imagen']); ?>" style="width:100%; height: 100%"/>
                                    </div>
                                     <?php } ?>
                                </div>
                            </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">
                                        Tija</a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse">
                                <div id="tijas" class="gallery ui-helper-reset ui-helper-clearfix">
                                    <?php foreach ($tijas as $key => $t) { ?>
                                    <div id="tija<?php print($t['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="tija" value="<?php print($t['pro_cod']); ?>">
                                        <img src="../<?php print($t['pro_imagen']); ?>" style="width:100%; height: 100%"/>
                                    </div>
                                     <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                        Biela</a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div id="bielas" class="gallery ui-helper-reset ui-helper-clearfix">
                                     <?php foreach ($bielas as $key => $b) { ?>
                                    <div id="biela<?php print($b['pro_cod']); ?>" class="ui-widget-content ui-corner-tr" style="display:inline-block" name="bielas" value="<?php print($b['pro_cod']); ?>">
                                        <img src="../<?php print($b['pro_imagen']); ?>" style="width:100%; height: 100%"/>
                                    </div>
                                     <?php } ?>
                                </div>
                            </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                        Pedales</a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div id="pedales" class="gallery ui-helper-reset ui-helper-clearfix">
                                  
                                    <div id="pedal1" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/pedal1perfil.png" style="width:80%; height: 30%; margin:35% 10%;"/>
                                    </div>
                                    <div id="pedal2" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/pedal2perfil.png" style="width:80%; height: 30%; margin:35% 10%;"/>
                                    </div>
                                    <div id="pedal3" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/pedal3perfil.png" style="width:80%; height: 30%; margin:35% 10%;"/>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                        Manubrio</a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div id="manubrios" class="gallery ui-helper-reset ui-helper-clearfix">
                                    <div id="manubrio1" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                                    </div>

                                     <div id="manubrio2" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio1.png" style="width:100%; height: 100%"/>
                                    </div>

                                     <div id="manubrio3" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio2.png" style="width:100%; height: 100%"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Accesorios</a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div id="manubrios" class="gallery ui-helper-reset ui-helper-clearfix">
                                    <div id="acce1" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                                    </div>
                                
                               
                                    <div id="acce2" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                                    </div>
                               
                                    <div id="acce3" class="ui-widget-content ui-corner-tr" style="display:inline-block">
                                        <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>

            </div>
    </div>

    <!-- Contenedores -->

    <div class="well col-xs-8">
        <h3> Arma Tu Bicicleta Aqui</h3>
        <div id="widget" style="position: relative; height:550px; border: 1px solid #cccccc; background: white;">
            <div id="cont-marco" class="ui-widget-header">

            </div>
            <div id="cont-rueda" class="ui-widget-header">


            </div>
            <div id="cont-rueda2" class="ui-widget-header">


            </div>
            <div id="cont-pinones" class="ui-widget-header">


            </div>
             <div id="cont-cambioTra" class="ui-widget-header">


            </div>
            <div id="cont-horquilla" class="ui-widget-header">


            </div>
            <div id="cont-biela" class="ui-widget-header">


            </div>
            <div id="cont-pedal" class="ui-widget-header">


            </div>
            <div id="cont-tija" class="ui-widget-header">


            </div>
            <div id="cont-sillin" class="ui-widget-header">


            </div>
            <div id="cont-manubrio" class="ui-widget-header">


            </div>
        </div>
    </div>
    </div>
    <div class="row" style="margin: 0px 0px 0px 100px">
    <div class="well col-xs-11">
        <h4>Detalles</h4>
        <form id="myForm">
        <div id="comp">
    
        </div>
        <input type="hidden" id="img_val" name="img_val"/>
    </form>
    </div>
     
    </div>
    </br>
    </br>
    <!-- Cotizacion -->
    <?php
           
           include("modals/modal_rueda.php");
           include("modals/modal_biela.php");
           include("modals/modal_manubrio.php");
    ?>

</div>
</body>
</html>