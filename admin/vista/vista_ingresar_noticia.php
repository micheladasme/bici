<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

include_once("../modelo/modelo_noticias.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingresar Noticia</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />

      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> 
      <script src="../js/tinymce/tinymce.min.js"></script>
      <script>tinymce.init({selector:'textarea',language : 'es_MX', plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"
          ]});</script>
     <script type="text/javascript">
     
    
       
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../salir.php";
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
          <form id="iform"  method="POST" action="../control/controlRNoticia.php" enctype="multipart/form-data">
       Título : <input id="not_titulo" name="not_titulo" maxlength="140" type="text" class="form-control" required autofocus/> <br />
       Subtitulo : <input id="not_subtitulo" name="not_subtitulo" type="text" maxlength="140" class="form-control" required/> <br />
       Imagen : <input id="imagen" name="imagen" type="file" class="form-control"/> <br />
       Contenido : <textarea id="not_contenido" name="not_contenido" class="form-control" rows="8"/></textarea> <br />


              <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value="Ingresar"/>

              <!--<p> Imagen : <input type="file" id="imagen" name="imagen" required/>    </p>    </p>-->
                    
    
      <br>
    <!-- <input type="submit" id="añadir" name="añadir" class="btn btn-primary btn-lg btn-block" value="Publicar"/>-->
       
      </form>
       </div>
           </div>
</div>
            <?php include('/includes/footer.php');  ?>

              </body>
</html>