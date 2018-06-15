import "jquery";

global.$ = require('jquery');

import 'bootstrap/dist/js/bootstrap'

/////////////////
//READY
///////////////
$(window).ready(function() {
    $('#imageHidden').hide();
    $('#pills-tabContent').hide();
    $("#hidetext").addClass("d-none");
    $("#style").addClass("d-none");
    $("#time").addClass("d-none");

/////////////////
//NAVBAR MEDIA Q
///////////////
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

///////////
//SOMETHING
///////////
$('#collapseHidden').click(function(){
    $('#collapseHidden').hide();
    $('#imageHidden').show();
    $('#imageShow').hide();
    $("#artist").hide();
    $("#hidetext").hide();
    $("#style").hide();
    $("#time").hide();
    $('#pills-tab').hide();
    $('#pills-tabContent').hide();
    $('#fav').hide();

});
$('#collapseShow').click(function(){
    $('#collapseHidden').show();
    $('#imageHidden').hide();
    $('#imageShow').show();
    $('#hidetext').show();
    $("#artist").show();
    $("#style").show();
    $("#time").show();
    $('#pills-tab').show();
    $('#pills-tabContent').hide();
    $('#fav').show();


});
$('#pills-tab').click(function(){
    $('#pills-tabContent').toggle(1000);

});


///////////
//DROPDOWM
///////////

$("#act-time").click(function(e){
    $("#artist").addClass("d-none");
    $("#hidetext").addClass("d-none");
    $("#style").addClass("d-none");
    $("#time").removeClass("d-none");
    e.preventDefault();
});

$("#act-artist").click(function(e){
    $("#time").addClass("d-none");
    $("#hidetext").addClass("d-none");
    $("#style").addClass("d-none");
    $("#artist").removeClass("d-none");
    e.preventDefault();
});

$("#act-style").click(function(e){
    $("#time").addClass("d-none");
    $("#hidetext").addClass("d-none");
    $("#artist").addClass("d-none");
    $("#style").removeClass("d-none");
    e.preventDefault();
});

$("#act-desc").click(function(e){
    $("#time").addClass("d-none");
    $("#style").addClass("d-none");
    $("#artist").addClass("d-none");
    $("#hidetext").removeClass("d-none");
    e.preventDefault();
});

///////////
//DROPDOWM
///////////
$(window).ready(function (e) {
    $.get('/favorite').done(function (result) {
        const favorites = $(result).find('#favorite');
        $('#favorite').replaceWith(favorites);
    });
});