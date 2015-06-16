<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

include_once("../../modelo/funciones.php");
$link = conectar();
$consulta = "select tip_id , tip_descripcion from tipo_usuarios order by tip_id asc";
$result=mysql_query($consulta , $link);
$consulta2 = "select suc_id , suc_nombre from sucursal order by suc_id asc";
$result2=mysql_query($consulta2 , $link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Nuevos Usuarios</title>
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
          
            <h3 class="text-center">Ingresar Usuarios</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-4 col-md-offset-4"><!--col-md-6 col-md-offset-3-->        
          <form id="iform"  method="POST" action="../../control/superadmin/controlRUsuario.php" enctype="multipart/form-data">
      <p> Nombre : <input type="text" id="txt_nom" name="txt_nom" class="form-control" required autofocus/>   </p>
      <p> Apellido :  <input type="text" id="txt_ape" name="txt_ape" class="form-control" required/>    </p>
      <p> Nickname :  <input type="text" id="txt_nick" name="txt_nick" class="form-control" required/>    </p>
      <p> Clave :  <input type="password" id="txt_pass" name="txt_pass" class="form-control" required/>    </p>
      <p> Repita Clave:  <input type="password" id="txt_pass2" name="txt_pass2" class="form-control"  required/> </p>
      <p> Tipo Usuario : <select name="sel_tip" id="sel_tip" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila=mysql_fetch_row($result)){
                                  echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";              
                                        }
                                  ?>
                                </select></p>
       <p> Sucursal : <select name="sel_suc" id="sel_suc" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila2=mysql_fetch_row($result2)){
                                  echo"<option  value='".$fila2['0']."'>".$fila2['1']."</option>";              
                                        }
                                  ?>
                                </select></p>                         
    
      <br>
      <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value="Ingresar"/>
       
      </form>
       </div>
           </div>
</div>
            <?php include('../includes/footer.php');  ?>

              </body>
</html>