<?php
if (isset($_GET['codigo'])) {

    $res3 = buscaProductoDetalle($_GET['codigo']);


    foreach ($res3 as $b) {
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon-shopping-remove"></i></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="text-muted glyphicon glyphicon-shopping-cart"></i> <strong><?php print($b["pro_cod"])?></strong><?php print(' - ' . $b["pro_nombre"]) ?></h4>
                    </div>
                    <div class="modal-body">

                        <table class="pull-left col-md-8 ">
                            <tbody>
                            <tr>
                                <td class="h6"><strong>Codigo</strong></td>
                                <td> </td>
                                <td class="h5"><?php print($b["pro_cod"])?></td>
                            </tr>

                            <tr>
                                <td class="h6"><strong>Nombre</strong></td>
                                <td> </td>
                                <td class="h5"><?php print($b["pro_nombre"]) ?> </td>
                            </tr>

                            <tr>
                                <td class="h6"><strong>Categoria</strong></td>
                                <td> </td>
                                <td class="h5"><?php print($b["cat_nombre"]) ?> </td>
                            </tr>

                            <tr>
                                <td class="h6"><strong>Peso Producto</strong></td>
                                <td> </td>
                                <td class="h5"><?php print($b["pro_peso"].' ')?>grs</td>
                            </tr>


                            <tr>
                                <td class="h6"><strong>Stock</strong></td>
                                <td> </td>
                                <td class="h5">50</td>
                            </tr>
                            <tr>
                                <td class="h6"><strong>Ubicacion</strong></td>
                                <td> </td>
                                <td class="h5">Tienda</td>
                            </tr>



                            <tr>
                                <td class="btn-mais-info text-primary">
                                    <i class="open_info glyphicon glyphicon-plus"></i> Mas Informacion
                                </td>
                                <td> </td>
                                <td class="h5"></td>
                            </tr>

                            </tbody>
                        </table>


                        <div class="col-md-4">

                            <?php if (($b["pro_imagen"]==NULL) || ($b["pro_imagen"]=='')) {
                                echo('<img src="../img/no_imagen.png" alt="imagen" class="img-thumbnail">');
                            } else {

                                echo('<img src="../../' . $b["pro_imagen"] . '" alt="imagen" class="img-thumbnail">');
                            }
                            ?>
                        </div>

                        <div class="clearfix"></div>
                        <p class="open_info hide"><?php print(isset($b["pro_descripcion"])?$b["pro_descripcion"]:' ') ?></p>
                    </div>

                    <div class="modal-footer">


                        <div class="text-right pull-right col-md-3">
                            Precio Venta : <br/>
                            <span class="h3 text-muted"><strong><?php print('$ '. $b["pro_precio_venta"]) ?></strong></span>
                        </div>

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