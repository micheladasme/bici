<?php
session_start();
include_once('modelo/modelo_venta.php');
$id_vend = $_SESSION['id_usuario'];
$ultimo = consultaVendedor($id_vend);
$cierra = cierraCaja($id_vend, $ultimo);
if ($cierra == 1) {
session_unset();
session_destroy();
echo("<script>
		alert('Sesion Cerrada');
		location.href = 'index.php';
		 </script>");


exit();
}

else
{
	echo("<script>
			alert('Error al Cerrar Sesion');
		 </script>");


}

?>
