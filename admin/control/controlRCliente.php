<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_cliente.php');
    

	// Obtenemos los Datos.
	$nombre = $_POST['txt_nom'];
	$apellido = $_POST['txt_ape'];
	$nick = $_POST['txt_nick'];
	$pass = $_POST['txt_pass'];
	$pass2  = $_POST['txt_pass2'];
	$tipo = $_POST['sel_tip'];
	$suc = $_POST['sel_suc'];

	// Verificamos que no esten vacíos.
	$ingresa = registraCliente($rut,$nombre, $apellido,$direccion,$telefono,$correo,$nick, $pass, $tipo, $comuna);
	
	if($ingresa)
	{
		
		
	?>
		<script>


			// Enviamos un alert informando.
			alert('Cliente Ingresado.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_ingresar_cliente.php";
		</script>
<?php
	}
	else
	{
		?>
<script type="text/javascript">
		alert('Error a Ingresar, Ingresa Nuevamente ');
		window.location="../vista/vista_ingresar_cliente.php";
		</script>
<?php
	}
	
	
	
	?>
		