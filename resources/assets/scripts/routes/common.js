const feather = require('feather-icons')
export default {
  init() {
    // JavaScript to be fired on all pages
    var btn = document.getElementById('menu');
    var close = document.getElementById('closeMenu');
    $(document).ready(function () {
      btn.addEventListener('click', function () {
        $('.overlay-slidedown').toggleClass('open');
        $('body').css('overflow', 'hidden');
      })

      close.addEventListener('click', function () {
        $('.overlay-slidedown').toggleClass('open');
        $('body').css('overflow', 'auto');
      })
      feather.replace()
    });
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.lg-fire').lightGallery({
      zoom: false,
      share: false,
      controls: false,
      download: false,
      counter: false,
      loop: false,
      autoplayControls: false,
      fullScreen: false,
      rotate: false,
      hideBarsDelay: 60000000000000000000,
    });


  },
};
