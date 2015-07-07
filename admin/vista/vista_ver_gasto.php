<?php
session_start();

include('../../modelo/funciones.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

$cont = cuentaGasto();


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


$res = muestraGasto($start,$reg);
if($last!=1){

if($page!=$last){
  $next = $page + 1;
  $paginador2 = '<a href="vista_ver_gasto.php?page='.$next.'">Siguente -></a>';
  $paginadorL = '<a href="vista_ver_gasto.php?page='.$last.'">Ultimo >></a>';
}
if($page!=1){
  $prev = $page - 1;
  $paginador = '<a href="vista_ver_gasto.php?page='.$prev.'"><- Anterior</a>';
  $paginadorP = '<a href="vista_ver_gasto.php?page=1"><< Primero</a>';
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
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> <script>
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
            "<tr>".
            
            "<td>".$f['gas_fecha']."</td>".
            "<td>".$f['tg_descripcion']."</td>".
            "<td>$".$f['gas_monto']."</td>".
            "<td>$".$f['gas_descripcion']."</td>".
            "<th><a href='../../control/superadmin/controlEGasto.php?codigo=".$f['gas_id']."'  class='btn btn-sm btn-danger' role='button'><span class='glyphicon glyphicon-trash'></span>&nbsp Eliminar</a>  </th>".
            
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
              <th style="font-weight:100"><?php echo $f['gas_fecha']; ?></th>
              <th style="font-weight:100"><?php echo $f['tg_descripcion']; ?></th>
              <th style="font-weight:100">$ <?php echo $f['gas_monto']; ?></th>
              <th style="font-weight:100"><?php echo $f['gas_descripcion']; ?></th>
              <th><a href="../../control/superadmin/controlEGasto.php?codigo=<?php echo $f['gas_id']; ?>" class="btn btn-sm btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp Eliminar</a>  </th>
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