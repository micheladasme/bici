 <?php
 include_once("../modelo/modelo_reportes.php");

 $pie2=((isset($_GET["r"])) ? $_GET["r"] : null);

  if(isset($pie2) || $pie2!=null)
  {
    $res = ingresosGastosActividades($pie2);
    $pie_chart_data= array();
    foreach ($res as $key => $val) {
      $pie_chart_data[] = array("Ganacias",($val['total_ventas']+$val['total_servicios']+$val['total_pedido']));
      $pie_chart_data[] = array("Gastos", (int)$val['total_gastos']);
     
    }
    $pie_chart_data2 = json_encode($pie_chart_data);
    echo $pie_chart_data2;

  }

  ?>