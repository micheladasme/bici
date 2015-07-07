<?php
session_start();
  // Incluir Funciones
  include_once('../../modelo/funciones.php');
  
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

  // Obtener variables
  $codigo = $_GET['codigo'];

  // Llamar a la función.
  $datos = muestraCategoriaCod($codigo);

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
    <title>Modificar Promocion</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
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
    </script>
 </head>
<body>
<div class="container"><br>
  <div class="well" style="height:420px; width:460px">
    <h3 class="text-center">Modificar Promocion</h3><hr>      
        <form id="iform"  method="POST" action="../../control/superadmin/controlMCategoria.php" enctype="multipart/form-data">
       
        <p> Codigo Categoria :  <input type="text" id="txt_cod" name="txt_cod" class="form-control" value="<?php echo $d['cat_id']; ?>" readonly/>    </p>
        <p> Nombre Categoria :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" value="<?php echo $d['cat_nombre']; ?>" required/>    </p>
        <p> Descripcion : <textarea id="ta_desc" name="ta_desc" rows="5"><?php echo $d['pro_precio_compra']; ?></textarea> </p>
       
        
<?php
  } 
?>
        <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Modificar" align="center" /> 
        </form>
      </div>
    </div>
  </div></div>
</body>