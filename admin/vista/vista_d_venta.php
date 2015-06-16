<?php
session_start();
  // Incluir Funciones
include_once('../modelo/funciones.php');

if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}
  // Obtener variables
 $id = $_GET['id'];
  // Llamar a la función.
   $datos = detalleVenta($id);
   $datos2 = detalleVenta2($id);
  // Llenamos los campos
 // foreach($datos as $d)
  //{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
 </head>
<body>
<div class="container"><br>
  <div class="well" style="height:420px; width:460px">
    <h3 class="text-center">Detalle Venta</h3>
    <hr>
      <p>Codigo Boleta : <?php echo $id?>  </p>
      
      <?php

        foreach ($datos as $f) {
        
        echo
        ("
        <p>Vendedor : ".$f['usu_nombre']."&nbsp;".$f['usu_apellido']."</p>
        <br>
        <table class='table'>
        <thead>
        <tr><th>Codigo</th><th>Nombre</th><th>Cantidad</th><th>Subtotal</th></tr></thead><tbody>");
          foreach ($datos2 as $a) 
          {     
          echo("<tr><td>".$a['pro_cod']."</td> <td>".$a['pro_nombre']."</td><td>".$a['bol_cantidad']."</td><td>$".$a['bol_subtotal']."</td>  </tr>");
        }
        echo("</tbody></table><br><p> Total Compra : $".$f['com_total']."   </p> 
        <p> Tipo Pago : ".$f['tipo_modo']." </p>");
       
      }
        ?>
        
        
      </div>
    </div>
  </div></div>
</body>