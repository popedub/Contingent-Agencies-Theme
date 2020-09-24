export default {
  init() {
    // JavaScript to be fired on the notations & reflections page
    $(document).ready(function () {
      var $grid = $('.grid').isotope({
        itemSelector: '.item-artifact',
        percentPosition: true,
        masonry: {
          // use element for option
          columnWidth: '.grid-sizer',
        },
      })

      $grid.imagesLoaded().progress(function () {
        $grid.isotope('layout');
      })
      // filter items on button click
      $('.filtro-inside').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
      });

      var btn = document.getElementById('artifacts');
      var btn2 = document.getElementById('identifiers');
      btn.addEventListener('click', function () {
        $(this).preventDefault;
        $('.grid-list').removeClass('d-block').addClass('d-none');
        $('.grid').addClass('d-block');

      })

      btn2.addEventListener('click', function () {
        $(this).preventDefault;
        $('.grid').removeClass('d-block').addClass('d-none');
        $('.grid-list').removeClass('d-none').addClass('d-block');

      })

      $('.intro p').append('<span class="read-more">→ </span><a href="">Read more</a>');
    })
  },
};
