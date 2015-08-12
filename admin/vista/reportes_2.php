<?php
session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}

include_once("../modelo/modelo_reportes.php");

$res1 = ingresosActividades();
$res2 = muestraVentas();
$res3 = muestraGasto();
$res4 = fechaActividades();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reportes Financieros</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

          <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Reportes e Informacion</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Sr(a) <?php echo($_SESSION['usu_nombre']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="vista_inicio_admin.php"><i class="glyphicon glyphicon-share-alt"></i> Volver al Sistema de Administracion</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="salir()"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="reportes.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="reportes_2.php"><i class="fa fa-fw fa-money"></i> Finanzas</a>
                    </li>
                    <li>
                        <a href="reportes_3.php"><i class="fa fa-fw fa-shopping-cart"></i> Ventas y Servicios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Finanzas
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="reportes.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-money"></i> Finanzas
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Gastos Realizados</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gasto #</th>
                                                <th>Fecha Gasto</th>
                                                <th>Tipo de Gasto</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($res3 as $key => $val) { ?>
                                            <tr class="post">
                                                <td><?php print($val['gas_id']); ?></td>
                                                <td><?php print($val['gas_fecha']); ?></td>
                                                <td>$<?php print($val['gas_monto']); ?></td>
                                                <td><?php print($val['tg_descripcion']); ?></td>
                                            </tr>
                                            <?php  }?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="paginate text-center">
                                   
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Ventas Realizadas</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Venta #</th>
                                                <th>Fecha</th>
                                                <th>Tipo de Pago</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($res2 as $key => $val) { ?>
                                            <tr class="post2">
                                                <td><?php print($val['com_id']); ?></td>
                                                <td><?php print($val['com_fecha']); ?></td>
                                                <td>$<?php print($val['com_total']); ?></td>
                                                <td><?php print($val['tipo_modo']); ?></td>
                                            </tr>
                                            <?php  }?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="paginate2 text-center">
                                   
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Pedidos Realizados</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gasto #</th>
                                                <th>Fecha Gasto</th>
                                                <th>Tipo de Gasto</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="post3">
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3321</td>
                                                <td>10/21/2013</td>
                                                <td>2:23 PM</td>
                                                <td>$245.12</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3320</td>
                                                <td>10/21/2013</td>
                                                <td>2:15 PM</td>
                                                <td>$5663.54</td>
                                            </tr>
                                            <tr class="post3">
                                                <td>3319</td>
                                                <td>10/21/2013</td>
                                                <td>2:13 PM</td>
                                                <td>$943.45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="paginate3 text-center">
                                   
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Servicios Realizados</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Venta #</th>
                                                <th>Fecha</th>
                                                <th>Tipo de Pago</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="post4">
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3321</td>
                                                <td>10/21/2013</td>
                                                <td>2:23 PM</td>
                                                <td>$245.12</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3320</td>
                                                <td>10/21/2013</td>
                                                <td>2:15 PM</td>
                                                <td>$5663.54</td>
                                            </tr>
                                            <tr class="post4">
                                                <td>3319</td>
                                                <td>10/21/2013</td>
                                                <td>2:13 PM</td>
                                                <td>$943.45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="paginate4 text-center">
                                   
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Ganancias Totales por Mes</h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                    Año : <select onchange="drawChart(this.value)">
                                        <option> Seleccione </option>
                                        <?php foreach ($res4 as $f => $v) { ?>
                                            <option value="<?php print $v['anio_venta'];?>"><?php print $v['anio_venta'];?></option>
                                        <?php } ?>
                                        </select>
                                </div>
                              
                                    <div id="chart_div"></div>
                                
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
           
                    <div class="col-lg-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Ingresos vs Gastos por Mes</h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                    Mes : <select onchange="drawChart2(this.value)">
                                        <option> Seleccione </option>
                                        <?php foreach ($res1 as $f => $v) { ?>
                                            <option value="<?php print $v['fecha_venta'];?>"><?php print $v['fecha_venta'];?></option>
                                        <?php } ?>
                                        </select>
                                </div>
                                
                                    <div id="chart_div2">
                                        

                                    </div>

                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
               
                <!-- /.row -->

               

               

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
 

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../js/paginate.js"></script>
    <script src="../js/custom.js"></script>
    

<script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1', {'packages':['corechart']});
      //google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
        function drawChart(num) {

     var charData = $.ajax({
      url: "../control/controlPieChart.php",
      data: "q="+num,
      dataType:"json",
      async:false
     }).responseText;
    
   
    
    var data = new google.visualization.DataTable();

      data.addColumn('string', 'Mes');
      data.addColumn('number', 'Ganancias');
      data.addRows(JSON.parse(charData));

      var options = {
       
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
  }

      function drawChart2(num) {

     var charData = $.ajax({
      url: "../control/controlPieChart.php",
      data: "r="+num,
      dataType:"json",
      async:false
     }).responseText;
    
   
    
    var data = new google.visualization.DataTable();

      data.addColumn('string', 'Mes');
      data.addColumn('number', 'Ganancias');
      data.addRows(JSON.parse(charData));

      var options = {
       
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
  }
    </script>

</body>

</html>
