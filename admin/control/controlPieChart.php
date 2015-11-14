<?php
include_once("../modelo/modelo_reportes.php");
  
  $pie1=((isset($_GET["q"])) ? $_GET["q"] : null);
 

  if (isset($pie1) || $pie1!=null) {

  	$res = gananciasMes($pie1);
  	$pie_chart_data= array();
  	foreach ($res as $val) {
  		$pie_chart_data[] = array($val['mes_venta'],($val['total_ventas']+$val['total_servicios']+$val['total_pedido']-$val['total_gasto']));
  	}
  	$pie_chart_data = json_encode($pie_chart_data);
  	echo $pie_chart_data;
  }
 

  

  ?>