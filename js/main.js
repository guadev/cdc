new WOW().init();

$(document).ready(function(){
  $(window).scroll(function (event) {
        var y = $(this).scrollTop();
        if (y <= 180) {
          $('#home-bar').addClass('navbar-hidden');
          $('#input').addClass('none');
          $('.navpad').removeClass('container').addClass('transition').addClass('container-fluida');
        }else {
          $('#home-bar').addClass('animated').addClass('transition').removeClass('navbar-hidden');
          $('#input').removeClass('none');
          $('.navpad').addClass('container').removeClass('container-fluida');
        }
        if (y >= 200) {
          $('.scroll').addClass('none');
        }else {
          $('.scroll').removeClass('none');
        }
    });
});
