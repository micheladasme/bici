 
 <header style="height:100px"> 
     <h3 class="text-center"  >Super Administrador</h3>
    <img src="../../img/logo.png" class="pull-left" style="width:150px;height:50px;"/>
  
       
       
        <h4 class="pull-right">Bienvenido Sr.(a) <?php echo $_SESSION['usu_nombre']; ?></h4>
        </header>
          <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
        <!--<div class="btn-group" style="float:left;margin-left: 10px;"> 
            <a href="vista_inicio_admin.php" class="btn btn-default btn-sm navbar-btn" role="button">
             Inicio</a> 
            </div>-->

                    <div class="btn-group" style="float:left;margin:10px;"> 
                  <a href="armar_bicicleta.php" class="btn btn-warning btn-sm  " role="button"> 
                    <span class="glyphicon glyphicon-wrench"></span>
                    Armar Bicicletas
                  </a>
                </div>

                    <div class="btn-group" style="float:left;margin:10px;"> 
                  <a href="vista_venta.php" class="btn btn-warning btn-sm  " role="button"> 
                    <span class="glyphicon glyphicon-wrench"></span>
                    Nueva Venta
                  </a>
                </div>
        
                <div class="btn-group" style="float:left; margin:10px;"> 
                  <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-th-large"></span> Productos <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li> <a href="vista_ver_producto.php">Ver Productos</a></li>
                    <li> <a href="vista_ingresar_producto.php">Ingresar Producto</a></li>
                    <li> <a href="vista_modificar_producto.php">Modificar Producto</a></li>
                    <li> <a href="vista_eliminar_producto.php">Anular Producto</a></li>
                </ul>
                </div>
                
                  <div class="btn-group" style="float:left; margin: 10px;"> 
                  <button type="button" class="btn btn-success btn-sm  dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-inbox"></span> Stock <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li> <a href="vista_stock_general.php">Ver Stock</a></li>
                   <li> <a href="vista_ingresar_stock.php">Ingresar Stock</a></li>
                  </ul>
                </div>

                  <div class="btn-group" style="float:left;margin:10px;"> 
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-th-list"></span> Categorias <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li> <a href="vista_ver_categoria.php">Ver Categorias</a></li>
                    <li> <a href="vista_ingresar_categoria.php">Ingresar Categoria</a></li>
                    <li> <a href="vista_modificar_categoria.php">Modificar Categoria</a></li>
                    <li class="divider"></li>
                    <li> <a href="vista_ver_subcategoria.php">Ver Sub-Categoria</a></li>
                    <li> <a href="vista_ingresar_subcategoria.php">Ingresar Sub-Categoria</a></li>
                    <li> <a href="vista_modificar_subcategoria.php">Modificar Sub-Categoria</a></li>
                </ul>
                </div>
                
                 <div class="btn-group" style="float:left; margin:10px;"> <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">  <span class="glyphicon glyphicon-list-alt"></span> Pedidos <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li> <a href="vista_ingresar_gasto.php">Ver Pedidos</a></li>
                  </ul>
                </div>
               
                
                <div class="btn-group" style="float:left; margin:10px;"> <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">  <span class="glyphicon glyphicon-usd"></span> Gastos <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li> <a href="vista_ingresar_gasto.php">Ingresar Gasto</a></li>
                  <li> <a href="vista_anular_gasto.php">Anular Gasto</a></li>
                  </ul>
                </div>

                <div class="btn-group" style="float:left; margin:10px;"> <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">  <span class="glyphicon glyphicon-cog"></span> Sistema <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li> <a href="vista_ingresar_gasto.php">Ingresar Usuario</a></li>
                  <li> <a href="vista_modificar_gasto.php">Modificar Usuario</a></li>
                  </ul>
                </div>
                  
                  <div class="btn-group" style="float:left; margin:10px;"> <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">  <span class="glyphicon glyphicon-user"></span> Clientes <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li> <a href="vista_ver_cliente.php">Ver Cliente</a></li>
                  <li> <a href="vista_ingresar_cliente.php">Ingresar Cliente</a></li>
                  </ul>
                </div>

                <div class="btn-group" style="float:left;margin:10px;"> 
              <a href="reportes.php" type="button" class="btn btn-success btn-sm" role="button"> 
                <span class="glyphicon glyphicon-stats"></span>
               Reportes e Informacion 
              </a>
            </div>
               
               <div class="btn-group" style="float:right; margin:10px;"> 
               <a class="btn btn-primary btn-sm " style="margin-left:10px; margin-right:10px;" role="button" onclick="salir()">
                 Cerrar Sesion  <span class="glyphicon glyphicon-off">    </span></a> 
            </div>
             </div>
          </nav>