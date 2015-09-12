<?php session_start();

  include_once('../modelo/login.php');


$sw = validaLogin($_POST['txt_usu'],$_POST['txt_pass']);

if($sw)
	{
		$_SESSION['id_usuario']= validaLogin($_POST['txt_usu'],$_POST['txt_pass']);
		$_SESSION['usu_nombre']= retornaNombrePorId($_SESSION['id_usuario']);
		$_SESSION['usu_tipo']= retornaNivel($_SESSION['id_usuario']);
        $_SESSION['header']="";

         if($_SESSION['usu_nombre']) {
         	?>
         		 <script>
		 location.href='../prueba.php';

		 </script><?php


         }
    }
	 else {
			
		
		 echo "<script>alert('Usuario Erroneo o No Existe'); 
		         location.href='../index.php';</script>";
		
		}

?>