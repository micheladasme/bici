<?php
session_start();
include('../modelo/funciones.php');
include('../modelo/login.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
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
    <script type="text/javascript">
        $( document ).ready(function() {
            $("[rel='tooltip']").tooltip();
            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });



        function salir(){
            var respuesta=confirm('Desea realmente Cerrar Sesion?');
            if(respuesta==true)
                window.location="salir.php";
            else
                return 0;
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
        #cont-marco { width: 500px; height: 400px; left:80px; top:20px; margin: 10px; z-index: 3; position: absolute; padding: 30px 65px 15px 65px; border: 1px solid #000000;}
        #cont-rueda { width: 240px; height: 240px; left:59px; top:210px; z-index: 1; position: absolute; border: 1px solid #000000;}
        #cont-rueda2 { width: 240px; height: 240px; right:48px; top:210px; z-index: 1; position: absolute; border: 1px solid #000000;}
        #cont-horquilla { width: 40px; height: 210px; right:200px; top:150px; z-index: 4; position: absolute;
            -ms-transform: rotate(-30deg); /* IE 9 */
            -webkit-transform: rotate(-30deg); /* Chrome, Safari, Opera */
            transform: rotate(-30deg); border: 1px solid #000000;}
        #cont-biela{width: 100px; height: 100px; left:340px; top:275px; z-index: 4; position: absolute; border: 1px solid #000000;}
        #cont-sillin{width: 120px; height: 100px; left:230px; top:110px; z-index: 4; position: absolute; border: 1px solid #000000;}
        #cont-manubrio{width: 70px; height: 70px; right:255px; top:70px; z-index: 4; position: absolute; border: 1px solid #000000;}

        #ruedas div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #marcos div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #horquillas div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #bielas div{ width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #sillines div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
        #manubrios div { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}


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
    </style>

</head>

<body>

<?php include("header.php"); ?>

<!-- Draggables -->
<div class="row" style="margin: 0px 90px;">
    <div class = "well col-xs-12">
        <form class="form-inline">
            <div class="col-xs-4">
                <label> Peso : </label>
                <div class="input-group">
                    <input type="text" id="peso" name="peso" class="form-control" disabled>
                    <div class="input-group-addon">grs.</div>
                </div>
            </div>
            <div class="col-xs-4 col-xs-offset-1">
                <label> Precio : </label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="text" class="form-control" disabled>

                </div>
            </div>
            <div class="col-xs-2 col-xs-offset-1">
                <a  id="btn1" class="btn btn-danger"> Limpiar</a>
                <a class="btn btn-fresh"><span class="glyphicon glyphicon-floppy-saved"> </span> Guardar Creacion</a>

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
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Ruedas</a>
                        </h4>
                    </div>
                    <div id="collapseOne">
                        <div id="ruedas" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="rueda1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/rueda_montana.png" style="width:100%; height: 100%"/>
                            </div>
                            <div id="rueda2" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/RUEDA DE 26''.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Marcos</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div id="marcos" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="marcos1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/canvas.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                Horquillas</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div id="horquillas" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="horquilla1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/horquilla.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                Sillin</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div id="sillines" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="sillin1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/sillin_fierro_abajo.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                Biela</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div id="bielas" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="biela1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/biela.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                Manubrio</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div id="manubrios" class="gallery ui-helper-reset ui-helper-clearfix">
                            <div id="manubrio1" class="ui-widget-content ui-corner-tr">
                                <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiv">Accesorios</a>
                        </h4>
                    </div>
                    <div id="collapseFiv" class="panel-collapse collapse">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">List group item heading</h4>
                                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            </a>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="list-group-item-heading">List group item heading</h4>
                                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            </a>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">List group item heading</h4>
                                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Contenedores -->

    <div class="well col-xs-8">
        <h3> Arma Tu Bicicleta Aqui</h3>
        <hr>

        <div id="cleta" style="position: relative; height:500px; border: 1px solid #cccccc; background: white;">
            <div id="cont-marco" class="ui-widget-header">

            </div>
            <div id="cont-rueda" class="ui-widget-header">


            </div>
            <div id="cont-rueda2" class="ui-widget-header">


            </div>
            <div id="cont-horquilla" class="ui-widget-header">


            </div>
            <div id="cont-biela" class="ui-widget-header">


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
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
            </tr>
            </thead>

            <tbody>
            </tbody>

        </table>


    </div>
</div>
</br>
</br>
<!-- Cotizacion -->
<?php

include("modals/modal_rueda.php");
?>

</div>
</body>
</html>