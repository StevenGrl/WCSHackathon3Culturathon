$(document).on('click', '.move', function (e) {
    e.preventDefault();
    let move = $(this).attr('data-move');
    $.get('/finder/direction/' + move).done(function (result) {
       const mapResult = $(result).find('.map');
       $('.map').replaceWith(mapResult);
    });
});