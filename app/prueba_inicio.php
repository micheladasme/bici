<?php include('/modals/modal_r_usuario.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.Rut.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#txt_cod').Rut({
                on_error: function(){ alert('Rut incorrecto'); }
            });
        });

        function valida()
        {

            document.forms["loginform"].submit();


        }
        function alerta()
        {

            alert("Contactese con el Administrador");


        }

    </script>
</head>
<body>
<header>
    <img src="img/logo.png" style="width:150px;height:50px;"/>
</header>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Bici-O-Matic</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px;"><a href="#" style="background-color: white;" role="button" onclick="alerta()">Olvido Contraseña?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" action="control/control_login.php" method="post" class="form-horizontal" role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="email" id="txt_usu" name="txt_usu" type="text" class="form-control"  placeholder="Email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="txt_pass" name="txt_pass" type="password" class="form-control"  placeholder="Contaseña">
                    </div>



                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <input type="submit" id="btn-login" value="Entrar" href="#" class="btn btn-primary btn-block" onclick="valida()">

                        </div>
                        <br><br>
                        <div class="col-sm-12 controls">
                            <input type="button" id="btn-registro" value="Registrarse al Sistema" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">

                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>

</div>

</body>
</html>