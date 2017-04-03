new WOW().init();

function parallax(){
  var prlx_lyr_1 = document.getElementById('layer');
  prlx_lyr_1.style.top = (window.pageYOffset / 1.38 )+'px';
}
  window.addEventListener("scroll", parallax, false);

$(document).ready(function(){
  $(window).scroll(function (event) {
        var y = $(this).scrollTop();
        if (y <= 500) {
          $('#top-bar').addClass('navbar-hidden');
        }else {
          $('#top-bar').addClass('animated').addClass('fadeInDown');
          $('#top-bar').addClass('navbar-fixed-top').addClass('navbar-default');
          $('#top-bar').removeClass('navbar-hidden');
        }
        if (y >= 200) {
          $('.scroll').addClass('none');
        }else {
          $('.scroll').removeClass('none');
        }
    });
});
