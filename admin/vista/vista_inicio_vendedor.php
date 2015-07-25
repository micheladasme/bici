<?php
session_start();
include('../modelo/funciones.php');
include('../modelo/login.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

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
            <br>
            <p><h3>Bienvenido a el Sistema de Venta, dirijase al menu para elegir la funcion que desea realizar.</h3></p>
             
        
          </div>
           <br>
           <br>
             <?php include('includes/footer.php');  ?>
             <?php include('modal/modal_inicio_caja.php') ?>

       <script type="text/javascript">
        $('#mimodal').modal('show')
       </script>
  </body>
</html>