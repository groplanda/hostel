import $ from 'jquery';
window.$ = window.jQuery = $;
require('owl.carousel2');
require('lightbox2/dist/js/lightbox.min.js');
require('slick-carousel');
$(document).ready(function() {

  $('[data-js="preloader"]').fadeOut('slow');

  const homeSlider = $('[data-js="home-slider"]').slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: null,
    nextArrow: null,
  });

  $('[data-js="home-slider-prev"]').click(function() {
    homeSlider.slick('slickPrev');
  })

  $('[data-js="home-slider-next"]').click(function() {
    homeSlider.slick('slickNext');
  })

$('[data-js="hostel-list"]').slick({
  dots: false,
  infinite: false,
  slidesToShow: 2,
  slidesToScroll: 1,
  prevArrow: null,
  nextArrow: null,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

  RoomGallery();

  function RoomGallery() {
    $('[data-js="hostel-slider"]').each(function(index) {

      const hostelSlider = $(this).slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: null,
        nextArrow: null,
      });

      $(`[data-js="hostel-slider-prev-${index + 1}"]`).click(function(e) {
        hostelSlider.slick('slickPrev');
      })

      $(`[data-js="hostel-slider-next-${index + 1}"]`).click(function(e) {
        hostelSlider.slick('slickNext');
      })
    });
  }

  let heightContentArray = [];

  $('[data-js-action="content-room"]').each(function(index, item) {
    heightContentArray.push($(item).height())
  })

  function getMaxOfArray(numArray) {
    return Math.max.apply(null, numArray);
  }
  const maxContentHeight = getMaxOfArray(heightContentArray);
  $('[data-js-action="content-room"]').css('min-height', maxContentHeight + 'px');

  const gallerySlider = $('[data-js="gallery-slider"]').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: null,
    nextArrow: null,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 350,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('[data-js="gallery-slider-prev"]').click(function() {
    gallerySlider.slick('slickPrev');
  })

  $('[data-js="gallery-slider-next"]').click(function() {
    gallerySlider.slick('slickNext');
  })

  // tabs
  const parentTabs = $('[data-js-action="hostel"]');

  $('[data-js-action="tabs"]').on('click', function() {
    const index = $(this).attr('data-tab-id');
    const currentTab = parentTabs.find(`[data-id="tab-${index}"]`);

    if (!currentTab) return;

    $('[data-js-action="tabs"]').removeClass('hostel__list-item_active');
    $('.hostel__tab').removeClass('hostel__tab_active');

    $(this).addClass('hostel__list-item_active');
    currentTab.addClass('hostel__tab_active');

    $([document.documentElement, document.body]).animate({
      scrollTop: parentTabs.offset().top
    }, 1000);
  })

  $('[data-js-action="open-modal"]').on("click", function() {
    const popup = $('[data-modal="main-modal"]');
    popup.addClass('popup_active');
    popup.fadeIn();
    setOffset(document.body, getScrollBarWith());
    $(document.body).addClass('modal-open')
  })

  $('[data-js-action="close-modal"]').on("click", function() {
    const popup = $('[data-modal="main-modal"]');
    setOffset(document.body, 0);
    $(document.body).removeClass('modal-open');
    popup.removeClass('popup_active');
    popup.fadeOut();
  })

  $('[data-js-action="confirm-checkbox"]').on("change", function() {
    if($(this).is(':checked')) {
      $('[data-js-action="confirm-btn"]').prop('disabled', false);
    } else {
      $('[data-js-action="confirm-btn"]').prop('disabled', true);
    }
  })

  function getScrollBarWith() {
    const documentWidth = parseInt(document.documentElement.clientWidth);
    const windowsWidth = parseInt(window.innerWidth);
    return windowsWidth - documentWidth;
  }

  function setOffset(elem, width) {
    elem.style.paddingRight = `${width}px`;
    $('.header').css({'padding-right': width + 'px'});
  }

  const anchors = document.querySelectorAll('[data-js="scroll-to"]')

  for (let anchor of anchors) {
    anchor.addEventListener('click', function (e) {
      e.preventDefault()

      if (e.target.closest('[data-js-action="mobile-menu"]')) {
        $('[data-js-action="mobile-menu"]').removeClass("mobile-nav_active");
        $('[data-js-action="toggle-menu"]').removeClass("header__menu_active");
        $(document.body).removeClass('modal-open');
      }

      const blockID = $(anchor).attr("href");
      const offset = $('header').height();
      const destination = $(blockID).offset().top - offset - 20;
      $('html, body').animate({ scrollTop: destination }, 600);
    })
  }

  $('[data-js-action="toggle-menu"]').on("click", function() {
    $(this).toggleClass("header__menu_active");
    $('[data-js-action="mobile-menu"]').toggleClass("mobile-nav_active");
    $(document.body).toggleClass('modal-open')
  })

});