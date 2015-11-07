<?php
session_start();
include("modelo/funciones.php");

if(!isset($_SESSION['usu_nombre']))
{header("location:index.php");}

$res = muestraPedidos($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bici-O-Matic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>}
    <script type="text/javascript">
     function modalDetallePedidos(id){

    $.ajax({
    url: "control/controlVPedido.php", // link of your "whatever" php
    type: "POST",
    data:{codigo:id}, // all data will be passed here
    success: function(data){
        $("#divModal").html(data);

    }
    });
    }
    </script>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="row">
	<div class="well col-md-offset-1 col-md-10">
	<h3>Pedidos</h3>
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
        <p><span class="label label-primary"><?php print($v['est_nombre']); ?></span></p>
        <p><a href="#" onClick="modalDetallePedidos(<?php print($v['ped_id']);?>)"  class="btn btn-primary" role="button">Ver Mas >></a></p>
      </div>
    </div>
  </div>
    <?php } ?>
  	<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="img-responsive" src="..." alt="img bici1">
      <div class="caption">
        <h3>Bicicleta 1</h3>
        <p>...</p>
        <p><span class="label label-primary">En Proceso</span></p>
        <p><a href="#" class="btn btn-primary" role="button">Ver Mas >></a></p>
      </div>
    </div>
  </div>
</div>
	</div>
</div>
  <div id="divModal">
  </div>
</body>
</html>