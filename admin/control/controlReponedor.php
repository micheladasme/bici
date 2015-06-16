<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_stock.php');

	// Obtener Variables
	$cod = $_POST['txt_cod'];
	$cantidad = $_POST['txt_tienda']; 

	// Ejecutar la función
	$restar =  restaStockBodega($cod, $cantidad);
	$sumar = sumaStockTienda($cod, $cantidad);
    
	// Verificamos si se elimino
	if($restar == '1' && $sumar == '1')
	{
	?>
		<script>
			alert('Reposicion con Exito.');
			window.location = '../vista/vista_stock_general.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('ERROR: No se pudo reponer, Producto no tiene Stock en Tienda.');
			window.location = '../vista/vista_reponedor.php';
		</script>
<?php
	}

?>