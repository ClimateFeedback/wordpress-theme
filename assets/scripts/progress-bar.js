/**
 * Created by Vanessa on 11/5/15.
 */

(function ($) {
  $('.fa-facebook').click(function() {
    $('.progress-bar').addClass('one-third')
  });

  $('.fa-twitter').click(function() {
    $('.progress-bar').addClass('two-third')
  });

  $('.fa-globe').click(function() {
    $('.progress-bar').addClass('three-third')
  });
})(jQuery);
