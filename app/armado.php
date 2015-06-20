<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bici-O-Matic</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/jquery-ui.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/drag-drop.js"></script>
<style>


#productos { float: left; width: 300px; height: 500px; margin:10px;  }
#productos h4 { line-height: 16px; margin: 0 0 0.4em; }
#armado { margin:auto; position: relative; width: 50%; }
#lista {float:left; width: 320px; height: 600px; border: 1px solid black; }
#cont-marco { width: 600px; height: 400px; left:80px; top:20px; margin: 10px; z-index: 3; position: absolute; padding: 30px 65px 15px 65px; }
#cont-rueda { width: 280px; height: 280px; left:45px; top:190px; z-index: 1; position: absolute;}
#cont-rueda2 { width: 280px; height: 280px; right:20px; top:190px; z-index: 1; position: absolute;}
#cont-horquilla{ width: 40px; height: 275px; right:190px; top:90px; z-index: 4; position: absolute;
  -ms-transform: rotate(-30deg); /* IE 9 */
    -webkit-transform: rotate(-30deg); /* Chrome, Safari, Opera */
    transform: rotate(-30deg);}
#cont-biela{width: 100px; height: 100px; left:340px; top:275px; z-index: 4; position: absolute;}    
#cont-sillin{width: 120px; height: 100px; left:255px; top:110px; z-index: 4; position: absolute;} 
#cont-manubrio{width: 70px; height: 70px; right:255px; top:70px; z-index: 4; position: absolute;}

#ruedas li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
#marcos li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
#horquillas li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
#bielas li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
#sillines li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}
#manubrios li { width: 50px; height:50px; margin:5px; z-index: 20; border: 1px solid;}

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


}

#accordion .glyphicon { margin-right:10px; }
      .panel-collapse>.list-group .list-group-item:first-child {border-top-right-radius: 0;border-top-left-radius: 0;}
      .panel-collapse>.list-group .list-group-item {border-width: 1px 0;}
      .panel-collapse>.list-group {margin-bottom: 0;}
      .panel-collapse .list-group-item {border-radius:0;}

      .panel-collapse .list-group .list-group {margin: 0;margin-top: 10px;}
      .panel-collapse .list-group-item li.list-group-item {margin: 0 -15px;border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}
      .panel-collapse .list-group-item li.list-group-item:last-child {padding-bottom: 0;}

      .panel-collapse div.list-group div.list-group{margin: 0;}
      .panel-collapse div.list-group .list-group a.list-group-item {border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}
</style>
<script>

</script>
</head>

<body> 

<?php include("header.php"); ?>
</br>

<!-- Draggables -->
<div class="row" style="margin: 5px;">
<div class="well col-md-3 pull-left" style="margin: 10px;">
  <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3">
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Ruedas</a>
                </h4>
              </div>
              <div id="collapseOne">
                <ul id="ruedas" class="gallery ui-helper-reset ui-helper-clearfix">
                    <li id="rueda1" class="ui-widget-content ui-corner-tr">
                        <img src="../imagenes/rueda_montana.png" style="width:100%; height: 100%"/>
                    </li>
                </ul>



              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Marcos</a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                 <ul id="marcos" class="gallery ui-helper-reset ui-helper-clearfix">
                     <li id="marcos1" class="ui-widget-content ui-corner-tr">
                         <img src="../imagenes/canvas.png" style="width:100%; height: 100%"/>
                     </li>
                 </ul>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Horquillas</a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                  <ul id="horquillas" class="gallery ui-helper-reset ui-helper-clearfix">
                      <li id="horquilla1" class="ui-widget-content ui-corner-tr">
                          <img src="../imagenes/horquilla.png" style="width:100%; height: 100%"/>
                      </li>
                  </ul>
              </div>
            </div>
          
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    Sillin</a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse">
                  <ul id="sillines" class="gallery ui-helper-reset ui-helper-clearfix">
                      <li id="sillin1" class="ui-widget-content ui-corner-tr">
                          <img src="../imagenes/sillin_fierro_abajo.png" style="width:100%; height: 100%"/>
                      </li>
                  </ul>
              </div>
            </div>
             
             <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    Biela</a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse">
                  <ul id="bielas" class="gallery ui-helper-reset ui-helper-clearfix">
                      <li id="biela1" class="ui-widget-content ui-corner-tr">
                          <img src="../imagenes/biela.png" style="width:100%; height: 100%"/>
                      </li>
                  </ul>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    Manubrio</a>
                </h4>
              </div>
              <div id="collapseSix" class="panel-collapse collapse">
                  <ul id="manubrios" class="gallery ui-helper-reset ui-helper-clearfix">
                      <li id="manubrio1" class="ui-widget-content ui-corner-tr">
                          <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
                      </li>
                  </ul>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiv">Accesorios</a>
                </h4>
              </div>
              <div id="collapseFiv" class="panel-collapse collapse">
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
                <div class="list-group">
                  <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Contenedores -->

<div class="well col-md-8" style="margin: 5px; height:auto">
<h3> Crea Tu Cleta !</h3>
<hr>
<br>
<div id="cleta" style="position: relative; height:500px; border: 1px solid #cccccc; background: white;">
<div id="cont-marco" class="ui-widget-header">

</div>
<div id="cont-rueda" class="ui-widget-header">


</div>
<div id="cont-rueda2" class="ui-widget-header">


</div>
<div id="cont-horquilla" class="ui-widget-header">


</div>
<div id="cont-biela" class="ui-widget-header">


</div>
<div id="cont-sillin" class="ui-widget-header">


</div>
<div id="cont-manubrio" class="ui-widget-header">


</div>
</div>
</div>
</br>
</br>
<!-- Cotizacion --> 

</div>
</body>
</html>