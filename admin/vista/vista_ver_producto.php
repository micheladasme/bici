<?php
session_start();
include('../modelo/modelo_productos.php');


if (!isset($_SESSION['usu_nombre'])) {
    header("location:../index.php");
}



$res = muestraProductos();



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
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/paginate.js"></script>
      <script src="../js/custom.js"></script>
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
            <th>
                Categoria
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
                    "<tr class='post'>
             
            <td>" . $f['pro_cod'] . "</td>
            <td>" . $f['pro_nombre'] . "</td>
            <td>$" . $f['pro_precio_compra'] . "</td>
            <td>$" . $f['pro_precio_venta'] . "</td>
            <td>" . $f['subcat_nombre'] . "</td> 
            <td> <a href='vista_ver_producto.php?codigo=".$f['pro_cod']."'
                                               class='btn btn-sm btn-info'><span
                            class='glyphicon glyphicon-plus-sign'></span> Ver Mas </a> </td>"
             
            ."</tr>"
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
            <tr class="post">

                <th style="font-weight:100"><?php echo $f['pro_cod']; ?></th>
                <th style="font-weight:100"><?php echo $f['pro_nombre']; ?></th>
                <th style="font-weight:100">$ <?php echo $f['pro_precio_compra']; ?></th>
                <th style="font-weight:100">$ <?php echo $f['pro_precio_venta']; ?></th>
                <th style="font-weight:100"><?php echo $f['subcat_nombre']; ?></th>
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
    <?php include('/modal/modal_detalle_producto.php'); ?>


</body>
</html>