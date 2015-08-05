<?php
session_start();
include('../modelo/modelo_noticias.php');

if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

$res = muestraNoticias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar Noticias</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
     <script src="../js/paginate.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript">


        function salir(){
            var respuesta=confirm('Desea realmente Cerrar Sesion?');
            if(respuesta==true)
                window.location="../salir.php";
            else
                return 0;
        }

        $('.dropdown-toggle').dropdown()

    </script>
</head>

<body>

<?php include($_SESSION['header']);  ?>

<div class="well" style="height:auto;">
    <h3 class="text-center">Eliminar</h3><hr>
    <br>
    <form id="iform" name="iform">
        <div class="col-xs-6 col-md-4">
            <div class="input-group">
                <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Nombre..." required/>
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
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Sub Titulo
            </th>
            <th>
                Contenido
            </th>
            <th>
               Fecha
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['txt_consulta']))
        {
            $res2 = muestraNoticiasTit($_GET['txt_consulta']);
            foreach ($res2 as $f) {
                echo (
                    "<tr class='post'>".

                    "<td>".$f['not_id']."</td>".
                    "<td>".$f['not_titulo']."</td>".
                    "<td>$".$f['not_subtitulo']."</td>".
                    "<td>$".$f['not_contenido']."</td>".
                    "<td>$".$f['not_not_fecha']."</td>".
                    "<th><a href='../control/controlENoticia.php?codigo=".$f['not_id']."'  class='btn btn-sm btn-danger' role='button'><span class='glyphicon glyphicon-remove'></span>&nbsp Eliminar</a>  </th>".

                    "</tr>"
                );


            }
        }

        else
        {



        ?>

        <?php if($res==true) { ?>

        <?php


        // Llenamos la tabla
        foreach($res as $f)
        {
            ?>
            <tr class="post">
                <th style="font-weight:100"><?php echo $f['not_id']; ?></th>
                <th style="font-weight:100"><?php echo $f['not_titulo']; ?></th>
                <th style="font-weight:100"><?php echo $f['not_subtitulo']; ?></th>
                <th style="font-weight:100"><?php echo $f['not_contenido']; ?></th>
                <th style="font-weight:100"><?php echo $f['not_fecha']; ?></th>
                <th width="30px"><a href="../control/controlENoticia.php?codigo=<?php echo $f['not_id']; ?>" class="btn btn-sm btn-danger" role="button"><span class="glyphicon glyphicon-remove"></span>&nbsp Eliminar</a></th>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <?php }
        else
        {
            echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Noticias</h4></td></tr>");
        }
        } ?>

    </table>
    <?php include('/includes/paginador.php');  ?>
    <?php include('/includes/footer.php');  ?>

</body>
</html>