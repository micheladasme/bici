$(function() {
    $('li', $('#ruedas')).draggable({ revert: "invalid" });
    $('li', $('#marcos')).draggable({ revert: "invalid" });
    $('li', $('#horquillas')).draggable({ revert: "invalid" });
    $('li', $('#sillines')).draggable({ revert: "invalid" });
    $('li', $('#bielas')).draggable({ revert: "invalid" });
    $('li', $('#manubrios')).draggable({ revert: "invalid" });

    $("#cont-rueda").droppable({
        accept: "#ruedas li",
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
        }
    });


    $("#cont-rueda2").droppable({
        accept: "#ruedas li",
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
        }
    });

    $("#cont-marco").droppable({
        accept: "#marcos li",
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
        accept: "#horquillas li",
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
        accept: "#sillines li",
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
        accept: "#bielas li",
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
        accept: "#manubrios li",
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

});
