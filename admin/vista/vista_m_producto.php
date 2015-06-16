<?php
session_start();
  // Incluir Funciones
  include_once('../modelo/modelo_productos.php');

if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

  // Obtener variables
  $codigo = $_GET['codigo'];

  // Llamar a la función.
  $datos = muestraProductosCod($codigo);

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
    <title>Modificar Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
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
    <h3 class="text-center">Modificar Producto</h3><hr>      
        <form id="iform"  method="POST" action="../control/controlMProducto.php" enctype="multipart/form-data">
        <p> Código : <input type="text" id="txt_cod" name="txtCod"  class="form-control" value="<?php echo $d['pro_cod']; ?>" required readonly/>   </p>
        <p> Nombre Producto :  <input type="text" id="txt_nom" name="txtNombre" class="form-control" value="<?php echo $d['pro_nombre']; ?>" required/>    </p>
        <p> Precio Compra :  <input type="text" id="txt_comp" name="txtCompra" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_compra']; ?>" required/>    </p>
        <p> Precio Venta :  <input type="text" id="txt_vent" name="txtVenta" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_venta']; ?>" required/>   </p>
        <input type="hidden" name="txtCodigo" value="<?php echo $d['pro_cod']; ?>">
<?php
  } 
?>
        <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Modificar" align="center" /> 
        </form>
      </div>
    </div>
  </div></div>
</body>