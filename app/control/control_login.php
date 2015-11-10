<?php session_start();

  include_once('../modelo/login.php');


$sw = validaLogin($_POST['txt_usu'],$_POST['txt_pass']);

if($sw)
	{
		$_SESSION['id_usuario']= validaLogin($_POST['txt_usu'],$_POST['txt_pass']);
		$_SESSION['usu_nombre']= retornaNombrePorId($_SESSION['id_usuario']);
		
        $_SESSION['header']="";

       // print_r($_SESSION['usu_nombre']);
         if($_SESSION['usu_nombre']) {?>
         <script>
		 location.href='../armado2.php';
		 alert('Bienvenido a Bici-o-Matic'); 

		 </script><?php


         }
    }
	 else {
			
		
		 echo "<script>alert('Usuario Erroneo o No Existe'); 
		         location.href='../index.php';</script>";
		
		}

?>