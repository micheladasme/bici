<?php
session_start();
error_reporting(0);
include('../../modelo/funciones.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

$cont = cuentaVenta();


if(isset($_GET['page'])){
  $page = preg_replace("#[^0-9]#","",$_GET['page']);
  $start=(($page-1)*$reg);
}
else {
  $page = 1;
  $start=(($page-1)*0);
}

$reg = 12;
$last = ceil($cont/$reg);


if($page<1){

  $page=1;
}
else if($page > $last) {
  $page = $last;
}



$res = muestraVenta($start,$reg);
if($last!=1){

if($page!=$last){
  $next = $page + 1;
  $paginador2 = '<a href="vista_ver_venta.php?page='.$next.'">Siguente -></a>';
  $paginadorL = '<a href="vista_ver_venta.php?page='.$last.'">Ultimo >></a>';
}
if($page!=1){
  $prev = $page - 1;
  $paginador = '<a href="vista_ver_venta.php?page='.$prev.'"><- Anterior</a>';
  $paginadorP = '<a href="vista_ver_venta.php?page=1"><< Primero</a>';
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
    <link rel="stylesheet" type="text/css" href="../../css/caja.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
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
          <tr>
              <th style="font-weight:100"><?php echo $f['usu_nombre']; ?></th>
              <th style="font-weight:100"><?php echo $f['com_fecha']; ?></th>
              <th style="font-weight:100">$ <?php echo $f['com_total']; ?></th>
               <th style="font-weight:100"><?php echo $f['tipo_modo']; ?></th>
            <td>
              <a class="btn btn-info btn-xs" href="javascript:window.open('vista_d_venta.php?id=<?php echo $f['com_id']; ?>', 'nuevo', 'top=0, left=0, toolbar=no,location=no, status=no,menubar=no,scrollbars=no, resizable=no, width=500,height=470')" role="button" >  
               Ver Mas >>
              </a>
              <a class="btn btn-danger btn-xs" href="../../control/superadmin/controlAnulaVenta.php?id=<?php echo $f['com_id']; ?>"  role="button">  
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