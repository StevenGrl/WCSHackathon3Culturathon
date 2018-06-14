import "jquery";

global.$ = require('jquery');

import 'bootstrap/dist/js/bootstrap'

$(window).ready(function() {
    if ($(this).width() >= 1280) {
        $("#navbar").addClass("fixed-top");
        $("#drop_one").addClass("dropdown");
        $("#drop_two").addClass("dropdown");
    }
    else if ($(this).width() < 1280 && $(this).width()>= 0) {
        $("#navbar").addClass("fixed-bottom");
        $("#drop_one").addClass("dropup");
        $("#drop_two").addClass("dropup");
    }
});

$(window).resize(function() {
    if ($(this).width() >= 1280) {
        $("#navbar").removeClass("fixed-bottom").addClass("fixed-top");
        $("#drop_one").addClass("dropdown").removeClass("dropup");
        $("#drop_two").addClass("dropdown").removeClass("dropup");
    }
    else if ($(this).width() < 1280 && $(this).width()>= 0) {
        $("#navbar").removeClass("fixed-top").addClass("fixed-bottom");
        $("#drop_one").addClass("dropup").removeClass("dropdown");
        $("#drop_two").addClass("dropup").removeClass("dropdown");
    }
});