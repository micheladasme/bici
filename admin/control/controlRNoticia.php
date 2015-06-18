<?php
session_start();
include('../modelo/modelo_noticias.php');
include_once('../modelo/modelo_imagenes.php');
?>

<?php

$titulo = $_POST['not_titulo']; // Recibimos el valor del <input name="titulo"...
$subtitulo = $_POST['not_subtitulo'];   // Recibimos el valor de la <textarea name="titulo"...
$contenido = $_POST['not_contenido'];
$usu_id = $_SESSION['id_usuario'];


    $respuesta = registraNoticias($titulo, $subtitulo, $contenido, $rutaDestino, $usu_id);

    if ($respuesta == 1) { ?>
        <script>alert('Noticia Publicada!');
            window.location='../vista/vista_ingresar_noticia.php';
        </script>
    <?php
    } else {
        ?>
        <script>alert('Noticia NO Publicada!, Intente Nuevamente');
            window.location='../vista/vista_ingresar_noticia.php';
        </script>
   <?php }



?>