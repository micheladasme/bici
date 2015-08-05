<?php

if (isset($_GET['codigo'])) {
// Obtener variables
$codigo = $_GET['codigo'];

// Llamar a la función.
$datos = muestraProductosCod($codigo);

// Llenamos los campos
foreach($datos as $d)
{

?>


<div class="modal fade" id="myModal" aria-labelledby="gridSystemModalLabel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modificar Producto</h4>
            </div>
            <div class="modal-body">
                <form id="iform"  method="POST" action="../control/controlMProducto.php" enctype="multipart/form-data">
                    <p> Código : <input type="text" id="txt_cod" name="txtCod"  class="form-control" value="<?php echo $d['pro_cod']; ?>" required readonly/>   </p>
                    <p> Nombre Producto :  <input type="text" id="txt_nom" name="txtNombre" class="form-control" value="<?php echo $d['pro_nombre']; ?>" required/>    </p>
                    <p> Precio Compra :  <input type="text" id="txt_comp" name="txtCompra" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_compra']; ?>" required/>    </p>
                    <p> Precio Venta :  <input type="text" id="txt_vent" name="txtVenta" onkeypress="ValidaSoloNumeros()" class="form-control" value="<?php echo $d['pro_precio_venta']; ?>" required/>   </p>
                    <input type="hidden" name="txtCodigo" value="<?php echo $d['pro_cod']; ?>">
                    <?php
                    }
                    ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-warning" value="Modificar"/>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $("#myModal").modal("show");

</script>

<?php } ?>