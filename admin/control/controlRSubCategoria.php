<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_categorias.php');
    
   

	// Obtenemos los Datos.

	$nombre = $_POST['txt_nom'];
	$cat_id = $_POST['sel_categoria'];

	
	// Ejecutamos las funciones.
	$producto = registraSubCategorias($nombre, $cat_id);

	// Verificamos que se hallan insertado los datos.
	if($producto == '1')
	{
	?>
		<script>
			// Alert informando.
			alert('La Sub-Categoria <?php echo $nombre;?> ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_subcategoria.php";
		</script>
<?php
	}
?>