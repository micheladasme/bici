<?php
session_start();
	// Incluir Funciones.
	include_once('../modelo/modelo_venta.php');

	// Obtenemos los Datos.
	$din_ini = $_POST['txt_din_ini'];
	$usuario = $_SESSION['id_usuario'];
	

	// Ejecutamos las funciones.
	$inicial = registraDineroInicial($din_ini,$usuario);

	// Verificamos que se hallan insertado los datos.
	if($inicial == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('El Dinero Inicial ha sido registrado correctamente.');

           // Redirigmos a Inicio.
			window.location="../vista/vista_venta.php";
		</script>
<?php
	}
?>