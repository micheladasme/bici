$(function() {
    $('div', $('#ruedas')).draggable({ revert: "valid", helper: "clone"});
    $('div', $('#marcos')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#pinones')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#cambiotrs')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#horquillas')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#sillines')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#bielas')).draggable({  revert: "valid", helper: "clone" });
    $('div', $('#manubrios')).draggable({  revert: "valid", helper: "clone" });
     $('div', $('#pedales')).draggable({  revert: "valid", helper: "clone" });
     $('div', $('#tijas')).draggable({  revert: "valid", helper: "clone" });
    

    $("#cont-rueda").droppable({
        accept: "#ruedas div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-rueda").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $(ids).clone().appendTo("#cont-rueda2");
             $('#modalRueda').modal('show');
              $("#cont-rueda").droppable( "option", "disabled", true );
        }

    });


    $("#cont-rueda2").droppable({
        accept: "#ruedas div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-rueda2").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $(ids).clone().appendTo("#cont-rueda");
             $('#modalRueda').modal('show');
              $("#cont-rueda2").droppable( "option", "disabled", true );
        }
    });

    $("#cont-marco").droppable({
        accept: "#marcos div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-marco").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {marco:valor}, // all data will be passed here
                    success: function(data){ 
                        tablaProductos(data); 
                        
                    }
                });
             $("#cont-marco").droppable( "option", "disabled", true );
            }
    });

     $("#cont-pinones").droppable({
        accept: "#pinones div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-pinones").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {pinon:valor}, // all data will be passed here
                    success: function(data){ 
                        tablaProductos(data);
                        
                    }
                });
             $("#cont-pinones").droppable( "option", "disabled", true );
            }
    });

    $("#cont-pedal").droppable({
        accept: "#pedales div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-pedal").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
             $('#modalPedal').modal('show');
            $("#cont-pedal").droppable( "option", "disabled", true );
            }
    });

     $("#cont-cambioTra").droppable({
        accept: "#cambiotrs div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-cambioTra").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {cambioTra:valor}, // all data will be passed here
                    success: function(data){ 
                       tablaProductos(data);
                        
                    }
                });
            $("#cont-cambioTra").droppable( "option", "disabled", true );
            }
    });

    $("#cont-horquilla").droppable({
        accept: "#horquillas div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-horquilla").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {horquilla:valor}, // all data will be passed here
                    success: function(data){ 
                       tablaProductos(data);
                       
                    }
                });
             $("#cont-horquilla").droppable( "option", "disabled", true );
        }
    });

    $("#cont-sillin").droppable({
        accept: "#sillines div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-sillin").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

              $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {sillin:valor}, // all data will be passed here
                    success: function(data){ 
                       tablaProductos(data);
                       
                    }
                });
             $("#cont-sillin").droppable( "option", "disabled", true );
        }
    });

    $("#cont-tija").droppable({
        accept: "#tijas div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-tija").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
            $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {tija:valor}, // all data will be passed here
                    success: function(data){ 
                       tablaProductos(data);
                       
                    }
                });
             $("#cont-tija").droppable( "option", "disabled", true );
        }
    });

    $("#cont-biela").droppable({
        accept: "#bielas div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
            var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-biela").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
             $.ajax({
                    url: "control/RPartes.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {biela:valor}, // all data will be passed here
                    success: function(data){ 
                       tablaProductos(data);
                        $('#modalBiela').modal('show');
                    }
                });
             $("#cont-biela").droppable( "option", "disabled", true );
        }
    });


    $("#cont-manubrio").droppable({
        accept: "#manubrios div",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function(event, ui) {
            var width = $(this).width();
            var height = $(this).height();
            var ids = "#"+($(ui.draggable).attr('id'));
             var valor = ($(ui.draggable).attr('value'));
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-manubrio").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });
             $('#modalManubrio').modal('show');
        $("#cont-manubrio").droppable( "option", "disabled", true );
        }
    });

$("#btn1").click(function() {
   $(".ui-widget-header").empty();
   vaciarArray();
  
});

});


