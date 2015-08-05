<?php
session_start();
include_once('../../modelo/funciones.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}


$res = muestraPromocion();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar Promocion</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../../css/promociones.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
    <script src="../js/paginate.js"></script>
    <script src="../js/custom.js"></script>
     <script type="text/javascript">
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }
      
       $('.dropdown-toggle').dropdown()

     </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
       
          <div class="well" style="height:auto;">
           <h3 class="text-center">Eliminar Promociones</h3><hr>
           <br>
            <form id="iform" name="iform">
          <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Nombre..." required/>
                <div class="input-group-btn">
                 <button type="submit" class="btn btn-default" id="btn_consulta">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </div>
          </div>
          </form>
           <br>
           <br>
           <br>
           
           <table class="table">
            <thead>
                    <tr>
                       
                        <th>
                            Codigo Producto
                        </th>
                        <th>
                            Nombre Promocion
                        </th>
                        <th>
                            Precio Venta
                        </th>
                         
                        <th>
                            Precio Compra
                        </th>     
                        <th>
                            Eliminar
                        </th>   
                    </tr>

            </thead>
            <tbody>
                  <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = muestraStockTiendanom($_GET['txt_consulta']);
              foreach ($res2 as $f) {
           echo (
            "<tr class='post'>".
            
            "<td>".$f['pro_cod']."</td>".
            "<td>".$f['pro_nombre']."</td>".
            "<td>$".$f['pro_precio_venta']."</td>".
            "<td>$".$f['pro_precio_compra']."</td>".
            "<th><a href='../../control/superadmin/controlEPromocion.php?codigo=".$f['pro_cod']."'  class='btn btn-sm btn-danger' role='button'><span class='glyphicon glyphicon-trash'></span>&nbsp Eliminar</a>  </th>".

            "</tr>"
            );

           
             }
        }  

              else 
              {



                ?>  


            <?php if($res==true) { ?>
          

 <?php
     
      // Llenamos la tabla
      foreach($res as $f)
    {
?>
          <tr class="post">
                     
              <th style="font-weight:100"><?php echo $f['pro_cod']; ?></th>
              <th style="font-weight:100"><?php echo $f['pro_nombre']; ?></th>
              <th style="font-weight:100">$ <?php echo $f['pro_precio_compra']; ?></th>
              <th style="font-weight:100"><?php echo $f['pro_precio_venta']; ?></th>
              <th width="30px"><a href="../../control/superadmin/controlEPromocion.php?codigo=<?php echo $f['pro_cod']; ?>" class="btn btn-sm btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp Eliminar</a></th>
          </tr>
          <?php
              }
            ?>
            </tbody>  

             <?php } 
             else 
             {
               echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Promociones</h4></td></tr>");   
             }
              } ?>

           </table>

            <br>
          <ul class="pager">
            <li>
              <?php 
            echo $paginadorP;
            ?> 
            </li>
            <li>
             <?php 
            echo $paginador;
            ?> 
            </li>
            <li>
              <?php 
            echo $paginador2;
            ?> 
            </li>
            <li>
              <?php 
            echo $paginadorL;
            ?> 
            </li>
            </ul>
          </div>
           <br>
           <br>
             <?php include('../includes/footer.php');  ?>
  </body>
</html>