<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

include_once("../../modelo/funciones.php");

$link = conectar();
$consulta = "select cat_id , cat_nombre from categorias order by cat_id asc";
$result=mysql_query($consulta , $link);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingresar Sub-Categoria</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../../css/productos.css"  />

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
     <script type="text/javascript">
     
     function ValidaSoloNumeros() {
        var code =event.charCode || event.keyCode;
        if ((code< 48) || (code> 57)){
        if(window.event){
        event.returnValue = false;
        }else{
        event.preventDefault();
        }

        }
        }
      
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
          
            <h3 class="text-center">Ingresar Sub-Categoria</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-4 col-md-offset-4"><!--col-md-6 col-md-offset-3-->        
          <form id="iform"  method="POST" action="../../control/superadmin/controlRSubCategoria.php" enctype="multipart/form-data">
            <p> Nombre Sub-Categoria :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" required/>    </p>
            <p> Categoria: <select name="sel_categoria" id="sel_categoria" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila=mysql_fetch_row($result)){
                                  echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";              
                                        }
                                  ?>
                                </select>   </p>
                                       
      <br>
      <br>
      <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value="Ingresar"/> 
       
      </form>
       </div>
           </div>
</div>
            <?php include('../includes/footer.php');  ?>

              </body>
</html>