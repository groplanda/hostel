import $ from 'jquery';
window.$ = window.jQuery = $;
require('owl.carousel2');
require('lightbox2/dist/js/lightbox.min.js');
$(document).ready(function() {

  const homeSlider = $('[data-js="home-slider"]').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1
  })

  $('[data-js="home-slider-prev"]').click(function() {
    homeSlider.trigger('prev.owl.carousel');
  })

  $('[data-js="home-slider-next"]').click(function() {
    homeSlider.trigger('next.owl.carousel');
  })

  $('[data-js="hostel-slider"]').each(function(index) {
    const hostelSlider = $(this).owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      items: 1
    })

    $(`[data-js="hostel-slider-prev-${index + 1}"]`).click(function() {
      hostelSlider.trigger('prev.owl.carousel');
    })

    $(`[data-js="hostel-slider-next-${index + 1}"]`).click(function() {
      hostelSlider.trigger('next.owl.carousel');
    })

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
    $(document.body).addClass('modal-open')
  })

  $('[data-js-action="close-modal"]').on("click", function() {
    const popup = $('[data-modal="main-modal"]');
    popup.removeClass('popup_active');
    popup.fadeOut();
    $(document.body).removeClass('modal-open')
  })

  $('[data-js-action="confirm-checkbox"]').on("change", function() {
    if($(this).is(':checked')) {
      $('[data-js-action="confirm-btn"]').prop('disabled', false);
    } else {
      $('[data-js-action="confirm-btn"]').prop('disabled', true);
    }
  })

});