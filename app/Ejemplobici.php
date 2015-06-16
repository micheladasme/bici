<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Ejemplo Bici</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<style>
#productos { float: left; width: 300px; height: 500px; margin:10px;  }
#productos h4 { line-height: 16px; margin: 0 0 0.4em; }
#armado {margin:auto; width:600px; height:300px; border: 1px solid black;  }
#lista {float:left; width: 320px; height: 600px; border: 1px solid black; }
#cont-marco { width: 400px; height: 150px; margin: auto; margin-top: 50px; z-index: 0; }
#cont-rueda { width: 70px; height: 70px; z-index: 1;  background: red; float: left; position: absolute; }
#Marco { width: 50px; height:50px; background: yellow;} 
#Rueda { width: 50px; height: 50px;}
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
$( "#Marco, #Rueda" ).draggable(({revert: true}));

$( "#cont-marco" ).droppable({
accept: "#Marco",
activeClass: "ui-state-hover",
hoverClass: "ui-state-active",
drop: function( event, ui ) {
   
$(this).append($("#Marco")); 
var width = $(this).width();
var height = $(this).height();
 
$("#Marco").css({
height: height ,
width: width,
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

$(this).append($("#Rueda"));    
 
var width = $(this).width();
var height = $(this).height();
 
$("#Rueda").css({
height: height,
width: width,
top:0,
left:0,



});
 }
});

});
</script>
</head>

<body >
<!--<div id="draggable-nonvalid" class="ui-widget-content">
<p>I'm draggable but can't be dropped</p>
</div>
<div id="draggable" class="ui-widget-content">
<p>Drag me to my target</p>
</div>
<div id="droppable" class="ui-widget-header">
<p>accept: '#draggable'</p>-->


<!-- Draggables -->
<div id="lista">
  <div id="productos" class="ui-widget-content ui-state-default">
	<h4 class="ui-widget-header"> Productos</h4>

  		<div id="Rueda" class="ui-widget-content" style="width:20px; height: 20px">
  			<p>Rueda 1</p>
  			<!--<img src="../imagenes/2sinautor-nousar.jpg" style="width:100%; height: 100%"/>-->
		</div>
		<br>
		<br>
		<div id="Marco" class="ui-widget-content" style="width:50px; height: 50px">
			<p>Marco 1</p>
		</div>
	</div>
</div>

<!-- Contenedores --> 
<div id="armado"> 
<div id="cont-marco" class="ui-widget-header">
<div id="cont-rueda" class="ui-widget-header">


</div>
</div>

</div>
</body>
</html>