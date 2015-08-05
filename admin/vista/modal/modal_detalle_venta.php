<?php
if (isset($_GET['id'])) {

     $id = $_GET['id'];

     $f = detalleVenta($id);
    $datos2 = detalleVenta2($id);
        ?>

        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="gridSystemModalLabel">Boleta  #<?php echo $id?> </h2>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                    <?php
        
                     echo
                     ("
                     <p>Vendedor : ".$f['usu_nombre']."&nbsp;".$f['usu_apellido']."</p>
                            <br>
                            <table class='table'>
                            <thead>
                            <tr><th>Codigo</th><th>Nombre</th><th>Cantidad</th><th>Subtotal</th></tr></thead><tbody>");
                             if ($datos2 == true) {
                              foreach ($datos2 as $a) 
                              {     
                              echo("<tr><td>".$a['pro_cod']."</td> <td>".$a['pro_nombre']."</td><td>".$a['det_cantidad']."</td><td>$".$a['det_subtotal']."</td>  </tr>");
                             } 
                         }else
                             {
                                echo("<tr><td><h4>&nbsp;&nbsp;&nbsp;No Tiene Productos</h4></td></tr>");
                             }
                            echo("</tbody></table><br>
                                <div class='row'>
                                <div class='col-md-offset-8 col-md-3'>
                                <p> Total Compra : $".$f['com_total']."   </p> 
                                <p> Tipo Pago : ".$f['tipo_modo']." </p>
                                </div> 
                                </div>");
                           
                          
                            ?>
        
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
        <?php } ?>
