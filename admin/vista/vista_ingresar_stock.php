<?php
session_start();
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
      <script src="../js/bootstrap.min.js"></script> <script>
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
            <h3 class="text-center">Ingresar Stock</h3><hr>
            <br>
            <br>
            <br>
            <div class="row">
        <div class="col-md-4 col-md-offset-4">         
          <form id="iform" action="../control/controlRStock.php"  method="post" >
       
         
       <p> Codigo :  <input type="text" id="txt_cod" name="txt_cod" onkeypress="ValidaSoloNumeros()" class="form-control" required/>    </p>

      <p> Ubicacion : <select name="sel_ubi" class="form-control"  id="sel_ubi">
                           <option value="1">Tienda</option>
                            <option value="2">Bodega</option>             
                       </select>  </p>
     
      <p> Cantidad  <input type="number" id="txt_cant" name="txt_cant" onkeypress="ValidaSoloNumeros()" class="form-control" required/>    </p>
      
     
       
       </br>
       </br>
           <p> <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value=" Ingresar " align="center" /> </p>
       
      </form>
       </div>
           </div>
           </div>
            <?php include('/includes/footer.php');  ?>
  </body>
</html>