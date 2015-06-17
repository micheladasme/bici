<?php
session_start();
// Incluir Funciones.
include_once('../modelo/modelo_venta.php');

// Obtenemos los Datos.
$cod = $_POST['txt_codigo'];
$nom = $_POST['txt_nombre'];
$cant = $_POST['txt_cantidad'];
$val = $_POST['txt_valor'];
$subt = $_POST['txt_subtotal'];
$vende = $_SESSION['id_usuario'];
?>

<?php

$stock = existeStock2($cod, 1);

if ($stock['pu_cantidad'] > $_POST['txt_cantidad']) {
    // Ejecutamos las funciones.
    $venta = registraVentaProducto($cod, $nom, $cant, $val, $subt, $vende);
    // Verificamos que se hallan insertado los datos.
    if ($venta == '1') {
        ?>
        <script>
            window.location = "../vista/vista_venta.php";
        </script>
    <?php
    }
} else
    echo "<script>alert('El producto $nom no tiene stock suficiente en tienda.');
            window.location='../vista/vista_venta.php';</script>";
?>