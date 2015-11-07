<?php
session_start();
include("modelo/funciones.php");

if(!isset($_SESSION['usu_nombre']))
{header("location:index.php");}

$res = muestraCreaciones($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bici-O-Matic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <style type="text/css">
     body {
            background-repeat: no-repeat;
            background-position: center;
            background-image: url("images/armado.jpg");
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; }
    </style>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function modalCreaciones(id){

    $.ajax({
    url: "control/controlVCreacion.php", // link of your "whatever" php
    type: "POST",
    data:{codigo:id}, // all data will be passed here
    success: function(data){
        $("#divModal").html(data);

    }
    });
    }

    function eliminarCreaciones(id){

      if(confirm("¿Desea Eliminar la Bicicleta N°"+id+"?"))
      {
           $.ajax({
            url: "control/controlECreacion.php", // link of your "whatever" php
            type: "POST",
            data:{codigo:id}, // all data will be passed here
            success: function(data){
                alert(data);
                location.reload();
              }
              });
      }
      else
      { 
       
      }
   
    }

    function pedirCreacion(id){

      if(confirm("¿Desea Solicitar el Armado la Bicicleta N°"+id+"?"))
      {
           $.ajax({
            url: "control/controlACreacion.php", // link of your "whatever" php
            type: "POST",
            data:{codigo:id}, // all data will be passed here
            success: function(data){
                alert(data);
                location.reload();
              }
              });
      }
      else
      { 
       
      }
   
    }
    </script>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="row">
	<div class="well col-md-offset-1 col-xs-10">
	<h3>Creaciones</h3>
	<hr>
	<div class="row">
    <?php foreach ($res as $key => $v) { ?>
     <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/<?php print($v['ped_imagen']); ?>" class="img-responsive" alt="img bici">
      <div class="caption">
        <h3>Bicicleta N°<?php print($v['ped_id']); ?></h3>
        <p>Fecha de Creacion: <?php print($v['ped_fecha']); ?></p>
        <p>Precio: $<?php print($v['ped_subtotal']); ?>             *Mano de Obra No Incluida</p>
        <p>Peso: <?php print($v['ped_peso']); ?> grs</p>
        <p><a href="#" onClick="eliminarCreaciones(<?php print($v['ped_id']);?>)" class="btn btn-danger" role="button">Eliminar</a> <a href="#" onClick="modalCreaciones(<?php print($v['ped_id']);?>)"  class="btn btn-primary" role="button">Ver Mas >></a> <a href="#" class="btn btn-success" onClick="pedirCreacion(<?php print($v['ped_id']);?>)" role="button">Pedir Armado</a></p>
      </div>
    </div>
  </div>
    <?php } ?>
  	

</div>
	</div>
  <div id="divModal">
  </div>
</body>
</html>