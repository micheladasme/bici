<?php
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$limite_kb = 3000;

if ($_FILES['imagen']['name'] == '') {
    $rutaDestino = NULL;
} else {
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        $rutaEnServidor = 'imagenes';
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaDestinoImg = '../../' . $rutaEnServidor . '/' . $nombreImagen;
        $rutaDestino = $rutaEnServidor . '/' . $nombreImagen;
        move_uploaded_file($rutaTemporal, $rutaDestinoImg);
    }else{?>
        <script>
            alert("Archivo no permitido, Es tipo de archivo prohibido o excede el tamaño de <?php print($limite_kb) ?> Kilobytes");
        </script>
    <?php }
}?>