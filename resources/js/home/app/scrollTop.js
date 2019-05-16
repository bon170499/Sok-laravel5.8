// import $ from 'jquery';
function scrollTop(){
    let but = '.js-scroll';
    let hidden = '.js-hidden';
    let offSet = 100;
    let duration = 500;
    $(window).scroll(function(){
        if($(this).scrollTop() > offSet){
            $(but).fadeIn(duration);
            $(hidden).fadeOut(duration);
        }else {
            $(but).fadeOut(duration);
            $(hidden).fadeIn(duration);
        }
    })
    $(but).click(function(){
        $('html, body').animate({scrollTop: 0}, duration);
    })
}
function navHidden(){
    $('#js-nav-hidden').click(function(){
        console.log('haha');
        $('.nav-hidden').slideToggle(500);
    })
}
$(document).ready(function(){
    scrollTop();
    navHidden();
})
