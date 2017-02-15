$(document).ready(function () {
    centreTchat();
});

$(window).resize(function () {
    centreTchat();
});


function centreTchat() {

    var w = $(window).width();
    var h = $(window).height();

    var buttonw = $("#contTchat").width();
    var buttonh = $("#contTchat").height();

    var top = (h - buttonh) / 2;
    var left = (w - buttonw) / 2;

    $('#contTchat').css({
        "left": left + "px",
        "top": top + "px"
       
    });
}