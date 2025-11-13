jQuery(document).ready(function($){
  // Scroling header
  var lastScrollTop = 0, delta = 20, dir;
  $(window).on('scroll touchmove',function(event){
    if ($(this).scrollTop() < 100) {
      if(!$('#masthead.site-header').hasClass('show')) {
        $('#masthead.site-header').addClass('show');
      }
    } else {
      if($('#masthead.site-header').hasClass('show')) {
        $('#masthead.site-header').removeClass('show');
      }
    }
    var st = $(this).scrollTop();
    if(Math.abs(lastScrollTop - st) <= delta) return;
    if (st > lastScrollTop && dir != "down"){
      $('#masthead.site-header').addClass('scroll--down').removeClass('scroll--up');
      dir = "down";
      //console.log('scroll down');
    } else if (st < lastScrollTop && dir != "up") {
      $('#masthead.site-header').addClass('scroll--up').removeClass('scroll--down');
      dir = "up";
      //console.log('scroll up');
    }
    lastScrollTop = st;
  });

  // Display cusom popup
  $('a[href="#custom-popup"]').click(function(e) {
      e.preventDefault();
      $('#custom-popup').fadeIn('slow');
  });
  $('#custom-popup').on('click', '.custom-popup-form .close-popup', function(e) {
      e.preventDefault(); 
      $('#custom-popup').fadeOut('slow');
  });
  $('#custom-popup').click(function(e) {
      if (e.target === this) {
          $(this).fadeOut('slow');
      }
  });

  // Show popup once per session after 3 minutes
  if (!sessionStorage.getItem('customPopupShown')) {
    setTimeout(function() {
      $('#custom-popup').fadeIn('slow');
      sessionStorage.setItem('customPopupShown', 'true');
    }, 90000);
  }

  // Set equal heights for column titles
  function setEqualHeights() {
    var maxTitleHeight = 0;
    $('.table .column-title').css('height', 'auto').each(function() {
      var h = $(this).outerHeight();
      if (h > maxTitleHeight) {
        maxTitleHeight = h;
      }
    });
    $('.table .column-title').css('height', maxTitleHeight + 'px');
    var counts = [];
    $('.table .column-content-item').each(function() {
      var count = $(this).data('count');
      if ($.inArray(count, counts) === -1) {
        counts.push(count);
      }
    });
    counts.forEach(function(count) {
      var maxItemHeight = 0;
      var $items = $('.table .column-content-item[data-count="' + count + '"]');      
      $items.css('height', 'auto');
      $items.each(function() {
        var h = $(this).outerHeight();
        if (h > maxItemHeight) {
          maxItemHeight = h;
        }
      });
      $items.css('height', maxItemHeight + 'px');
    });
  }

  // виклик при завантаженні
  setEqualHeights();

  // виклик при зміні розміру вікна
  $(window).on('resize', function() {
    setEqualHeights();
  });

  // FAQ toggle
  $('.faqs-wrap').on('click', '.question', function() {
    var $faqItem = $(this).closest('.faq-item');
    var $answer = $faqItem.find('.answer');
    var $question = $(this);
    if ($answer.is(':visible')) {
      $answer.slideUp();
      $faqItem.removeClass('open');
      $question.removeClass('active');
    } else {
      $('.faqs-wrap .faq-item .answer').slideUp();
      $('.faqs-wrap .faq-item').removeClass('open');
      $('.faqs-wrap .question').removeClass('active');
      $answer.slideDown();
      $faqItem.addClass('open');
      $question.addClass('active');
    }
  });

  // Services wraping
  $('.sub-menu .list-wrap .list').each(function() {
    var $list = $(this);
    var $firstThree = $list.find('li:lt(3)');
    var $rest = $list.find('li:gt(2)');
    if ($firstThree.length > 0) {
      $firstThree.wrapAll('<div class="first-three-items li-wrap"></div>');
    }
    if ($rest.length > 0) {
      $rest.wrapAll('<div class="rest-of-items li-wrap"></div>');
    }
  });

  if (window.innerWidth < 922) {
    // Team swiper
    var swiper = new Swiper('.swiper.team-swiper', {
      loop: true,
      slidesPerView: 1.2,
      spaceBetween: 20,
      speed: 500,
      pagination: {
        el: ".swiper-pagination",
      },
      navigation: {
        prevEl: '.swiper-button-left.custom-arrow',
        nextEl: '.swiper-button-right.custom-arrow',
      },
      breakpoints: {
        480: {
          slidesPerView: 2
        }
      }
    });

    // Recent post swiper
    var swiper = new Swiper('.swiper.recent-posts', {
      loop: true,
      slidesPerView: 1.2,
      spaceBetween: 20,
      speed: 500,
      pagination: {
        el: ".swiper-pagination",
      },
      navigation: {
        prevEl: '.swiper-button-left.custom-arrow',
        nextEl: '.swiper-button-right.custom-arrow',
      },
      breakpoints: {
        480: {
          slidesPerView: 2
        }
      }
    });
  }

  // Testimonials swiper
  var swiper = new Swiper('.swiper.testimonials-swiper', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 40,
    speed: 500,
    autoplay: {
        delay: 5000,
        enabled: true,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      prevEl: '.swiper-button-left.custom-arrow',
      nextEl: '.swiper-button-right.custom-arrow',
    },
    breakpoints: {
      921: {
        slidesPerView: 3
      },
      480: {
        slidesPerView: 2
      }
    }
  });

  // Post gallery swiper
  var swiper = new Swiper('.swiper.post-gallery-swiper', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 500,
    autoplay: {
        delay: 5000,
        enabled: true,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      prevEl: '.swiper-button-prev',
      nextEl: '.swiper-button-next',
    }
  });
})