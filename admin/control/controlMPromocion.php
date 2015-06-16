<?php	
	// Incluir Funciones.
	include_once('../modelo/modelo_promocion.php');

	// Obtenemos los Datos.
	$cod_producto = $_POST['txt_cod_pro'];
	$precioc = $_POST['txt_precioc'];
	$preciov  = $_POST['txt_preciov'];
	$nombre  = $_POST['txt_prom'];

	// Verificamos que no esten vacíos.
	if($cod_producto == '' || $precioc == '' || $preciov == '' || $nombre == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_modificar_promocion.php";
		</script>
<?php
	}

	// Si los campos no estan vacios, hacemos la modificación.
	$modificar = modificaPromocion($cod_producto, $precioc ,$preciov, $nombre);

	if($modificar == 1)
	{
	?>
		<script>
			alert('La Promocion de codigo <?php echo $cod_producto; ?> se ha modificado exitosamente.');
			window.close();
			
		</script>
<?php
	}else
	{
	?>
		<script>
			alert('ERROR: Ha ocurrido un error al modificar la promocion. Intente Nuevamente.');
			window.close();
		</script>
<?php
	}
?>