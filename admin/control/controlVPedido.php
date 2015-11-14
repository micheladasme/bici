<?php
session_start();
include_once("../modelo/modelo_pedidos.php");

$data = $_POST;
$codigo = $data["codigo"];
$id_usuario = $_SESSION["id_usuario"];


$res = muestraDetallePedidos($codigo);


	 print('<div class="modal fade" id="modalPedi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="myModalLabel">Detalles Bicicleta</h1>
                    </div>
                    <div class="modal-body">
                    <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Código
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Peso
                        </th>
                        <th>
                            Valor
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>');
                 foreach ($res as $key => $b) {

                 print('<td>' . $b["pro_cod"] . '</td>
                        <td>' . $b["pro_nombre"] . '</td>
                        <td>' . $b["pro_peso"] . ' gr</td>
                        <td>$' . $b["pro_precio_venta"] . '</td> 
                         </tr>');
                    }
                  print( '</tbody>
                    </table>
                    </div>
                            <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                    </div>
                    </div>
                    </div>
                    <script>
                        $("#modalPedi").modal("show");
                    </script>');




?>