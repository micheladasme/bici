<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_promocion.php');

	// Obtenemos los Datos.

	$cod_producto = $_POST['txt_cod_pro'];
	$nombre  = $_POST['txt_prom'];
	$preciov  = $_POST['txt_preciov'];
	$precioc  = $_POST['txt_precioc'];
	

	// Verificamos que no esten vacÃ­os.
	if( $cod_producto == '' || $precioc == '' || $preciov == '' || $nombre == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_ingresar_promocion.php";
		</script>
<?php
	}

	// Verificamos que el producto no exista.
	$existe = existePromocion($cod_producto);
	
	if($existe == '1' )
	{
	?>
		<script>
			alert('ERROR: La Promocion del producto con codigo <?php echo $cod_producto;?> ya existe.');

			window.location="../vista/vista_ingresar_promocion.php";
		</script>
<?php
	}else
	{
	// Ejecutamos las funciones.
	$promocion = registraPromocion($cod_producto, $preciov ,$precioc, $nombre);

	// Verificamos que se hallan insertado los datos.
	if($promocion == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('La Promocion <?php echo $nombre;?> ha sido registrada correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ver_promocion.php";
		</script>
<?php
	}
	}

	
?>