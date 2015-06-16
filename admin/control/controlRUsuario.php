<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_usuarios.php');
    

	// Obtenemos los Datos.
	$nombre = $_POST['txt_nom'];
	$apellido = $_POST['txt_ape'];
	$nick = $_POST['txt_nick'];
	$pass = $_POST['txt_pass'];
	$pass2  = $_POST['txt_pass2'];
	$tipo = $_POST['sel_tip'];
	$suc = $_POST['sel_suc'];

	// Verificamos que no esten vacíos.
	if($pass == $pass2)
	{
		
		$ingresa = registraUsuario($nombre,$apellido,$nick,$pass,$tipo,$suc);
	?>
		<script>


			// Enviamos un alert informando.
			alert('Usuario Ingresado.');

			// Redirigimos a Inserta Producto.
			window.location="../vista/vista_ingresar_usuario.php";
		</script>
<?php
	}
	else
	{
		?>
<script type="text/javascript">
		alert('Las Contraseñas no coinciden, Ingresa Nuevamente ');
		window.location="../vista/vista_ingresar_usuario.php";
		</script>
<?php
	}
	
	
	
	?>
		