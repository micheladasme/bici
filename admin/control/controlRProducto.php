<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_productos.php');

    if($_FILES['imagen']['name']=='') {
        $rutaDestino = NULL;
    }else{
        $rutaEnServidor = 'imagenes';
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaDestinoImg = '../../' . $rutaEnServidor . '/' . $nombreImagen;
        $rutaDestino = $rutaEnServidor . '/' . $nombreImagen;
        move_uploaded_file($rutaTemporal, $rutaDestinoImg);
    }

	// Obtenemos los Datos.
	$codigo = $_POST['txt_cod'];
	$nombre = $_POST['txt_nom'];
	$compra = $_POST['txt_comp'];
	$categoria = $_POST['sel_categoria'];
	$venta  = $_POST['txt_vent'];
	$peso = $_POST['txt_peso'];
	$descripcion = $_POST['ta_desc'];

	// Verificamos que no esten vacíos.
	if($codigo == '' || $nombre == '' || $compra == '' || $venta == '')
	{
		
	?>
		<script>
			// Enviamos un alert informando.
			alert('Debe rellenar todos los campos.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_ingresar_producto.php";
		</script>
<?php
	}

	// Verificamos que el producto no exista.
	$existe = existeProducto($codigo);
	if($existe == '1')
	{
	?>
		<script>
			alert('ERROR: El producto con codigo <?php echo $codigo;?> ya existe.');

			window.location="../vista/vista_ingresar_producto.php";
		</script>
<?php
	}

	// Ejecutamos las funciones.
	$producto = registraProducto($codigo, $nombre, $compra, $venta, $rutaDestino,$peso,$descripcion, $categoria);

	// Verificamos que se hallan insertado los datos.
	if($producto == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('El producto <?php echo $nombre;?> ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_producto.php";
		</script>
<?php
	}
?>