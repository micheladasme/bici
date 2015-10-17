<?php
include("../modelo/funciones.php");
$dato = $_POST;

if (isset($dato['codigo'])) {
   $cod = $dato['codigo']; 
$res3 = MuestraNoticiasTodo($cod);


    foreach ($res3 as $b) {
        

       print( '<div class="modal fade" id="modalNot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="myModalLabel"><?php print($b["not_titulo"]) ?> </h1>
                    </div>
                    <div class="modal-body">
                        imagen
                        contenido


                    </div>

                    <div class="modal-footer">
                            autor


                    </div>
                </div>
            </div>
        </div>
        <script>

            $("#modalNot").modal("show");
        </script>');
    
    }
} ?>