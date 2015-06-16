<?php
session_start();
  // Incluir Funciones
  include_once('../../modelo/funciones.php');
  
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

  // Obtener variables
  $codigo = $_GET['codigo'];

  // Llamar a la función.
  $datos = muestraSubCategoriaCod($codigo);

  // Llenamos los campos
  foreach($datos as $d)
  {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Sub-Categoria</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
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
    </script>
 </head>
<body>
<div class="container"><br>
  <div class="well" style="height:420px; width:460px">
    <h3 class="text-center">Modificar Promocion</h3><hr>      
        <form id="iform"  method="POST" action="../../control/superadmin/controlMSubCategoria.php" enctype="multipart/form-data">
       
        <p> Codigo Sub-Categoria :  <input type="text" id="txt_cod" name="txt_cod" class="form-control" value="<?php echo $d['subcat_id']; ?>" readonly/>    </p>
        <p> Nombre Sub-Categoria :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" value="<?php echo $d['subcat_nombre']; ?>" required/>    </p>
        <p> Categoria : <p><select name="sel_categoria" id="sel_categoria" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila=mysql_fetch_row($result)){
                                  echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";              
                                        }
                                  ?>
                                </select>   </p>
       
        
<?php
  } 
?>
        <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Modificar" align="center" /> 
        </form>
      </div>
    </div>
  </div></div>
</body>