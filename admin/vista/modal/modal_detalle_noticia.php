<?php
if (isset($_GET['codigo'])) {

    $res3 = muestraNoticiasid($_GET['codigo']);


    foreach ($res3 as $b) {
        ?>

        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="gridSystemModalLabel"><?php print($f["not_titulo"]) ?> </h2>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4"><strong><?php print($f["not_subtitulo"])?></strong></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><?php print($f["not_contenido"]) ?> </div>
                                <div class="col-md-2 col-md-offset-4 pull-right" style="border: 1px solid"><img src=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#myModal").modal("show");

        </script>
    <?php
    }
} ?>