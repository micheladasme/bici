<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

include_once("../modelo/modelo_productos.php");
$link = conectar();
$consulta = "select cat.cat_id, cat.cat_nombre from categorias cat order by cat_id asc";
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
             window.location="../salir.php";
        else
             return 0;
      }
      
       $('.dropdown-toggle').dropdown()

     </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:auto;">
          
            <h3 class="text-center">Ingresar Producto</h3><hr>
            <br>
            
            <div class="row">
        <div class="col-md-4 col-md-offset-4"><!--col-md-6 col-md-offset-3-->        
          <form id="iform"  method="POST" action="../control/controlRProducto.php" enctype="multipart/form-data">
      <p> Código : <input type="text" id="txt_cod" name="txt_cod" onkeypress="ValidaSoloNumeros()" class="form-control" required autofocus/>   </p>
      <p> Nombre Producto :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" required/>    </p>
      <p> Imagen Producto :  <input type="file" id="imagen" name="imagen"/>    </p>
      <p> Precio Compra :  <div class="input-group"><span class="input-group-addon">$</span><input type="text" id="txt_comp" onkeypress="ValidaSoloNumeros()" name="txt_comp" class="form-control" required/></div>    </p>
      <p> Precio Venta :  <div class="input-group"><span class="input-group-addon">$</span><input type="text" id="txt_vent" name="txt_vent" onkeypress="ValidaSoloNumeros()" class="form-control" required/></div>   </p>
      <p> Peso Producto :  <div class="input-group"><input type="text" id="txt_peso" name="txt_peso" class="form-control" required/><span class="input-group-addon">.grs</span></div>  </p>
      <p> Descripcion :  <textarea id="ta_desc" name="ta_desc" class="form-control" rows="5" required > </textarea>   </p>
      <p> Categoria Producto : <select name="sel_categoria" id="sel_categoria" class="form-control" required>
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