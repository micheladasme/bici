<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_stock.php');

	// Obtenemos los Datos.
	$codigo = $_POST['txt_cod'];
	$ubicacion = $_POST['sel_ubi'];
	$cantidad = $_POST['txt_cant'];


	// Verificamos que no esten vacíos.
	if($codigo == '' || $cantidad == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Stock.
			window.location="../vista/vista_ingresar_stock.php";
		</script>
<?php
	}
	$tienda = existeStock($codigo , 1);
	$bodega = existeStock($codigo , 2);
	if($tienda == '1' || $bodega == '1')
     {
		$aumenta = modificaStock($codigo, $ubicacion, $cantidad);
		if($aumenta=='1')
		{ ?>
		<script>
			// Alert informando.
			alert('El Stock ha sido agregado correctamente.');

			// Redirigmos a ver Stock.
			window.location="../vista/vista_ingresar_stock.php";
		</script>
		
		
		
<?php	}
	
	}else
	{
    // Ejecutamos las funciones.
	$stock = registraStock($codigo, $ubicacion, $cantidad);
	// Verificamos que se hallan insertado los datos.
	if($stock == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('El Stock ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_stock.php";
		</script>
<?php
	}
	
	}
	

	
?>