

<?php

if (isset($_GET['codigo'])) {
$res3 = muestraNoticiasid($_GET['codigo']);


    foreach ($res3 as $b) {
        
 ?>

       <div class="modal fade" id="modalNot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="myModalLabel"><?php print($b["not_titulo"]); ?></h1>
                        <p><?php print($b['not_subtitulo']);?></p>
                    </div>
                    <div class="modal-body">

                        <img  class="col-sm-4 " style="height: 130px; width: 200px; " src="../../<?php print($b['not_imagen']);?>" alt="...">
                        <p><?php print($b["not_contenido"]);?></p>
                    </div>

                    <div class="modal-footer">
                    Autor: <p><?php print($b["usu_nombre"]);?></p>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>

            </div>

        </div>
        <script>

            $("#modalNot").modal("show");
        </script>
    <?php
    }
}
?>