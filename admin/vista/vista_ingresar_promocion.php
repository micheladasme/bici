<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}
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
          <div class="well" style="height:800px;">
            <br>
           <h3 class="text-center">Ingresar Promocion</h3><hr>
            <br>
            <br>
         
            <div class="row">
        <div class="col-md-4 col-md-offset-4">         
          <form id="iform"  method="POST" action="../../control/superadmin/controlRPromocion.php" enctype="multipart/form-data">

      
      <p> Codigo Promocion:  <input type="text" id="txt_cod_pro" name="txt_cod_pro" onkeypress="ValidaSoloNumeros()" class="form-control" required/>    </p>
      <p> Nombre Promocion:  <input type="text" id="txt_prom" name="txt_prom" class="form-control" required/>    </p>
      <p> Precio Compra:  <div class="input-group"><span class="input-group-addon">$</span><input type="text" id="txt_precioc" name="txt_precioc" onkeypress="ValidaSoloNumeros()" class="form-control" required/> </div>  </p>

      <p> Precio Venta:  <div class="input-group"><span class="input-group-addon">$</span><input type="text" id="txt_preciov" name="txt_preciov" onkeypress="ValidaSoloNumeros()" class="form-control" required/> </div>  </p>
     
     
       
       </br>
       </br>
           <p> <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value=" Ingresar "  /> </p>
       
      </form>
       </div>
           </div>


        
           
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
            <br>
           <br>
           <br>
           <br>
            <br>
           <br>
           <br>
           <br>
           <?php include('../includes/footer.php');  ?>
  </body>
</html>