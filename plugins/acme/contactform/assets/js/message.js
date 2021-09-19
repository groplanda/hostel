$('.ajax-form').on('ajaxSuccess', function(event) {
  event.currentTarget.reset();
});
$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
  $(fieldElement).closest('.ajax-group').addClass('has-error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
  $(this).closest('form').find('.ajax-group.has-error').removeClass('has-error');
});