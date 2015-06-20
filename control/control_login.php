<?php session_start();

  include_once('../modelo/login.php');

$sw=false;
$sw = validaLogin($_POST['email'],$_POST['password']);
$_SESSION['cli_id']= validaLogin($_POST['email'],$_POST['password']);
$_SESSION['cli_nick']= retornaNombrePorId($_SESSION['cli_id']);
//$_SESSION['usu_tipo']= retornaNivel($_SESSION['id_usuario']);

if($sw==true)
	{
	

     echo "<script>
		 location.href='../vista/vista_logeado.php';
		 alert('Bienvenido');
		 </script>";


	 } 
	 else
	 {
			
		
		 echo "<script>alert('Usuario Erroneo o No Existe'); 
		         location.href='../vista/vista_inicio.php';</script>";
		
	
		
		
		}
	

?>