<?php
session_start();
include_once('../modelo/modelo_servicios.php');
	
	$id_cliente = $_POST['id_cli'];
	$nom_cliente = $_POST['nombre'];
	$tel_cliente = $_POST['tel'];
	$correo_cliente = $_POST['correo'];
	$dir_cliente = $_POST['direccion'];
    $total = $_POST['total'];
	$hoy = date('Y-m-d');
	$fecha_ent = $_POST['entrega'];
	$num_fac = $_POST['n_factura'];
	$recibida = $_POST['recibida'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$color = $_POST['color'];
	$valor1 = (isset($_POST['valor1']) ? $_POST['valor1'] : 0);
	$valor2 = (isset($_POST['valor2']) ? $_POST['valor2'] : 0);
	$valor3 = (isset($_POST['valor3']) ? $_POST['valor3'] : 0);
	$valor4 = (isset($_POST['valor4']) ? $_POST['valor4'] : 0);
	$valor5 = (isset($_POST['valor5']) ? $_POST['valor5'] : 0);
	$valor6 = (isset($_POST['valor6']) ? $_POST['valor6'] : 0);
	$valor7 = (isset($_POST['valor7']) ? $_POST['valor7'] : 0);
	$valor8 = (isset($_POST['valor8']) ? $_POST['valor8'] : 0);
	$valor9 = (isset($_POST['valor9']) ? $_POST['valor9'] : 0);
	$valor10 = (isset($_POST['valor10']) ? $_POST['valor10'] : 0);
	$valor11 = (isset($_POST['valor11']) ? $_POST['valor11'] : 0);
	$valor12 = (isset($_POST['valor12']) ? $_POST['valor12'] : 0);
	$valor13 = $_POST['valor13'];
	$valor14 = $_POST['valor14'];
	$valor15 = $_POST['valor15'];
	$valor16 = $_POST['valor16'];
	$valor17 = $_POST['valor17'];
	$valor18 = $_POST['valor18'];
    $servicio_1 = (isset($_POST['servicio_1'])? $_POST['servicio_1']:"");
	$repuestos1 = $_POST['repuestos1'];
	$repuestos2 = $_POST['repuestos2'];
	$repuestos3 = $_POST['repuestos3'];
	$repuestos4 = $_POST['repuestos4'];
	$repuestos5 = $_POST['repuestos5'];
	$repuestos6 = $_POST['repuestos6'];
	
	ob_start();

?>
<page> 
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

    tr{
    	border:none;
    }

    #factura
    {
	 border:1px solid #000000;
    }
    #orden
    { 	
 		margin-left: 30px;
 		margin-bottom: 30px;
    }
	#logo
	{
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
	.separador
	{
		width:50%;

	}
	input[type="text"]{
		
		width:100%;
	}
	 input[type="date"]{
		line-height: 14px; 
		width:100%;
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
     <table id="factura">
      <tr>
			<td class="separador">
				<div id="logo">
					
					<img src="../img/logo.png" align="middle" class="img-responsive" alt="sccycles logo"/>
					
					<h4 style="align:center;">SAAVEDRA Y CASTRO CYCLES LIMITADA</h4>
					<p>Compra, venta y reparacion de bicicletas y repuestos <br>
						Av. Las Condes 12.255, Locl 41, Cantagallo<br>
						(56-2)2417085 - (56-9)8370245
					</p>
					<p>www.sccycles.cl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;contacto.sccycles@gmail.com</p>	
				</div>
			</td>
				
			<td class="separador">
				<div id="orden">
					<h3>ORDEN DE SERVICIOS</h3><br>
					<h5> N° Orden : <?php print $num_fac?></h5>
					<p></p>
					<table>
						<tr>
						<th class="nom">Fecha :</th>
						<th><?php print $hoy ?></th></tr>
						
					</table> <br><br>
					<table>
						<tr>
						<th class="nom"> Recibida Por :</th>
	                        <th><?php print $recibida?></th>
						</tr>
					</table>
	
				</div>
			</td>
		</tr>
    </table>
    <table> 
	
			<tr>
					<th class="nom">Nombre :</th>
					<th><?php print $nom_cliente ?></th>
					<th class="nom">Marca :</th>
					<th><?php print $marca ?></th>
			</tr>
			<tr>
					<th class="nom">Telefono :</th>
					<th><?php print $tel_cliente ?></th>
					<th class="nom">Modelo :</th>
					<th><?php print $modelo ?></th>
			</tr>		
			<tr>
					<th class="nom">Correo :</th>
					<th><?php print $correo_cliente ?></th>
					<th class="nom">Color :</th>
					<th><?php print $color ?></th>
			</tr>	
			<tr>
					<th class="nom">Direccion :</th>
					<th><?php print $dir_cliente ?></th>
					<th class="nom">Fecha de Entrega :</th>
					<th><?php print $fecha_ent ?></th>
			</tr>
		
	</table>
		<br>
      <table id="contenido" class="contenido">
			<tr>
				<th class="title vacio"><b></b></th>
				<th class="title"><b>SERVICIOS</b></th>
				<th class="title"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor1>0)?'checked':' ');?> /></td>
				<td> Servicio full de bicicleta</td>
				<td><?php print $valor1 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor2>0)?'checked':' ');?> /></td>
				<td> Servicio medio de bicicleta</td>
				<td><?php print $valor2 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor3>0)?'checked':' ');?>></td>
				<td> Servicio de horquilla</td>
                <td><?php print $valor3 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor4>0)?'checked':' ');?>></td>
				<td> Servicio de shock</td>
				<td><?php print $valor4 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor5>0)?'checked':' ');?>></td>
				<td> Servicio de frenos</td>
				<td><?php print $valor5 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor6>0)?'checked':' ');?>></td>
				<td> Lavado general de bicicleta</td>
				<td><?php print $valor6 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor7>0)?'checked':' ');?>></td>
				<td> Lavado de transmisión</td>
				<td><?php print $valor7 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor8>0)?'checked':' ');?>></td>
				<td> Centrado de rueda</td>
				<td><?php print $valor8 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor9>0)?'checked':' ');?>></td>
				<td> Enrayado de rueda</td>
				<td><?php print $valor9 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor10>0)?'checked':' ');?>></td>
				<td> Sistema de tubular por rueda</td>
				<td><?php print $valor10 ?></td>
			</tr>
			<tr>
				<td class="title vacio"><input type="checkbox" <?php print(($valor11>0)?'checked':' ');?>></td>
				<td> Recarga liquido tubular</td>
				<td><?php print $valor11 ?></td>
			</tr>
			<tr>
                <td class="title vacio"><input type="checkbox" <?php print(($valor12>0)?'checked':' ');?>></td>
				<td><?php print $servicio_1 ?></td>
				<td><?php print $valor12 ?></td>
			</tr>
			<tr>
				<th class="title vacio"><b></b></th>
				<th class="title servicios"><b>REPUESTOS</b></th>
				<th class="title"><b>VALOR</b></th>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos1 ?> </td>
				<td><?php print $valor13 ?></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos2 ?> </td>
				<td><?php print $valor14 ?></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos3 ?></td>
				<td><?php print $valor15 ?></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos4 ?></td>
				<td><?php print $valor16 ?></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos5 ?></td>
				<td><?php print $valor17 ?></td>
			</tr>
			<tr>
				<td class="title vacio"></td>
				<td><?php print $repuestos6 ?> </td>
				<td><?php print $valor18 ?></td>
			</tr>
            <tr>
                <td class="title vacio"></td>
                <th class="title ">TOTAL </th>
                <td><?php print $total ?></td>
            </tr>
			</table>
