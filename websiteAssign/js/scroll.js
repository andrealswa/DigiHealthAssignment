$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 2000);
});

$(document).on("click","#up",function(){
    $('html,body').animate({scrollTop: 0}, 2000);

});