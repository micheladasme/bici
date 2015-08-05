<?php

if (isset($_GET['codigo'])) {
// Obtener variables
    $codigo = $_GET['codigo'];

// Llamar a la función.
    $datos = muestraCategoriaCod($codigo);

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
                    <h4 class="modal-title" id="gridSystemModalLabel">Modificar Categoria</h4>
                </div>
                <div class="modal-body">
                    <form id="iform"  method="POST" action="../control/controlMNoticia.php" enctype="multipart/form-data">
                        <p> Id : <input type="text" id="txt_cod" name="txt_cod"  class="form-control" value="<?php echo $d['cat_id']; ?>" required readonly/>   </p>
                        <p> Nombre :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" value="<?php echo $d['cat_nombre']; ?>" required/>    </p>
                        <p> Descripcion :  <textarea rows="5" id="txt_desc" name="txt_desc"  class="form-control" required> <?php echo $d['cat_descripcion']; ?></textarea>  </p>
                        <input type="hidden" name="txtCodigo" value="<?php echo $d['not_id']; ?>">
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