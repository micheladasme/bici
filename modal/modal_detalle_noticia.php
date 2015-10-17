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
                        <h1 class="modal-title" id="myModalLabel">'.$b["not_titulo"].'</h1>
                        <p>'.$b['not_subtitulo'].'</p>
                    </div>
                    <div class="modal-body">

                        <img  class="col-sm-4 " style="height: 130px; width: 200px; " src="../'.$b['not_imagen'].'" alt="...">
                        <p>'.$b["not_contenido"].'</p>
                    </div>

                    <div class="modal-footer">
                            autor: <p>'.$b["usu_nombre"].'</p>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>

        </div>
        <script>

            $("#modalNot").modal("show");
        </script>');
    
    }
}
?>
