     <style type="text/css">
       .btn{
            margin: 4px;
            box-shadow: 1px 1px 5px #888888;
        }

        .btn-xs{
            font-weight: 300;
        }

        .btn-hot {
            color: #fff;
            background-color: #db5566;
            border-bottom:2px solid #af4451;

        }

        .btn-hot:hover, .btn-sky.active:focus, .btn-hot:focus, .open>.dropdown-toggle.btn-hot {
            color: #fff;
            background-color: #df6a78;
            border-bottom:2px solid #b25560;
            outline: none;}


        .btn-hot:active, .btn-hot.active {
            color: #fff;
            background-color: #c04b59;
            border-top:2px solid #9a3c47;
            margin-top: 2px;
        }

        .btn-sunny {
            color: #fff;
            background-color: #f4ad49;
            border-bottom:2px solid #c38a3a;
        }

        .btn-sunny:hover, .btn-sky.active:focus, .btn-sunny:focus, .open>.dropdown-toggle.btn-sunny {
            color: #fff;
            background-color: #f5b75f;
            border-bottom:2px solid #c4924c;
            outline: none;
        }


        .btn-sunny:active, .btn-sunny.active {
            color: #fff;
            background-color: #d69840;
            border-top:2px solid #ab7a33;
            margin-top: 2px;
        }

        .btn-fresh {
            color: #fff;
            background-color: #51bf87;
            border-bottom:2px solid #41996c;
        }

        .btn-fresh:hover, .btn-sky.active:focus, .btn-fresh:focus, .open>.dropdown-toggle.btn-fresh {
            color: #fff;
            background-color: #66c796;
            border-bottom:2px solid #529f78;
            outline: none;
        }


        .btn-fresh:active, .btn-fresh.active {
            color: #fff;
            background-color: #47a877;
            border-top:2px solid #39865f;
            outline: none;
            margin-top: 2px;
        }

        .btn-sky {
            color: #fff;
            background-color: #0bacd3;
            border-bottom:2px solid #098aa9;
        }

        .btn-sky:hover,.btn-sky.active:focus, .btn-sky:focus, .open>.dropdown-toggle.btn-sky {
            color: #fff;
            background-color: #29b6d8;
            border-bottom:2px solid #2192ad;
            outline: none;
        }

        .btn-sky:active, .btn-sky.active {
            color: #fff;
            background-color: #0a97b9;
            border-top:2px solid #087994;
            margin-top: 2px;
        }

        .btn:focus,
        .btn:active:focus,
        .btn.active:focus {
            outline: none;
            outline-offset: 0px;
        }
     </style>
     <script type="text/javascript">
     function salir(){
            var respuesta=confirm('Desea realmente Cerrar Sesion?');
            if(respuesta==true)
                window.location="../salir.php";
            else
                return 0;
        }
     </script>
	<div class="row">
		<div class="row">
  			<div class="col-md-4 col-md-offset-7"> <h3 style="color:#eeeeee;">Bienvenido Sr.(a) <?php echo $_SESSION['usu_nombre']; ?></h3></div>
		</div>

    <!--
        <div class="well text-center">
            <button type="button" class="btn btn-hot text-capitalize btn-xs">hot button</button>
            <button type="button" class="btn btn-sunny text-capitalize btn-xs">Sunny button</button>
            <button type="button" class="btn btn-fresh text-capitalize btn-xs">Fresh button</button>
            <button type="button" class="btn btn-sky text-capitalize btn-xs">Sky button</button>
        </div>
        <div class="well text-center">
            <button type="button" class="btn btn-hot text-uppercase btn-sm">hot button</button>
            <button type="button" class="btn btn-sunny text-uppercase btn-sm">Sunny button</button>
            <button type="button" class="btn btn-fresh text-uppercase btn-sm">Fresh button</button>
            <button type="button" class="btn btn-sky text-uppercase btn-sm">Sky button</button>
        </div>-->
        <div class="well text-center col-md-offset-1 col-md-10">
            <img src="images/logo.png" class="pull-left" style="width: 150px; height: 45px;">
			<a type="button" class="btn btn-hot text-uppercase" href="armado2.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>   Crear Bicicleta</a>
            <a type="button" class="btn btn-sunny text-uppercase" href="creaciones.php"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>   Creaciones</a>
            <a type="button" class="btn btn-fresh text-uppercase" href="pedidos.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Pedidos</a>
            <a type="button" class="btn btn-sky text-uppercase pull-right" onclick="salir()"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar Sesion</a>
        </div>
        <!--
        <div class="well text-center">
            <button type="button" class="btn btn-hot text-uppercase btn-lg">hot button</button>
            <button type="button" class="btn btn-sunny text-uppercase btn-lg">Sunny button</button>
            <button type="button" class="btn btn-fresh text-uppercase btn-lg">Fresh button</button>
            <button type="button" class="btn btn-sky text-uppercase btn-lg">Sky button</button>
        </div>
        -->
	</div>
