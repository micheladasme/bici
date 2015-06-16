<?php	
	// Incluir Funciones.
	include_once('../modelo/modelo_categoria.php');

	// Obtenemos los Datos.
	$id = $_POST['txt_cod'];
	$nombre = $_POST['txt_nom'];
	$descripcion  = $_POST['ta_desc'];
	

		

	// Si los campos no estan vacios, hacemos la modificación.
	$modificar = modificaCategoria($id, $nombre ,$descripcion);

	if($modificar == 1)
	{
	?>
		<script>
			alert('La Categoria de codigo <?php echo $id; ?> se ha modificado exitosamente.');
			window.close();
			
		</script>
<?php
	}else
	{
	?>
		<script>
			alert('ERROR: Ha ocurrido un error al modificar la categoria. Intente Nuevamente.');
			window.close();
		</script>
<?php
	}
?>