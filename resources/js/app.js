/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('jquery');
require('./js/flickity.min.js');
require('./js/easypiechart.min.js');
require('./js/parallax.js')
require('./js/typed.min.js');
require('./js/datepicker.js');
require('./js/isotope.min.js');
require('./js/ytplayer.min.js');
require('./js/lightbox.min.js');
require('./js/granim.min.js');
require('./js/jquery.steps.min.js');
require('./js/countdown.min.js');
require('./js/twitterfetcher.min.js');
require('./js/spectragram.min.js');
require('./js/smooth-scroll.min.js');
require('./js/scripts.js');


$(document).ready(function () {
    $('.tab__content section.switchable').mouseenter(function () {
        $(this).append('<div class="switchable-toggle label">Switch Sides</div>');
    });
    $('.tab__content section.switchable').mouseleave(function () {
        $(this).find('.switchable-toggle').remove();
    });
    $(document).on('click', '.switchable-toggle', function () {
        $(this).closest('section').toggleClass('switchable--switch');
    });
});