<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

include_once("../modelo/modelo_cliente.php");
$link = conectar();
$consulta = "select com.comu_id , com.comu_nombre from comuna com;";
$result=mysql_query($consulta , $link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />

      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
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
          
            <h3 class="text-center">Ingresar Nuevo Cliente</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-4 col-md-offset-4"><!--col-md-6 col-md-offset-3-->        
          <form id="iform"  method="POST" action="../control/superadmin/controlRCliente.php" enctype="multipart/form-data">
      <p> RUT : <input type="text" id="txt_cod" name="txt_cod" onkeypress="ValidaSoloNumeros()" class="form-control" required autofocus/>   </p>
      <p> Nombre :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" required/>    </p>
      <p> Apellido :   <input type="text" id="txt_ape" name="txt_ape" class="form-control" required/>    </p>
      <p> Direccion :  <textarea id="ta_dir" name="ta_dir" class="form-control" rows="2" required > </textarea>    </p>
      <p> Telefono : <input type="text" id="txt_tel" name="txt_tel" class="form-control" required/>   </p>
      <p> Correo :  <input type="text" id="txt_correo" name="txt_correo" class="form-control" required/>   </p>
      <p> Nickname :  <input type="text" id="txt_nick" name="txt_nick" class="form-control" required/>  </textarea>   </p>
      
      <p> Comuna : <select name="sel_comuna" id="sel_comuna" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila=mysql_fetch_row($result)){
                                  echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";              
                                        }
                                  ?>
                                </select></p>
     
      <br>
      <br>
      <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value="Ingresar"/> 
       
      </form>
       </div>
           </div>
</div>
            <?php include('/includes/footer.php');  ?>

              </body>
</html>