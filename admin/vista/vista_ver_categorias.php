<?php
session_start();
include_once('../modelo/modelo_categorias.php');


if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

$cont = cuentaCategoria();


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



$res = muestraCategorias($start,$reg);

if($last!=1){

if($page!=$last){
  $next = $page + 1;
  $paginador2 = '<a href="vista_ver_categorias.php?page='.$next.'">Siguente -></a>';
  $paginadorL = '<a href="vista_ver_categorias.php?page='.$last.'">Ultimo >></a>';
}
if($page!=1){
  $prev = $page - 1;
  $paginador = '<a href="vista_ver_categorias.php?page='.$prev.'"><- Anterior</a>';
  $paginadorP = '<a href="vista_ver_categorias.php?page=1"><< Primero</a>';
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
<<<<<<< .mine
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> <script>
=======
    <link rel="stylesheet" type="text/css" href="../css/promociones.css"  />
      <script type="text/javascript" src="../js/jQuery.js"></script>
    <script src="../js/bootstrap.js"></script>
>>>>>>> .r54
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
          <div class="well" style="height:auto;">
           <h3 class="text-center">Ver Categorias</h3><hr>
           
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
                            Codigo Catregoria
                        </th>
                        <th>
                             Nombre Categoria
                        </th>
                         <th>
                             Descripcion Categoria
                        </th>
                        <th>
                            Modificar 
                        </th>
                        

                    </tr>

            </thead>
             <tbody>
             <?php
             if(isset($_GET['txt_consulta']))
             {
                 $res2 = muestraCategoriaCod($_GET['txt_consulta']);
                 foreach ($res2 as $f) { ?>

                     <tr>
                         <th style="font-weight:100"><?php echo $f['cat_id']; ?></th>
                         <th style="font-weight:100"><?php echo $f['cat_nombre']; ?></th>
                         <th style="font-weight:100"><?php echo $f['cat_descripcion']; ?></th>
                         <th width="30px"><a href="vista_ver_categorias.php?codigo=<?php print($f['cat_id'])?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp Modificar</a></th>
                     </tr>


                 <?php
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
                     <th style="font-weight:100"><?php echo $f['cat_id']; ?></th>
                     <th style="font-weight:100"><?php echo $f['cat_nombre']; ?></th>
                     <th style="font-weight:100"><?php echo $f['cat_descripcion']; ?></th>
                     <th width="30px"><a href="vista_ver_categorias.php?codigo=<?php print($f['cat_id'])?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp Modificar</a></th>
                 </tr>
             <?php
             }
             ?>
             </tbody>

               <?php }
               else
               {
                   echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay categorias</h4></td></tr>");
               }   }?>

           </table>

              <?php include('/includes/paginador.php');  ?>
              <?php include('/includes/footer.php');  ?>
              <?php include('/modal/modal_modificar_categoria.php'); ?>
  </body>
</html>