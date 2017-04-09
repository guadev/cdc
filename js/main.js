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
          $('#home-bar').addClass('navbar-hidden');
        }else {
          $('#home-bar').addClass('animated').addClass('fadeInDown');
          $('#home-bar').addClass('navbar-fixed-top').addClass('navbar-default');
          $('#home-bar').removeClass('navbar-hidden');
        }
        if (y >= 200) {
          $('.scroll').addClass('none');
        }else {
          $('.scroll').removeClass('none');
        }
    });
});
