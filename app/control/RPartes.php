<?php

include_once("../modelo/modelo_armado.php");

$cod = ((isset($_POST["prod"])) ? $_POST["prod"] : null);

if($cod!=null&&$tipo!=null)
{ 
	switch ($tipo) {
		case 'ruedas':
			ingresarProductoTmp();

			break;

		case 'marcos':
			
			break;

		case 'horquillas':
			# code...
			break;

		case 'sillin':
			# code...
			break;

		case 'biela':
			# code...
			break;

		case 'manubrio':
			# code...
			break;	

		case 'Accesorios':
			# code...
			break;		

		default:
			# code...
			break;
	}


}

?>
