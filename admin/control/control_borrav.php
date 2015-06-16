<?php
    include('../modelo/modelo_venta.php');
    $id=$_GET['id'];
    $eli=eliminarventa($id);
    echo "<script>window.alert('".$eli."');</script>";
    echo "<script>
		 location.href='../vista/vista_venta.php';</script>";
?>


