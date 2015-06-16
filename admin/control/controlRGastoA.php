<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_gastos.php');

	// Obtenemos los Datos.
	$tipo = $_POST['sel_tipo'];
	$monto = $_POST['txt_cant'];
	$descripcion  = $_POST['ta_desc'];

	// Verificamos que no esten vacíos.
	if($monto == '' || $descripcion == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_ingresar_gasto.php";
		</script>
	<?php
	}

	
	?>
		
<?php
	

	// Ejecutamos las funciones.
	$gasto = IngresaGastos( $monto, $descripcion, $tipo);

	// Verificamos que se hallan insertado los datos.
	if($gasto == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('El gasto ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_gasto.php";
		</script>
<?php
	}
?>