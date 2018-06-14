$(document).on('click', '.move', function (e) {
    e.preventDefault();
    let move = $(this).attr('data-move');
    $.get('/finder/direction/' + move).done(function (result) {
        const alertResult = $(result).find('#messageFlash');
        $('#messageFlash').replaceWith(alertResult);
        const mapResult = $(result).find('#map');
        $('#map').replaceWith(mapResult);
    });
});