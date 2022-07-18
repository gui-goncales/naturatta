(function ($) {
  $("#wpmc-back-to-cart").click(function () {
    window.location.replace("http://ac66371-09090.agiuscloud.net/carrinho");
  });

  $('.menu-toggle').on('click', function () {
    $(this).toggleClass('on');
    $('.menu-section').toggleClass('on');
    $('nav').toggleClass('hidden');
    if (
      window.matchMedia('@media(min-width: map-get($grid-breakpoints,lg))')
        .matches
    ) {
      $('nav ul').css('transform', 'translateY(-10%)');
    }
    $('nav ul').addClass('fadeIn');
  });

  $('.banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    fade: true,
    speed: 500,
    autoplay: true,
    autoplaySpeed: 6000,
    cssEase: 'linear',
    prevArrow: '<div class="arrowPrev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>',
    nextArrow: '<div class="arrowNext"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>'
  });

  $('.all_partners').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 4800,
    cssEase: 'linear',
    pauseOnHover: false,
    pauseOnFocus: false,
    draggable: false,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          centerPadding: '60px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 380,
        settings: {
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 1
        }
      }
    ]
  });


  $('.sliderProductHome').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: false,
    centerMode: false,
    prevArrow: '<div class="arrowPrev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>',
    nextArrow: '<div class="arrowNext"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>',
    // centerPadding: '10px',
    speed: 300,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          centerMode: false,
          centerPadding: '10px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 769,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 380,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
        }
      }
    ]
  });

  
  $('.sliderReceitas').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: false,
    centerMode: false,
    prevArrow: '<div class="arrowPrev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>',
    nextArrow: '<div class="arrowNext"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M49.536,14.304C29.27,14.304,12.84,30.733,12.84,51s16.43,36.696,36.696,36.696S86.232,71.267,86.232,51  S69.803,14.304,49.536,14.304z M72.29,53.357l-8.838,7.884c-0.044,0.04-0.089,0.078-0.136,0.114l-4.666,3.69  c-0.551,0.436-1.207,0.647-1.859,0.647c-0.886,0-1.763-0.39-2.355-1.139c-1.028-1.299-0.808-3.186,0.492-4.214l4.596-3.635  l3.037-2.709H28.779c-1.657,0-3-1.343-3-3s1.343-3,3-3h33.31l-7.429-6.417c-1.254-1.083-1.393-2.978-0.309-4.231  c1.083-1.254,2.977-1.393,4.231-0.309l13.672,11.811c0.654,0.564,1.032,1.383,1.039,2.246S72.934,52.782,72.29,53.357z"/></svg></div>',
    // centerPadding: '10px',
    speed: 300,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 380,
        settings: {
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
        }
      }
    ]
  });
 

  $('.product_mobile').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: false,
    centerMode: false,
    // centerPadding: '10px',
    speed: 300,
    responsive: [
      {
        breakpoint: 995,
        settings: {
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 769,
        settings: {
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          centerPadding: '60px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 380,
        settings: {
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 1
        }
      }
    ]
  });

  $('.categories_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: false,
    centerMode: false,
    // centerPadding: '10px',
    speed: 300,
    responsive: [
      {
        breakpoint: 995,
        settings: {
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 769,
        settings: {
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          centerPadding: '60px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 380,
        settings: {
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 1
        }
      }
    ]
  });


  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    fade: true,
    arrows: false,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    vertical: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          vertical: false,
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          vertical: false,
          arrows: false,
          centerMode: true,
          centerPadding: '60px',
          slidesToShow: 1
        }
      }
    ]
  });



  $('.zoomImage').each(function (index, el) {
    $(el).zoom({
      url: $(el).data('zoom'),
    });
  });

  var steps = 1;
  var numSteps = $('.wpmc-step-item').length;

  if (numSteps == 4) {
    $('.woocommerce-form-login').addClass('active');
    $('.woocommerce-checkout').hide();
    $('#wpmc-prev').hide();
    $('#wpmc-next').hide();
    $('#wpmc-skip-login').hide();
    $('.wpmc-tab-item').addClass('wpmc-new-for')
    $('.wpmc-login').addClass('currentFor');
  } else {
    $('.wpmc-billing').addClass('current');
    $('#wpmc-prev').hide();
    $('.wpmc-step-billing').addClass('active');
  }

  $('#wpmc-next').click(function () {
    steps++;
    $('.wpmc-step-item:nth-of-type(' + steps + ')').siblings().removeClass('active').end().addClass('active');
    $('#wpmc-prev').show();
    if (numSteps == 4) {
      $('.woocommerce-form-login').hide();
      $('.woocommerce-checkout').show();
    } else {
      $('.wpmc-tab-item:nth-of-type(' + steps + ')').siblings().end().addClass('current');
    }
  });

  $('#wpmc-prev').click(function () {
    steps--;

    $('.wpmc-step-item:nth-of-type(' + steps + ')').siblings().removeClass('active').end().addClass('active');

    if (numSteps == 4) {
      $('.woocommerce-form-login').hide();
      $('.wpmc-login').addClass('currentFor');
    } else {
      $('.wpmc-tab-item:nth-of-type(' + steps + ')').siblings().removeClass('current').end();
      $('.wpmc-billing').addClass('current');
    }
  });

  $(".woocommerce-form-login #username").attr("placeholder", "Entre com o seu email ou nome de usuário");
  $(".woocommerce-form-login #password").attr("placeholder", "Entre com a sua senha");

  $("#order_details_btn_modal").click(function () { $(".order_details_modal").addClass("active_modal"); });
  $("#order_details_btn_modal_mobile").click(function () { $(".order_details_modal").addClass("active_modal"); });
  
  $(".close").click(function () { $(".order_details_modal").removeClass("active_modal"); });

  $("#order_details_btn_modal_footer").click(function () { $(".order_details_modal").addClass("active_modal"); });
  $(".close").click(function () { $(".order_details_modal").removeClass("active_modal"); });
  
  $(".nav_areas").delegate(".item_areas", "click", function () {
    var id = $(this).attr('id');
    $("#" + id + " .showmore").toggleClass('activeshow');
    $("#" + id + " .conteudo").toggleClass("active");
  });

  //EFEITO MENU
  var _rys = jQuery.noConflict();
  _rys('document').ready(function () {
    _rys(window).scroll(function () {
      if (_rys(this).scrollTop() > 80) {
        _rys('.settings .headerBottom').addClass('mostrar');
      } else {
        _rys('.settings .headerBottom').removeClass('mostrar');
      }
    });
  });

  $(".map a").click(function(){
    var idLink = $(this).attr("xlink:href");
    $(".accordion dt").removeClass("activeEstados");
    $(".accordion dd").css("display","none");
    $(".accordion " + idLink).addClass("activeEstados").fadeIn();
    var findLink = $.find(idLink);
    // alert(findLink.length)
    if(findLink.length == 0) {
      // console.log(findLink);  
      $(".no_results").addClass("active_no_results").fadeIn();
    }  else {
      $(".no_results").removeClass("active_no_results");
    }
    
  });


  var allPanels = $('.accordion > dd').hide();
 
  $('.accordion > dt > .title').click(function() {
    $(".accordion dt .title").removeClass("activeSvg");
    $(this).toggleClass("activeSvg");
    allPanels.slideUp('500');
    $(this).parent().next().slideDown('500');
    return true;
  });

  document.addEventListener("touchstart", function() {},false);

  $(document).ready(function () {


   
    
    // $(".nav_areas > .item_areas ").each(function () {
    //   console.log(idItemModal);
    //   console.log(status);

    //   if (status === "cancelled") {
    //     $("#" + idItemModal + " .order_id_modal span").addClass("bgRed");
    //   } if (status === "on-hold") {
    //     $("#" + idItemModal + " .order_id_modal span").addClass("bgYellow");
    //   } if (status === "processing") {
    //     $("#" + idItemModal + " .order_id_modal span").addClass("bgGreen");
    //   }

    // });

    // $('.nav_areas .item_areas .order_id_modal span ').each(function(index, element) {
    //   // console.log('status: ' + element.innerHTML);
    //   var status =  element.innerHTML;
    //   console.log('status: ' + status);

    //   // alert(status);
     
    //   if(status === "cancelled") {
    //     $(".order_id_modal span").append("Cancelado");
    //     $(".order_id_modal span").addClass("bgRed");
        
    //   } if(status === "on-hold") {
    //     $(".order_id_modal span").innerHTML("Aguardando");
    //     $(".order_id_modal span").addClass("bgYellow");
     
    //  }
      

    //  });

   
  });


})(jQuery);
