import $ from "jquery"

import 'bootstrap/dist/js/bootstrap'

$(window).resize(function() {
    if ($(this).width() >= 1280) {
        $("#navbar").removeClass("fixed-bottom").addClass("fixed-top");
    }
    else if ($(this).width() < 1280 && $(this).width()>= 480) {
        $("#navbar").removeClass("fixed-top").addClass("fixed-bottom");
    }
});