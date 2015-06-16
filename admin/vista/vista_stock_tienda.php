<?php
session_start();
include('../../modelo/funciones.php');

error_reporting(0);
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

$cont = cuentaStockTienda();


if(isset($_GET['page'])){
  $page = preg_replace("#[^0-9]#","",$_GET['page']);
}
else {
  $page = 1;
}

$reg = 12;
$last = ceil($cont/$reg);


if($page<1){

  $page=1;
}
else if($page > $last) {
  $page = $last;
}

$start=(($page-1)*$reg);
$res = muestraStockTienda($start,$reg);

if($last!=1){

if($page!=$last){
  $next = $page + 1;
  $paginador2 = '<a href="vista_stock_tienda.php?page='.$next.'">Siguente -></a>';
  $paginadorL = '<a href="vista_stock_tienda.php?page='.$last.'">Ultimo >></a>';
}
if($page!=1){
  $prev = $page - 1;
  $paginador = '<a href="vista_stock_tienda.php?page='.$prev.'"><- Anterior</a>';
  $paginadorP = '<a href="vista_stock_tienda.php?page=1"><< Primero</a>';
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../../css/stock.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
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
           <h3 class="text-center">Stock Tienda</h3><hr>
        
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

                            Codigo

                        </th>
                        <th>

                            Nombre

                        </th>
                      
                       
                         <th>

                            Stock

                        </th>
                        <th>

                            Ubicacion

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
            "<tr>".
            
            "<td>".$f['pro_cod']."</td>".
            "<td>".$f['pro_nombre']."</td>".
           
            "<td>".$f['pu_cantidad']."</td>".
            "<td>".$f['ubc_descripcion']."</td>".
            "<th><a href='../../control/superadmin/controlEStock.php?codigo=".$f['pu_id']."'  class='btn btn-sm btn-danger' role='button'><span class='glyphicon glyphicon-trash'></span>&nbsp Eliminar</a>  </th>".

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
          <tr>
              <th style="font-weight:100"><?php echo $f['pro_cod']; ?></th>
              <th style="font-weight:100"><?php echo $f['pro_nombre']; ?></th>
             
              <th style="font-weight:100"> <?php echo $f['pu_cantidad']; ?></th>
              <th style="font-weight:100"> <?php echo $f['ubc_descripcion']; ?></th>
              <th><a href="../../control/controlEStock.php?codigo=<?php echo $f['pu_id']; ?>" class="btn btn-sm btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp Eliminar</a>  </th>
          </tr>
<?php
    }
?>
            </tbody>  
 <?php } 
             else 
             {
                echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Productos</h4></td></tr>");
             } 
           }?>

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