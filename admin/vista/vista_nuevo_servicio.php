<?php
session_start();
include('../modelo/funciones.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nuevo Servicio</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.css"/>
	<style type="text/css">
	#logo
	{	
		text-align: center;

	}
	img
	{
		max-height: 70px;
    	
	}
	table{
		width:100%;
	}
	th, td {
	margin:0px;
	padding:0px;
	width:30%;
	border:1px solid #000000;
	
		}
	input[type="text"]{
		 display: block;
		width:100%;
	}
	.nombre
	{
		width: 10%;
	}
	.titulo
	{
		text-align: center;
		
	}
	.titulo.vacio
	{
		
		width: 5%;
		
	}
	.contenido
	{
		width: 80%;

	}
	
	</style>

	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
     <script type="text/javascript">
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../salir.php";
        else
             return 0;
      }

      
       $('.dropdown-toggle').dropdown()

     </script>

</head>
<body>
	<div class = "row">
        <?php include($_SESSION['header']);  ?>
			<div id="logo" class="col-xs-6">
				<img src="../img/logo.png"  class="img-responsive" alt="sccycles logo">
				<div class="pull-left">
				<h4>SAAVEDRA Y CASTRO CYCLES LIMITADA</h4>
				<p>Compra, venta y reparacion de bicicletas y repuestos <br>
					Av. Las Condes 12.255, Locl 41, Cantagallo<br>
					(56-2)2417085 - (56-9)8370245
				</p>
				<p>www.sccycles.cl        contacto.sccycles@gmail.com</p>	
				</div>
			</div>
			
			<div id="orden" class="col-xs-6">
				<h3>ORDEN DE SERVICIOS</h3><br>
				<h5> N° Orden : </h5>
				<p></p>
				<table>
					<tr>
					<th class="nombre">Fecha :</th>
					<th><input type="text" name="fecha" /></th></tr>
					
				</table> <br><br>
				<table>
					<tr>
					<th class="nombre"> Recibida Por :</th>
						<th><input type="text" name="recibida" />   </th>
					</tr>
				</table>

				</div>
	</div>
	<br>
	<br>
	<div id="servicio">
		<table>
			<tr>
					<th class="nombre">Nombre :</th>
					<th><input type="text" name="nombre" /></th> 
					<th class="nombre">Marca :</th>
					<th><input type="text" name="marca" /></th>
			</tr>

			<tr>
					<th class="nombre">Telefono :</th>
					<th><input type="text" name="tel" /></th> 
					<th class="nombre">Modelo :</th>
					<th><input type="text" name="modelo" /></th>
			</tr>		
			<tr>
					<th class="nombre">Correo :</th>
					<th><input type="text" name="correo" /></th> 
					<th class="nombre">Color :</th>
					<th><input type="text" name="color" /></th>
			</tr>	
			<tr>
					<th class="nombre">Direccion :</th>
					<th><input type="text" name="direccion" /></th> 
					<th class="nombre">Fecha de Entrega :</th>
					<th><input type="text" name="entrega" /></th>
			</tr>	


		</table>
		<br>
		<table class="contenido">
			<tr>
				<th class="titulo vacio"><b></b></th>
				<th class="titulo servicios"><b>SERVICIOS</b></th>
				<th class="titulo valor"><b>VALOR</b></th> 
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option1" value=""></td>
				<td> Servicio full de bicicleta</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option2" value=""></td>
				<td> Servicio medio de bicicleta</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option3" value=""></td>
				<td> Servicio de horquilla</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option4" value=""></td>
				<td> Servicio de shock</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option5" value=""></td>
				<td> Servicio de frenos</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option6" value=""></td>
				<td> Lavado general de bicicleta</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option7" value=""></td>
				<td> Lavado de transmisión</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option8" value=""></td>
				<td> Centrado de rueda</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option9" value=""></td>
				<td> Enrayado de rueda</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option10" value=""></td>
				<td> Sistema de tubular por rueda</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option11" value=""></td>
				<td> Recarga liquido tubular</td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<th class="titulo vacio"><b></b></th>
				<th class="titulo servicios"><b>REPUESTOS</b></th>
				<th class="titulo valor"><b>VALOR</b></th> 
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor" /></td>
			</tr>

		</table>
	</div>
	<br>
	<br>
	<div id="boton" class="col-lg-6">
		<input class="btn btn-success" type="submit" value="Ingresar Servicio">

	</div>
	<br>
	<br>
</body>
</html>