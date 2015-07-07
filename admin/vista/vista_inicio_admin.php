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
             
            <div class="modal fade bs-example-modal-sm" id="mimodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
           <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Dinero en Caja</h4>
      </div>
      <form id="iform" method="POST" action="../control/superadmin/controlRDinInicial.php">
      <div class="modal-body">
        Dineno Inicial en Caja:  $ <input type="text" id="txt_din_ini" name="txt_din_ini" required/>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
  </div>
          </div>
          </div>
           <br>
           <br>
             <?php include('includes/footer.php');  ?>

       <script type="text/javascript">
        $('#mimodal').modal('show')
       </script>
  </body>
</html>