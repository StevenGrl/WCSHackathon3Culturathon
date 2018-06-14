$(document).on('click', '.moveUp', function (e) {
    e.preventDefault();
    const finder = $(this);
    $.post('/direction', {direction: 'N'}).done(function (finder) {
        finder.html(finder);
    });
});