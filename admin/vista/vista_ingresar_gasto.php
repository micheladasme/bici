<?php
session_start();
include('../modelo/modelo_gastos.php');

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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> <script>
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }

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

       $('.dropdown-toggle').dropdown()

     </script>
 </head>

  <body>

  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:800px;">
            <br>
            <h3 class="text-center">Ingresar Gasto</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-6 col-md-offset-3">         
          



          <form id="iform"  method="POST" action="../control/superadmin/controlRGastoA.php"  enctype="multipart/form-data">
      <p> Tipo Gasto : <select name="sel_tipo" class="form-control"  id="sel_tipo">
                           <option value="1">Merma</option>
                            <option value="2">Gasto Local</option>    
                             <option value="3">Mercaderia</option>          
                       </select>  </p>
     
      <p> Monto  <input type="text" id="txt_cant" onkeypress="ValidaSoloNumeros()" name="txt_cant" class="form-control" required/>    </p>
      <p> Descripcion :  <textarea id="ta_desc" name="ta_desc" class="form-control" rows="5" required> </textarea>   </p>     
       </br>
       </br>
           <p> <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value=" Ingresar " align="center" /> </p>
       
      </form>
       </div>
           </div>
           </div>

        
           
             <?php include('/includes/footer.php');  ?>
  </body>
</html>