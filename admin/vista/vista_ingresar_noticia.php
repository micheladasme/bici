<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

include_once("../../modelo/funciones.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingresar Noticia</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
  

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
     <script type="text/javascript">
     
    
       
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }
      
       

     </script>
 </head>

  <body>




  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:auto;">
          
            <h3 class="text-center">Ingresar Noticia</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-4 col-md-offset-4"><!--col-md-6 col-md-offset-3-->        
          <form id="iform"  method="POST" action="../../control/superadmin/controlRNoticia.php" enctype="multipart/form-data">
       Título : <input name="not_titulo" type="text" class="form-control" required autofocus/> <br />
       Subtitulo : <input name="not_subtitulo" type="text" class="form-control" required/> <br />
       Imagen : <input name="not_imagen" type="file" class="form-control"/> <br />
       Contenido : <textarea name="not_contenido" class="form-control" rows="8" required/></textarea> <br />
       

        <input type="submit" name="publicar" class="btn btn-primary btn-lg btn-block" value="Publicar"/>
    <!--<p> Imagen : <input type="file" id="imagen" name="imagen" required/>    </p>    </p>-->
                    
    
      <br>
    <!-- <input type="submit" id="añadir" name="añadir" class="btn btn-primary btn-lg btn-block" value="Publicar"/>-->
       
      </form>
       </div>
           </div>
</div>
            <?php include('../includes/footer.php');  ?>

              </body>
</html>