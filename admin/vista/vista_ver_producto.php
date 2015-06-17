<?php
session_start();
include('../modelo/modelo_productos.php');


if (!isset($_SESSION['usu_nombre'])) {
    header("location:../index.php");
}


$cont = cuentaProductos();

if (isset($_GET['page'])) {
    $page = preg_replace("#[^0-9]#", "", $_GET['page']);
    $start = (($page - 1) * $reg);
} else {
    $page = 1;
    $start = (($page - 1) * 0);
}

$reg = 12;
$last = ceil($cont / $reg);


if ($page < 1) {

    $page = 1;
} else if ($page > $last) {
    $page = $last;
}

$res = muestraProductos($start, $reg);

if ($last != 1) {

    if ($page != $last) {
        $next = $page + 1;
        $paginador2 = '<a href="vista_ver_producto.php?page=' . $next . '">Siguente -></a>';
        $paginadorL = '<a href="vista_ver_producto.php?page=' . $last . '">Ultimo >></a>';
    }
    if ($page != 1) {
        $prev = $page - 1;
        $paginador = '<a href="vista_ver_producto.php?page=' . $prev . '"><- Anterior</a>';
        $paginadorP = '<a href="vista_ver_producto.php?page=1"><< Primero</a>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Lista de Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css"/>
    <style type="text/css">


        tbody > tr {
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
        }


    </style>
    <script type="text/javascript" src="../js/jQuery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <script type="text/javascript">

        function salir() {
            var respuesta = confirm('Desea realmente Cerrar Sesion?');
            if (respuesta == true)
                window.location = "../salir.php";
            else
                return 0;
        }


        $('.dropdown-toggle').dropdown()
    </script>

</head>

<body>


<?php include($_SESSION['header']); ?>
<div class="well" style="height:auto;">
    <h3 class="text-center">Lista de Productos</h3>
    <hr>
    <br>

    <form id="iform" name="iform">
        <div class="col-xs-6 col-md-4">
            <div class="input-group">
                <input type="text" id="txt_consulta" name="txt_consulta" class="form-control"
                       placeholder="Busqueda por Nombre..." required/>

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default" id="btn_consulta">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
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
                Precio Compra
            </th>
            <th>
                Precio Venta
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_GET['txt_consulta']))
        {
            $res2 = muestraProductosNom($_GET['txt_consulta']);
            foreach ($res2 as $f) {
                echo(
                    "<tr>
             
            <td>" . $f['pro_cod'] . "</td>
            <td>" . $f['pro_nombre'] . "</td>
            <td>$" . $f['pro_precio_compra'] . "</td>
            <td>$" . $f['pro_precio_venta'] . "</td>

            </tr>"
                );


            }
        }

        else
        {


        ?>
        <?php if ($res == true) { ?>

        <?php

        // Llenamos la tabla
        foreach ($res as $f) {
            ?>
            <tr>

                <th style="font-weight:100"><?php echo $f['pro_cod']; ?></th>
                <th style="font-weight:100"><?php echo $f['pro_nombre']; ?></th>
                <th style="font-weight:100">$ <?php echo $f['pro_precio_compra']; ?></th>
                <th style="font-weight:100">$ <?php echo $f['pro_precio_venta']; ?></th>
                <th style="font-weight:100"><a href="vista_ver_producto.php?codigo=<?php echo $f["pro_cod"]; ?>"
                                               class="btn btn-sm btn-info"><span
                            class='glyphicon glyphicon-plus-sign'></span> Ver Mas </a></th>
            </tr>

        <?php
        }
        ?>
        </tbody>
        <?php }
        else {
            echo("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Productos</h4></td></tr>");
        }

        } ?>
    </table>
    <?php include('/includes/paginador.php'); ?>

    <?php include('/includes/footer.php'); ?>

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

</body>
</html>