<?php
session_start();
include('../modelo/modelo_pedidos.php');

if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

$res = muestraPedidos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../css/promociones.css"  />
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
     <script src="../js/paginate.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript">

    function sigPaso(id_bici,est){

    $.ajax({
    url: "../control/controlUPedido.php", // link of your "whatever" php
    type: "POST",
    data:{codigo:id_bici,
          estado:est}, // all data will be passed here
    success: function(data){
     alert(data);

    }
    });
    }

    function anularBici(id_bici){

    $.ajax({
    url: "../control/controlEPedido.php", // link of your "whatever" php
    type: "POST",
    data:{codigo:id_bici}, // all data will be passed here
    success: function(data){
     alert(data);
     location.reload();

    }
    });
    }

    function modalDetallePedidos(id_bici){

    $.ajax({
    url: "../control/controlVPedido.php", // link of your "whatever" php
    type: "POST",
    data:{codigo:id_bici}, // all data will be passed here
    success: function(data){
        $("#divModal").html(data);

    }
    });
    }

        function salir(){
            var respuesta=confirm('Desea realmente Cerrar Sesion?');
            if(respuesta==true)
                window.location="../salir.php";
            else
                return 0;
        }

        $('.dropdown-toggle').dropdown()

    </script>
</head>

<body>


<?php include($_SESSION['header']); ?>


    <div class="well">
    <h3>Pedidos</h3>
    <hr>
    <div class="row">

    <?php 
    if($res==true){
    foreach ($res as $key => $v) { ?>
     <div class="col-sm-6 col-md-4" class="post">
    <div class="thumbnail">
      <img src="../../app/images/<?php print($v['ped_imagen']); ?>" class="img-responsive" alt="img bici">
      <div class="caption">
        <p><span class="label label-primary"><?php print($v['est_nombre']); ?></span></p>
        <h3>Bicicleta N°<?php print($v['ped_id']); ?></h3>
        <p>Fecha de Creacion: <?php print($v['ped_fecha']); ?></p>
        <p>Precio: $<?php print($v['ped_subtotal']); ?>             *Mano de Obra No Incluida</p>
        <p>Peso: <?php print($v['ped_peso']); ?> grs</p>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <a href="#" onClick="modalDetallePedidos(<?php print($v['ped_id']);?>)"  class="btn btn-primary" role="button">Ver Mas >></a>
         <?php 
          $res2 = siguenteEstado($v['est_id']);  
         foreach ($res2 as $key => $x) { 
            ?>
            <a href="#" onClick="sigPaso(<?php print($v['ped_id'].",".$x['est_id']);?>)"  class="btn btn-success" role="button"><?php print($x['est_nombre']." >>");?></a>
          <?php }?>
          <a href="#" onClick="anularBici(<?php print($v['ped_id']);?>)"  class="btn btn-danger" role="button">Anular Pedido</a> 
        
        </div>
      </div>
    </div>
  </div>
    <?php } 
     } else { echo ("<h4>&nbsp;&nbsp;&nbsp;No hay Pedidos</h4>"); } ?>
</div>
    </div>

  <div id="divModal">
  </div>
   
<?php include('/includes/footer.php');  ?>
</body>
</html>