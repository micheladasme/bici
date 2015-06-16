<?php
session_start();
include_once('modelo/funciones.php');
 
session_unset();
session_destroy();
echo("<script>
		alert('Sesion Cerrada');
		location.href = 'vista/vista_inicio.php';
		 </script>");


exit();

?>
