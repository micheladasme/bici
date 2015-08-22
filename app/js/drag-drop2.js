$(function() {
    $('div', $('#ruedas')).draggable({ revert: "valid", helper: "clone"});
    $('div', $('#marcos')).draggable({ revert: "invalid" });
    $('div', $('#horquillas')).draggable({ revert: "invalid" });
    $('div', $('#sillines')).draggable({ revert: "invalid" });
    $('div', $('#bielas')).draggable({ revert: "invalid" });
    $('div', $('#manubrios')).draggable({ revert: "invalid" });

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
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-marco").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

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
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-horquilla").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

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
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-sillin").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

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
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-biela").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

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
            $(ids).addClass("ui-draggable-dragging");
            $("#cont-manubrio").append($(ids));
            $(ids).css({
                height: height,
                width: width,
                margin: 0,
                top:0,
                left:0
            });

        }
    });

$("#btn1").click(function() {
   $(".ui-widget-header").empty();
});

});