</page>

<?php 

	$rutaEnServidorpdf='pdf';
	$content=ob_get_clean();
	require_once('../librerias/html2pdf/html2pdf.class.php');

	$pdf = new HTML2PDF('P','A4','es','UTF-8');
	$pdf-> writeHTML($content);
	$archivo = $pdf-> output('../pdf/N_'.$num_fac.'.pdf', 'F');
	$nombrepdf = "N_".$num_fac;

	$rutaDestinopdf=$rutaEnServidorpdf.'/'.$nombrepdf.'.pdf';

	//print_r($id_cliente." ".$_POST['id_cli']);
	//exit();
	if(isset($_POST['id_cli']) && $id_cliente!=""){

	$servicio = registraServicio($id_cliente, $rutaDestinopdf, $total, $hoy, $fecha_ent);

	// Verificamos que se hallan insertado los datos.
	if($servicio)
	{
	?>
		<script>
			// Alert informando.
			alert('El servicio ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_historial_servicios.php";
		</script>
    <?php
	}else{?>
	<script>
			// Alert informando.
			alert('El Servicio NO ha sido registrado, Intente Nuevamente');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_nuevo_servicio.php";
		</script>
		<?php
}
}else{
?>
<script>
			// Alert informando.
			alert('El Cliente no esta Registrado en el Sistema, Para Ingresar Servicio debe registrar al Cliente en el Sistema.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_ingresar_cliente.php";
		</script>

<?php
}
?>	