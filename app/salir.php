<?php
session_start();
$id_vend = $_SESSION['id_usuario'];
$id_tipo = $_SESSION['usu_tipo'];

if($id_tipo == 5)
{
$ultimo = consultaVendedor($id_vend);
$cierra = cierraCaja($id_vend, $ultimo);
}
else
{
	$cierra = 1;
}

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
