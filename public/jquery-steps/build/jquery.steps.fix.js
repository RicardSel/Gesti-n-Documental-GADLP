function resizeJquerySteps() {
    $('.wizard .content').animate({
       height: $('.body.current').outerHeight()
   }, 'slow');
}

$(window).resize($.debounce(100,resizeJquerySteps));