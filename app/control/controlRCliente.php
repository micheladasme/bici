<?php
	// Incluir Funciones.
	include_once('../modelo/modelo_cliente.php');
    

	// Obtenemos los Datos.
    $rut = $_POST['txt_cod'];
	$nombre = $_POST['txt_nom'];
	$apellido = $_POST['txt_ape'];
    $direccion = $_POST['txt_dir'];
    $telefono = $_POST['txt_tel'];
    $correo = $_POST['txt_correo'];
	$pass = $_POST['txt_pass'];
   // $pass2 = $_POST['txt_pass2'];
    $comuna  = $_POST['sel_comuna'];


	// Verificamos que no esten vacíos.
            $ingresa = registraCliente($rut,$nombre, $apellido, $direccion, $telefono, $correo, $pass, $comuna);



	if($ingresa)
	{


	?>
		<script>


			// Enviamos un alert informando.
			alert('Exito al Registrar');


			window.location="../prueba_inicio.php";
		</script>
<?php
	}
	else
	{
		?>
<script type="text/javascript">
		alert('Error a Ingresar, Ingresa Nuevamente ');
		window.location="../prueba_inicio.php";
		</script>
<?php
	}
	
	
	
	?>
		