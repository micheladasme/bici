<?php session_start();

  include_once('../modelo/login.php');


$sw = validaLogin($_POST['txt_usu'],$_POST['txt_pass']);

if($sw)
	{
		$_SESSION['id_usuario']= validaLogin($_POST['txt_usu'],$_POST['txt_pass']);
		$_SESSION['usu_nombre']= retornaNombrePorId($_SESSION['id_usuario']);
		$_SESSION['usu_tipo']= retornaNivel($_SESSION['id_usuario']);
        $_SESSION['header']="";

         switch ($_SESSION['usu_tipo']) {
         	case 1:
         		echo "<script>
		 location.href='../vista/vista_inicio_admin.php';
		 alert('Bienvenido Super Administrador');
		 </script>";
                $_SESSION['header']="/includes/header_superadmin.php";
         		break;
         	
         	case 2:
         	    echo "<script>
                location.href='../vista/vista_inicio_admin.php';
                alert('Bienvenido Gerente');
		 </script>";
                $_SESSION['header']="/includes/header_gerente.php";
         		break;

         		case 3:
         	    echo "<script>
		 location.href='../vista/vista_inicio_vendedor.php';
		 alert('Bienvenido Administrador Local');
		 </script>";
                    $_SESSION['header']="/includes/header_admin_local.php";
         		break;

         		case 4:
         	    echo "<script>
		 location.href='../vista/vista_inicio_admin.php';
		 alert('Bienvenido Mecanico');
		 </script>";
                    $_SESSION['header']="/includes/header_mecanico.php";
         		break;

         		case 5:
         	    echo "<script>
		 location.href='../vista/vista_inicio_vendedor.php';
		 alert('Bienvenido Vendedor');
		 </script>";
                    $_SESSION['header']="/includes/header_vendedor.php";
         		break;
         }
		 
	 } 
	 else {
			
		
		 echo "<script>alert('Usuario Erroneo o No Existe'); 
		         location.href='../index.php';</script>";
		
		}
	

?>