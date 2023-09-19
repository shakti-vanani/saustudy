$('#toggle').bind('change', function() {
    $('body').toggleClass('light');
    $('.box').toggleClass('light');
    $(this).next().toggleClass('light');
});

