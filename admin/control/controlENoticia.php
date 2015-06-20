<?php

// Incluir Funciones
include_once('../modelo/modelo_noticias.php');

// Obtener Variables
$codigo = $_GET['codigo'];

// Ejecutar la función
$eliminar = eliminaNoticia($codigo);

// Verificamos si se elimino
if($eliminar == '1')
{
    ?>
    <script>
        alert('La noticia ha sido eliminado exitosamente.');
        window.location = '../vista/vista_ver_noticia.php';
    </script>
<?php
}else
{
    // Si no se elimino, enviamos un error.
    ?>
    <script>
        alert('No se pudo eliminar la noticia, ha surgido un problema.');
        window.location = '../vista/vista_eliminar_noticia';
    </script>
<?php
}

?>