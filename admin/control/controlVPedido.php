<?php
session_start();
include_once("../modelo/modelo_pedidos.php");

$data = $_POST;
$codigo = $data["codigo"];
$id_usuario = $_SESSION["id_usuario"];


$res = muestraDetallePedidos($codigo);
$res2 = muestraClientePedido($codigo);


	 print('<div class="modal fade" id="modalPedi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="myModalLabel">Detalles Bicicleta Pedida</h2>
                    </div>
                    <div class="modal-body">
                    <h4> Datos del Cliente </h4>');
                    foreach ($res2 as $key => $c) {

                       print('Rut: '.$c["cli_rut"].'<br>
                        Nombre: '.$c["cli_nombre"].' '.$c['cli_apellido'].'<br>
                        Telefono: '.$c["cli_telefono"].' - Correo: '.$c["cli_correo"].'<br>
                        Direccion: '.$c["cli_direccion"].' , '.$c["comu_nombre"].'<br>');
                    }
                    print('<table class="table">
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