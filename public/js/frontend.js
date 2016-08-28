$(document).ready(function() {
    $("#buttonLoginLayoutFront").fancybox();
});

// gestion du loading ajax global
$(document).ajaxStart(function () {
    $("container").addClass("loading");
});
$(document).ajaxStop(function () {
    $("container").removeClass("loading");
});

