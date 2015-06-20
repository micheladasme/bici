<?php

if (isset($_GET['codigo'])) {
// Obtener variables
    $codigo = $_GET['codigo'];

// Llamar a la función.
    $datos = muestraNoticiasid($codigo);

// Llenamos los campos
foreach($datos as $d)
{

    ?>


    <div class="modal fade" id="myModal" aria-labelledby="gridSystemModalLabel" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" xmlns="http://www.w3.org/1999/html">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Modificar Producto</h4>
                </div>
                <div class="modal-body">
                    <form id="iform"  method="POST" action="../control/controlMNoticia.php" enctype="multipart/form-data">
                        <p> Id : <input type="text" id="txt_cod" name="txtCod"  class="form-control" value="<?php echo $d['not_id']; ?>" required readonly/>   </p>
                        <p> Titulo :  <input type="text" id="txt_nom" name="txtTitulo" class="form-control" value="<?php echo $d['not_titulo']; ?>" required/>    </p>
                        <p> Sub Titulo :  <input type="text" id="txt_comp" name="txtSub"  class="form-control" value="<?php echo $d['not_subtitulo']; ?>" required/>    </p>
                        <p> Contenido :  <textarea rows="5" id="txt_vent" name="txtCont"  class="form-control" required> <?php echo $d['not_contenido']; ?></textarea>  </p>
                        <input type="hidden" name="txtCodigo" value="<?php echo $d['not_id']; ?>">
                        <?php
                        }
                        ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Modificar"/>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $("#myModal").modal("show");

    </script>

<?php } ?>