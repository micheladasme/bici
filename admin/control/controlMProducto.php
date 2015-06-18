<?php	
	// Incluir Funciones.
	include_once('../modelo/modelo_productos.php');

	// Obtenemos los Datos.
	$codigo = $_POST['txtCodigo'];
	$nombre = $_POST['txtNombre'];
	$compra = $_POST['txtCompra'];
	$venta  = $_POST['txtVenta'];

	// Verificamos que no esten vacíos.
	if($codigo == '' || $nombre == '' || $compra == '' || $venta == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_modificar_producto.php";
		</script>
<?php
	}

	// Si los campos no estan vacios, hacemos la modificación.
	$modificar = modificaProducto($codigo, $nombre, $compra, $venta);

	if($modificar == 1)
	{
	?>
		<script>
			alert('El producto de codigo <?php echo $codigo; ?> se ha modificado exitosamente.');
			window.close();
            window.location="../vista/vista_modificar_producto.php";
		</script>
<?php
	}else
	{
	?>
		<script>
			alert('ERROR: Ha ocurrido un error al modificar el producto. Intente Nuevamente.');
			window.close();
		</script>
<?php
	}
?>