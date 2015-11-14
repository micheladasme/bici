<?php
include_once("../modelo/modelo_reportes.php");
  
  $pie1=((isset($_GET["q"])) ? $_GET["q"] : null);
  $pie2=((isset($_GET["r"])) ? $_GET["r"] : null);

  if(isset($pie2) || $pie2!=null)
  {
    $res = ingresosGastosActividades($pie2);
    $pie_chart_data= array();
    foreach ($res as $key => $val) {
      $pie_chart_data[] = array("Ganacias",($val['total_ventas']+$val['total_servicios']+$val['total_pedido']));
      $pie_chart_data[] = array("Gastos", $val['total_gastos']);
     
    }
    $pie_chart_data2 = json_encode($pie_chart_data);
    echo $pie_chart_data2;

  }

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