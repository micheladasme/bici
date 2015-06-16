<?php
session_start();
include_once('../../modelo/funciones.php');

error_reporting(0);
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

$cont = cuentaCliente();


if(isset($_GET['page'])){
  $page = preg_replace("#[^0-9]#","",$_GET['page']);
}
else {
  $page = 1;
}

$reg = 10;
$last = ceil($cont/$reg);


if($page<1){

  $page=1;
}
else if($page > $last) {
  $page = $last;
}

$start=(($page-1)*$reg);



$res = muestraCliente($start,$reg);

if($last!=1){

if($page!=$last){
  $next = $page + 1;
  $paginador2 = '<a href="vista_ver_cliente.php?page='.$next.'">Siguente -></a>';
  $paginadorL = '<a href="vista_ver_cliente.php?page='.$last.'">Ultimo >></a>';
}
if($page!=1){
  $prev = $page - 1;
  $paginador = '<a href="vista_ver_cliente.php?page='.$prev.'"><- Anterior</a>';
  $paginadorP = '<a href="vista_ver_cliente.php?page=1"><< Primero</a>';
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
    <link rel="stylesheet" type="text/css" href="../../css/promociones.css"  />
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
           <h3 class="text-center">Ver Cliente</h3><hr>
           
           <form id="iform" name="iform">
            <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Rut..." required/>
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
                            RUT
                        </th>
                        <th>
                             Nombre 
                        </th>
                        <th>
                             Apellido 
                        </th>
                         <th>
                            Correo
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Direccion
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Password
                        </th>
                    </tr>

            </thead>
             <tbody>
           <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = buscaClienterut($_GET['txt_consulta']);
              foreach ($res2 as $f) {
           echo (
            "<tr>".
           
            "<td>".$f['cli_rut']."</td>".
            "<td>".$f['cli_nombre']."</td>".
            "<td>".$f['cli_apellido']."</td>".
            "<td>".$f['cli_correo']."</td>".
            "<td>".$f['cli_telefono']."</td>".
            "<td>".$f['cli_direccion']."</td>".
            "<td>".$f['cli_nick']."</td>".
            "<td>".$f['cli_pass']."</td>".
           

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
              <th style="font-weight:100"><?php echo $f['cli_rut']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_nombre']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_apellido']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_correo']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_telefono']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_direccion']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_nick']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_pass']; ?></th>              
          </tr>
<?php
    }
?>
            
 <?php } 
             else 
             {
               echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Clientes</h4></td></tr>");
             } 

           }?>
           </tbody>  
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