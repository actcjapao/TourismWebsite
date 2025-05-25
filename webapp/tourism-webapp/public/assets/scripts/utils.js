function scrollNavigate(target) {
    var $target = $(target);

    // Ensure no jump before scrolling
    if ($target.length) {
        // Scroll to the target immediately with no delay
        $('html, body').stop(true, true).animate({
        scrollTop: $target.offset().top
        }, 50, 'swing');  // Set the speed of the scroll (500ms)
    }
}