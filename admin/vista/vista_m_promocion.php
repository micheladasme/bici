<?php
session_start();
  // Incluir Funciones
  include_once('../../modelo/funciones.php');
  
if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

  // Obtener variables
  $codigo = $_GET['codigo'];

  // Llamar a la función.
  $datos = muestraPromocionCod($codigo);

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
    </script>
 </head>
<body>
<div class="container"><br>
  <div class="well" style="height:420px; width:460px">
    <h3 class="text-center">Modificar Promocion</h3><hr>      
        <form id="iform"  method="POST" action="../../control/superadmin/controlMPromocion.php" enctype="multipart/form-data">
       
        <p> Codigo Promocion :  <input type="text" id="txt_cod_pro" name="txt_cod_pro" class="form-control" value="<?php echo $d['pro_cod']; ?>" onkeypress="ValidaSoloNumeros()" required/>    </p>
        <p> Nombre Promocion :  <input type="text" id="txt_prom" name="txt_prom" class="form-control" value="<?php echo $d['pro_nombre']; ?>" required/>    </p>
        <p> Precio Compra :  <input type="text" id="txt_precioc" name="txt_precioc" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_compra']; ?>" required/>   </p>
        <p> Precio Venta :  <input type="text" id="txt_preciov" name="txt_preciov" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_venta']; ?>" required/>  </p>
        
<?php
  } 
?>
        <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Modificar" align="center" /> 
        </form>
      </div>
    </div>
  </div></div>
</body>