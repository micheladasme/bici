<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="vista_inicio_admin.php">
                <img alt="Brand" src="../img/logo.png" style="width:160px;height:50px;">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size: 13px;">
            <ul class="nav navbar-nav">
                <!--
                   <li><a href="#">Link</a></li>

                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-th-large"></span> Productos <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              -->



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> Servicios <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <!--<li> <a href="vista_venta.php">Nueva Venta</a></li>
                        <li class="divider"></li>-->
                        <li> <a href="vista_nuevo_servicio.php">Nuevo Servicio</a></li>
                        <li> <a href="vista_historial.php">Historial Servicios</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-th-large"></span> Productos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="vista_ver_producto.php">Ver Productos</a></li>
                       <!-- <li> <a href="vista_ingresar_producto.php">Ingresar Producto</a></li>
                        <li> <a href="vista_modificar_producto.php">Modificar Producto</a></li>
                        <li> <a href="vista_eliminar_producto.php">Anular Producto</a></li>-->
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-inbox"></span> Stock <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="vista_stock_general.php">Ver Stock</a></li>
                        <!--<li> <a href="vista_ingresar_stock.php">Ingresar Stock</a></li>-->
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-list"></span> Categorias <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="vista_ver_categorias.php">Ver Categorias</a></li>
                       <!--<li> <a href="vista_ingresar_categoria.php">Ingresar Categoria</a></li>-->

                        <!--<li class="divider"></li>
                        <li> <a href="vista_ver_subcategoria.php">Ver Sub-Categoria</a></li>
                        <li> <a href="vista_ingresar_subcategoria.php">Ingresar Sub-Categoria</a></li>-->

                    </ul>
                </li>

                <li> <a href="vista_pedidos.php"><span class="glyphicon glyphicon-list-alt"></span> Pedidos </a></li>

                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-usd"></span> Gastos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="vista_ver_gasto.php">Ver Gasto</a></li>
                        <li> <a href="vista_ingresar_gasto.php">Ingresar Gasto</a></li>

                    </ul>
                </li>-->


                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog"></span> Sistema <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="vista_ingresar_usuario.php">Ingresar Usuario</a></li>
                        <li> <a href="vista_modificar_usuario.php">Modificar Usuario</a></li>
                        <li class="divider"></li>
                        <li> <a href="vista_ver_cliente.php">Ver Cliente</a></li>
                        <li> <a href="vista_ingresar_cliente.php">Ingresar Cliente</a></li>
                    </ul>
                </li>

                <li> <a href="vista_ingresar_noticia.php"><span class="glyphicon glyphicon-comment"></span> Noticias</a></li>

                <li> <a href="reportes.php"><span class="glyphicon glyphicon-stats"></span> Reportes</a></li>-->



            </ul>




            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sr.(a) <?php echo $_SESSION['usu_nombre']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" onclick="salir()"> <span class="glyphicon glyphicon-off">    </span> Cerrar Sesion </a></li>


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>