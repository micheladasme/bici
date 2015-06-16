<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_categorias.php');
    
   

	// Obtenemos los Datos.

	$nombre = $_POST['txt_nom'];
	$descripcion = $_POST['ta_desc'];

	
	// Ejecutamos las funciones.
	$producto = registraCategoria($nombre,$descripcion);

	// Verificamos que se hallan insertado los datos.
	if($producto == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('La Categoria <?php echo $nombre;?> ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_categoria.php";
		</script>
<?php
	}
?>