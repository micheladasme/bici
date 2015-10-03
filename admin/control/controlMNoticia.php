<?php
// Incluir Funciones.
include_once('../modelo/modelo_noticias.php');
include_once('../modelo/modelo_imagenes.php');

// Obtenemos los Datos.
$codigo = $_POST['txtCodigo'];
$titulo = $_POST['txtTitulo'];
$subtitulo = $_POST['txtSub'];
$contenido  = $_POST['txtCont'];

// Verificamos que no esten vacíos.
if($codigo == '' || $titulo == '' || $subtitulo == ''  || $contenido == '')
{

    ?>
    <script>
        // Enviamos un alert informando.
        alert('Debe rellenar todos los campos.');

        // Redirigimos a Inserta Producto.
        window.location="../vista/vista_modificar_noticia.php";
    </script>
<?php
}

// Si los campos no estan vacios, hacemos la modificación.
$modificar = modificaNoticias($codigo, $titulo, $subtitulo, $rutaDestino, $contenido);

if($modificar == 1)
{
    ?>
    <script>
        alert('La Noticia de id <?php echo $codigo; ?> se ha modificado exitosamente.');
        window.close();
        window.location="../vista/vista_modificar_noticia.php";
    </script>
<?php
}else
{
    ?>
    <script>
        alert('ERROR: Ha ocurrido un error al modificar la noticia. Intente Nuevamente.');
        window.close();
    </script>
<?php
}
?>