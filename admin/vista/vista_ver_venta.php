<?php
session_start();

include('../modelo/modelo_venta.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}


$res = muestraVenta();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
  
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> 
       <script src="../js/paginate.js"></script>
      <script src="../js/custom.js"></script>
     <script type="text/javascript">
    
      
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

  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:800px;">
           <p><h3>Ventas</h3></p>
           <br>
           <br>
           <table class="table">
            <thead>
                    <tr>
                        <th>
                            Vendedora
                        </th>
                        <th>
                            Fecha
                        </th>
                       
                        <th>
                            Total
                        </th>
                         <th>
                            Modo Pago
                        </th>
                        <th>
                         Detalles
                        </th>
                    </tr>
  </thead>
            <?php if($res==true) { ?>
            <tbody>
 <?php
     
      // Llenamos la tabla
      foreach($res as $f)
    {
?>
          <tr class="post">
              <th style="font-weight:100"><?php echo $f['usu_nombre']; ?></th>
              <th style="font-weight:100"><?php echo $f['com_fecha']; ?></th>
              <th style="font-weight:100">$ <?php echo $f['com_total']; ?></th>
               <th style="font-weight:100"><?php echo $f['tipo_modo']; ?></th>
            <td>
              <a href="vista_ver_venta.php?id=<?php echo $f["com_id"]; ?>"
                                               class="btn btn-xs btn-info"><span
                            class='glyphicon glyphicon-plus-sign'></span> Ver Mas >></a>
              <a class="btn btn-danger btn-xs" href="../control/controlAnulaVenta.php?id=<?php echo $f['com_id']; ?>"  role="button">  
               Anular <span class="glyphicon glyphicon-remove"></span>
              </a>
                </td>
          </tr>
<?php
    }
?>
            </tbody>  
 <?php } 
             else 
             {
               echo ("<h4>&nbsp;&nbsp;&nbsp;No hay Ventas por Ver</h4>");
             } ?>
           </table>
            
          <?php include('includes/paginador.php');   ?>
         <?php include('/modal/modal_detalle_venta.php'); ?>
            <?php include('includes/footer.php');  ?>
  </body>
</html>