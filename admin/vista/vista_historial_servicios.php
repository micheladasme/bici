<?php
session_start();
include('../modelo/modelo_servicios.php');


if (!isset($_SESSION['usu_nombre'])) {
    header("location:../index.php");
}


$cont = cuentaServicios();


if(isset($_GET['page'])){
    $page = preg_replace("#[^0-9]#","",$_GET['page']);
}
else {
    $page = 1;
}

$reg = 12;
$last = ceil($cont/$reg);


if($page<1){

    $page=1;
}
else if($page > $last) {
    $page = $last;
}

$start=(($page-1)*$reg);
$res = muestraServicios($start,$reg);

if($last!=1){

    if($page!=$last){
        $next = $page + 1;
        $paginador2 = '<a href="vista_historial_servicios.php?page='.$next.'">Siguente -></a>';
        $paginadorL = '<a href="vista_historial_servicios.php?page='.$last.'">Ultimo >></a>';
    }
    if($page!=1){
        $prev = $page - 1;
        $paginador = '<a href="vista_historial_servicios.php?page='.$prev.'"><- Anterior</a>';
        $paginadorP = '<a href="vista_historial_servicios.php?page=1"><< Primero</a>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Lista de Servicios</title>
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
    <h3 class="text-center">Lista de Servicios</h3>
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
                Cliente
            </th>
            <th>
                Fecha de Entrega
            </th>
            <th>
                Total
            </th>
            <th>
                Estado
             </th>   
            <th>
                Accion
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_GET['txt_consulta']))
        {
            $res2 = muestraProductosNomCli($_GET['txt_consulta']);
            foreach ($res2 as $f) {
                echo(
                    "<tr>
             
            <td>" . $f['ser_id'] . "</td>
            <td>" . $f['cli_nombre'] . "</td>
            <td>" . $f['ser_fecha_entrega'] . "</td>
            <td>$" . $f['ser_total'] . "</td>
            <td>".$f['est_ser_nombre']."</td>
            <td> <a href=../".$f['ser_documento']." class='btn btn-sm btn-info'><span class='glyphicon glyphicon-plus-sign'></span> Ver Factura </a></th></td>
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

            if($f['est_ser_id'] == 1)  
                {$estado ='danger';} 
            else if($f['est_ser_id'] == 2) 
            {$estado = 'warning';} 
            else{$estado ='success';} 
            ?> 
            <tr class="<?php echo $estado ?>">

                <th style="font-weight:100"><?php echo $f['ser_id']; ?></th>
                <th style="font-weight:100"><?php echo $f['cli_nombre']; ?></th>
                <th style="font-weight:100"> <?php echo $f['ser_fecha_entrega']; ?></th>
                <th style="font-weight:100">$ <?php echo $f['ser_total']; ?></th>
                <th style="font-weight:100"><?php echo $f['est_ser_nombre']; ?></th>
                <th style="font-weight:100"><a href="../<?php echo $f["ser_documento"]; ?>"
                                               class="btn btn-sm btn-info"><span
                            class='glyphicon glyphicon-plus-sign'></span> Ver Factura </a></th>
            </tr>

        <?php
        }
        ?>
        </tbody>
        <?php }
        else {
            echo("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Servicios</h4></td></tr>");
        }

        } ?>
    </table>
    <?php include('/includes/paginador.php'); ?>

    <?php include('/includes/footer.php'); ?>
   

</body>
</html>