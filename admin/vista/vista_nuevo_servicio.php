<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

include_once("../modelo/modelo_servicios.php");
$link = conectar();
$rs = mysql_query("SELECT MAX(ser_id) AS id FROM servicio",$link);
if ($row = mysql_fetch_row($rs)) {
$id = trim($row[0]) + 1;
}
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

    #factura
    {
	 border:1px solid #000000;
    }
    #orden
    { 
    	float:right;
 		width:40%;
 		margin-bottom: 30px;
    }
	#logo
	{
		float:left;
		width:40%;
		text-align: center;

	}
	img
	{
	width:40%;
	margin:0 auto 0 auto;
	}
	#servicio
	{
		margin-top: 20px;
	}
	input[type="text"]{
		
		width:100%;
	}
	 input[type="date"]{
		line-height: 14px; 
		width:100%;
	}

	.nom
	{
		width: 10%;
	}
	.data
	{
		  font: caption;
	}
	.title
	{
		text-align: center;
		
	}
	.title.vacio
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
	<?php include($_SESSION['header']);  ?>
<div class="well">
    <div id="factura">
	
			<div id="logo">
				
				<img src="../img/logo.png" align="middle" class="img-responsive" alt="sccycles logo"/>
				
				<h4 style="align:center;">SAAVEDRA Y CASTRO CYCLES LIMITADA</h4>
				<p>Compra, venta y reparacion de bicicletas y repuestos <br>
					Av. Las Condes 12.255, Locl 41, Cantagallo<br>
					(56-2)2417085 - (56-9)8370245
				</p>
				<p>www.sccycles.cl        contacto.sccycles@gmail.com</p>	
			</div>
		<form id="iform"  method="POST" action="../control/controlRServicio.php">
			<div id="orden" >
				<h3>ORDEN DE SERVICIOS</h3><br>
				<h5> N° Orden : <?php echo $id; ?></h5>
				<p></p>
				<table>
					<tr>
					<th class="nom">Fecha :</th>
					<th><input type="text" id="fecha" class="data" name="fecha" value="<?php print(date('d-m-Y')); ?>" disabled /></th></tr>
					
				</table> <br><br>
				<table>
					<tr>
					<th class="nom"> Recibida Por :</th>
                        <th><input type="text" class="data" name="recibida" />   </th>
					</tr>
				</table>

				</div>

	
	<div id="servicio">
		<table>
			<tr>
					<th class="nom">Nombre :</th>
					<td><input type="text" id="nombre" name="nombre" required/></td>
					<th class="nom">Marca :</th>
					<th><input type="text" class="data" name="marca" /></th>
			</tr>

			<tr>
					<th class="nom">Telefono :</th>
					<th><input type="text" class="data" name="tel" id="tel" /></th>
					<th class="nom">Modelo :</th>
					<th><input type="text" class="data" name="modelo" /></th>
			</tr>		
			<tr>
					<th class="nom">Correo :</th>
					<th><input type="text" class="data" name="correo" id="correo" /></th>
					<th class="nom">Color :</th>
					<th><input type="text" class="data" name="color" /></th>
			</tr>	
			<tr>
					<th class="nom">Direccion :</th>
					<th><input type="text" class="data" name="direccion" id="direccion"/></th>
					<th class="nom">Fecha de Entrega :</th>
					<th><input type="date" class="data" id="entrega" name="entrega" required/></th>
			</tr>	
            <input type="hidden" id="id_cli" name="id_cli"/>
			<input type="hidden" id="n_factura" name="n_factura" value="<?php print $id;?>"/>
		</table>
		<br>
		<table id="contenido" class="contenido">
			<tr>
				<th class="title vacio"><b></b></th>
				<th class="title"><b>SERVICIOS</b></th>
				<th class="title"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" id="option1" value="valor1"/></td>
				<td> Servicio full de bicicleta</td>
				<td><input type="text" id="valor1" name="valor1" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" id="option2" value="valor2"  /></td>
				<td> Servicio medio de bicicleta</td>
				<td><input type="text" id="valor2" name="valor2" class="valor" disabled /></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" id="option3" value="valor3"></td>
				<td> Servicio de horquilla</td>
                <td><input type="text" id="valor3" name="valor3" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" id="option4" value="valor4"></td>
				<td> Servicio de shock</td>
				<td><input type="text" id="valor4" name="valor4" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option5" value="valor5"></td>
				<td> Servicio de frenos</td>
				<td><input type="text" id="valor5" name="valor5" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option6" value="valor6"></td>
				<td> Lavado general de bicicleta</td>
				<td><input type="text" id="valor6" name="valor6" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option7" value="valor7"></td>
				<td> Lavado de transmisión</td>
				<td><input type="text" id="valor7" name="valor7" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option8" value="valor8"></td>
				<td> Centrado de rueda</td>
				<td><input type="text" id="valor8" name="valor8" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option9" value="valor9"></td>
				<td> Enrayado de rueda</td>
				<td><input type="text" id="valor9" name="valor9" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option10" value="valor10"></td>
				<td> Sistema de tubular por rueda</td>
				<td><input type="text" id="valor10" name="valor10" class="valor" disabled/></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" name="option11" value="valor11"></td>
				<td> Recarga liquido tubular</td>
				<td><input type="text" id="valor11" name="valor11" class="valor" disabled/></td>
			</tr>
			<tr>
                <td class="title vacio"><input type="checkbox" name="option11" value="valor12"></td>
				<td><input type="text" id="servicio_1" placeholder="Escriba Nuevo Servicio..."/> </td>
				<td><input type="text" id="valor12" name="valor12" class="valor"  disabled/></td>
			</tr>
			<tr>
				<th class="title vacio"><b></b></th>
				<th class="title servicios"><b>REPUESTOS</b></th>
				<th class="title"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos1" /> </td>
				<td><input type="text" name="valor13" class="valor" /></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos2" /> </td>
				<td><input type="text" name="valor14" class="valor" /></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos3" /> </td>
				<td><input type="text" name="valor15" class="valor" /></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos4" /> </td>
				<td><input type="text" name="valor16" class="valor" /></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos5" /> </td>
				<td><input type="text" name="valor17" class="valor" /></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><input type="text" name="repuestos6" /> </td>
				<td><input type="text" name="valor18" class="valor" /></td>
			</tr>
            <tr>
                <td class="title vacio"></td>
                <th class="title ">TOTAL </th>
                <td><input type="text" id="total" name="total"/></td>
            </tr>
		
		</table>
		
	</div>
</div>

	<br>
	<br>
	<div id="boton" class="col-lg-6">
		<input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar Servicio">
	</div>
	</form>
	<br>
</div>
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