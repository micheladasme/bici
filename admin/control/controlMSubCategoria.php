<?php	
	// Incluir Funciones.
	include_once('../modelo/modelo_categorias.php');

	// Obtenemos los Datos.
	$id = $_POST['txt_cod'];
	$nombre = $_POST['txt_nom'];
	$cat_id  = $_POST['sel_categoria'];
	

		

	// Si los campos no estan vacios, hacemos la modificación.
	$modificar = modificaSubCategoria($id, $nombre ,$cat_id);

	if($modificar == 1)
	{
	?>
		<script>
			alert('La Sub-Categoria de codigo <?php echo $id; ?> se ha modificado exitosamente.');
			window.close();
			
		</script>
<?php
	}else
	{
	?>
		<script>
			alert('ERROR: Ha ocurrido un error al modificar la sub-categoria. Intente Nuevamente.');
			window.close();
		</script>
<?php
	}
?>