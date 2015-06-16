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
#Marco { width: 50px; height:50px; margin:5px; z-index: 20;}
#Rueda { width: 50px; height:50px; margin:5px;  z-index: 20;}
#Horquilla { width: 50px; height:50px; margin:5px;  z-index: 20;}
#Sillin { width: 50px; height:50px; margin:5px;  z-index: 20;}
#Manubrio { width: 50px; height:50px; margin:5px;  z-index: 20;}
#Biela { width: 50px; height:50px; margin:5px;  z-index: 20;}

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
outline-offset: none;
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
outline-offset: none;
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

/*$(function() {
$( "#draggable, #draggable-nonvalid" ).draggable(({ revert: "invalid" }));
$( "#droppable" ).droppable({
accept: "#draggable",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
$( this )
.addClass( "ui-state-highlight" )
.find( "p" )
.html( "Dropped!" );
}
});
});*/
$(function() {
$( ".marco, .rueda, .horquilla,.biela,.sillin,.manubrio" ).draggable({ revert: true });
$(".marco, .rueda, .horquilla,.biela,.sillin,.manubrio").data("soltado", false);

$("#cont-marco").droppable("option","accept",".marco")
$( "#cont-marco" ).droppable({
accept: ".marco",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($(this).attr("id");); 
var width = $(this).width();
var height = $(this).height();
 
$("#Marco").css({
height: height ,
width: width,
margin: 0,
top:0,
left:0,


});
}
});

$( "#cont-horquilla" ).droppable({
accept: "#Horquilla",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($("#Horquilla")); 
var width = $(this).width();
var height = $(this).height();
 
$("#Horquilla").css({
height: height ,
width: width,
margin: 0,
top:0,
left:0,


});
}
});

$( "#cont-manubrio" ).droppable({
accept: "#Manubrio",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($("#Manubrio")); 
var width = $(this).width();
var height = $(this).height();
 
$("#Manubrio").css({
height: height ,
width: width,
margin: 0,
top:0,
left:0,


});
}
});

$( "#cont-sillin" ).droppable({
accept: "#Sillin",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($("#Sillin")); 
var width = $(this).width();
var height = $(this).height();
 
$("#Sillin").css({
height: height ,
width: width,
margin: 0,
top:0,
left:0,


});
}
});

$( "#cont-biela" ).droppable({
accept: "#Biela",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($("#Biela")); 
var width = $(this).width();
var height = $(this).height();
 
$("#Biela").css({
height: height ,
width: width,
margin: 0,
top:0,
left:0,


});
}
});

$( "#cont-rueda" ).droppable({
accept: "#Rueda",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
$("#Rueda").addClass("ui-draggable-dragging");
$(this).append($("#Rueda"));    
 
var width = $(this).width();
var height = $(this).height();
 
$("#Rueda").css({
height: height,
width: width,
margin: 0,
top:0,
left:0,



});
$("#Rueda").clone().appendTo("#cont-rueda2");

 }
});

$( "#cont-rueda2" ).droppable({
accept: "#Rueda",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
$("#Rueda").addClass("ui-draggable-dragging");
$(this).append($("#Rueda"));    
 
var width = $(this).width();
var height = $(this).height();
 
$("#Rueda").css({
height: height,
width: width,
margin: 0,
top:0,
left:0,
});

$("#Rueda").clone().appendTo("#cont-rueda");

 }
});

});



</script>
</head>

<body> 
<!--<div id="draggable-nonvalid" class="ui-widget-content">
<p>I'm draggable but can't be dropped</p>
</div>
<div id="draggable" class="ui-widget-content">
<p>Drag me to my target</p>
</div>
<div id="droppable" class="ui-widget-header">
<p>accept: '#draggable'</p>-->



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
              <div id="collapseOne" class="panel-collapse collapse in">

               <div id="Rueda" class="ui-widget-content rueda">
        
                <img src="../imagenes/rueda_montana.png" style="width:100%; height: 100%"/>
              </div>


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
                 <div id="Marco" class="ui-widget-content">
        
                <img src="../imagenes/canvas.png" style="width:100%; height: 100%"/>
              </div>
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
                 <div id="Horquilla" class="ui-widget-content">
        
                <img src="../imagenes/horquilla.png" style="width:100%; height: 100%"/>
              </div>
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
                 <div id="Sillin" class="ui-widget-content">
        
                <img src="../imagenes/sillin_fierro_abajo.png" style="width:100%; height: 100%"/>
              </div>
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
                 <div id="Biela" class="ui-widget-content">
        
                <img src="../imagenes/biela.png" style="width:100%; height: 100%"/>
              </div>
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
                 <div id="Manubrio" class="ui-widget-content">
        
                <img src="../imagenes/manubrio.png" style="width:100%; height: 100%"/>
              </div>
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
<!--<div id="lista">
  <div id="productos" class="ui-widget-content ui-state-default">
	<h4 class="ui-widget-header"> Productos</h4>

  		<div id="Rueda" class="ui-widget-content" style="width:20px; height: 20px">
  			<p>Rueda 1</p>
  			<img src="../imagenes/2sinautor-nousar.jpg" style="width:100%; height: 100%"/>
		</div>
		<br>
		<br>
		<div id="Marco" class="ui-widget-content" style="width:50px; height: 50px">
			<p>Marco 1</p>
		</div>
	</div>
</div>-->
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