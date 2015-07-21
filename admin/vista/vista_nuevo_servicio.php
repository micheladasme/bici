<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nuevo Servicio</title>


    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.theme.css"/>
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
        height: auto;
	border:1px solid #000000;
    }

	input[type="text"], input[type="date"]{
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

    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.js"></script>

     <script type="text/javascript">
         $(function() {

             $( "#nombre" ).autocomplete({
                 source: "../control/controlBCliente.php",
                 select: function( event, ui ) {
                    $('#tel').val(ui.item.telefono);
                     $('#correo').val(ui.item.correo);
                     $('#direccion').val(ui.item.direccion);
                     $('#id_cli').val(ui.item.id_cliente);
                 }
             });


         });



      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../salir.php";
        else
             return 0;
      }




     </script>

</head>
<body>
    <div id="factura">
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
					<th><input type="date" id="fecha" name="fecha" /></th></tr>
					
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
					<td><input type="text" id="nombre" name="nombre"/></td>
					<th class="nombre">Marca :</th>
					<th><input type="text" name="marca" /></th>
			</tr>

			<tr>
					<th class="nombre">Telefono :</th>
					<th><input type="text" name="tel" id="tel" /></th>
					<th class="nombre">Modelo :</th>
					<th><input type="text" name="modelo" /></th>
			</tr>		
			<tr>
					<th class="nombre">Correo :</th>
					<th><input type="text" name="correo" id="correo" /></th>
					<th class="nombre">Color :</th>
					<th><input type="text" name="color" /></th>
			</tr>	
			<tr>
					<th class="nombre">Direccion :</th>
					<th><input type="text" name="direccion" id="direccion"/></th>
					<th class="nombre">Fecha de Entrega :</th>
					<th><input type="date" name="entrega" /></th>
			</tr>	
            <input type="hidden" id="id_cli"/>

		</table>
		<br>
		<table id="contenido" class="contenido">
			<tr>
				<th class="titulo vacio"><b></b></th>
				<th class="titulo servicios"><b>SERVICIOS</b></th>
				<th class="titulo"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" id="option1" value="valor1"/></td>
				<td> Servicio full de bicicleta</td>
				<td><input type="text" id="valor1" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" id="option2" value="valor2"  /></td>
				<td> Servicio medio de bicicleta</td>
				<td><input type="text" id="valor2" class="valor" disabled /></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" id="option3" value="valor3"></td>
				<td> Servicio de horquilla</td>
                <td><input type="text" id="valor3" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" id="option4" value="valor4"></td>
				<td> Servicio de shock</td>
				<td><input type="text" id="valor4" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option5" value="valor5"></td>
				<td> Servicio de frenos</td>
				<td><input type="text" id="valor5" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option6" value="valor6"></td>
				<td> Lavado general de bicicleta</td>
				<td><input type="text" id="valor6" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option7" value="valor7"></td>
				<td> Lavado de transmisión</td>
				<td><input type="text" id="valor7" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option8" value="valor8"></td>
				<td> Centrado de rueda</td>
				<td><input type="text" id="valor8" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option9" value="valor9"></td>
				<td> Enrayado de rueda</td>
				<td><input type="text" id="valor9" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option10" value="valor10"></td>
				<td> Sistema de tubular por rueda</td>
				<td><input type="text" id="valor10" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="titulo vacio"><input type="checkbox" name="option11" value="valor11"></td>
				<td> Recarga liquido tubular</td>
				<td><input type="text" id="valor11" class="valor" disabled/></td>
			</tr>
			<tr>
                <td class="titulo vacio"><input type="checkbox" name="option11" value="valor12"></td>
				<td><input type="text" id="" placeholder="Escriba Nuevo Servicio..."/> </td>
				<td><input type="text" id="valor12" class="valor"  disabled/></td>
			</tr>
			<tr>
				<th class="titulo vacio"><b></b></th>
				<th class="titulo servicios"><b>REPUESTOS</b></th>
				<th class="titulo"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor13" class="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor14" class="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor15" class="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor16" class="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor17" class="valor" /></td>
			</tr>
			<tr>
				<td class="titulo vacio"></td>
				<td><input type="text" name="repuestos" /> </td>
				<td><input type="text" name="valor18" class="valor" /></td>
			</tr>
            <tr>
                <td class="titulo vacio"></td>
                <th class="titulo ">TOTAL </th>
                <td><input type="text" id="total"/></td>
            </tr>

		</table>
	</div>
    </div>
	<br>
	<br>
	<div id="boton" class="col-lg-6">
		<input class="btn btn-success" type="submit" onClick="window.print()" value="Ingresar Servicio">

	</div>
	<br>
	<br>
<script>

    $( ":checkbox").change(function() {
        $( "#"+(this.value)).attr('disabled',!this.checked);
    });


    $(document).ready(function() {
        //this calculates values automatically
        calculateSum();

        $(".valor").on("keydown keyup", function() {
            calculateSum();
        });
    });

    function calculateSum() {
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".valor").each(function() {
            //add only if the value is number
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
                $(this).css("background-color", "#FFFF");
            }
            else if (this.value != 0){
                $(this).css("background-color", "red");
                alert("Solo se Aceptan Numeros");
            }
        });

        $("#total").val(sum);
    }


</script>
</body>
</html>