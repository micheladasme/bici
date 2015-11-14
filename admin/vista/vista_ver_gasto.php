<?php
session_start();

include('../modelo/modelo_gastos.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}


$res = muestraGasto();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../css/caja.css"  />
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> 
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
          <div class="well" style="height:800px;">
           <p><h3>Gastos</h3></p>
           <br>
            <form id="iform" name="iform">
            <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="date" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por fecha..." required/>
                <div class="input-group-btn">
                 <button type="submit" class="btn btn-default" id="btn_consulta">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </div>
          </div>
           </form>
           <br>
           <p></p>
           <br>
           <table class="table">
            <thead>
                    <tr>
                        <th>
                            Fecha Gasto
                        </th>
                        <th>
                            Tipo Gasto
                        </th>
                        <th>
                            Cantidad Dinero
                        </th>
                         <th>
                            Descripcion
                        </th>
                         <th>
                            Eliminar
                        </th>
                    </tr>
  </thead>
  <tbody> <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = muestraGastofecha($_GET['txt_consulta']);
              foreach ($res2 as $f) {
           echo (
            "<tr class='post'>".
            
            "<td>".$f['gas_fecha']."</td>".
            "<td>".$f['tg_descripcion']."</td>".
            "<td>$".$f['gas_monto']."</td>".
            "<td>$".$f['gas_descripcion']."</td>".
            "<th><a href='../control/controlEGasto.php?codigo=".$f['gas_id']."'  class='btn btn-sm btn-danger' role='button'><span class='glyphicon glyphicon-trash'></span>&nbsp Eliminar</a>  </th>".
            
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
              <th style="font-weight:100"><?php echo $f['gas_fecha']; ?></th>
              <th style="font-weight:100"><?php echo $f['tg_descripcion']; ?></th>
              <th style="font-weight:100">$ <?php echo $f['gas_monto']; ?></th>
              <th style="font-weight:100"><?php echo $f['gas_descripcion']; ?></th>
              <th><a href="../control/controlEGasto.php?codigo=<?php echo $f['gas_id']; ?>" class="btn btn-sm btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp Eliminar</a>  </th>
          </tr>
<?php
    }
?>
            </tbody>  
 <?php } 
             else 
             {
               echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Gastos</h4></td></tr>");
             } }?>
           </table>
              <?php include('/includes/paginador.php');  ?>
              <?php include('/includes/footer.php');  ?>
  </body>
</html>