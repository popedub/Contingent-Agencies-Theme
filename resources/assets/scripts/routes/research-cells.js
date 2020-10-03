export default {
  init() {
    // JavaScript to be fired on the notations & reflections page
    $(document).ready(function () {
      var $grid = $('.grid').masonry({
        itemSelector: '.item-artifact',
        columnWidth: '.grid-sizer',
        percentPosition: true,
      })

      $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
      })

      var btn = document.getElementById('artifacts');
      var btn2 = document.getElementById('cell-name');
      btn.addEventListener('click', function () {
        $(this).preventDefault;
        $('#artifacts').addClass('active');
        $('#cell-name').removeClass('active');
        $('.grid-list').removeClass('d-block').addClass('d-none');
        $('.grid').addClass('d-block');

      })

      btn2.addEventListener('click', function () {
        $(this).preventDefault;
        $('#artifacts').removeClass('active');
        $('#cell-name').addClass('active');
        $('.grid').removeClass('d-block').addClass('d-none');
        $('.grid-list').removeClass('d-none').addClass('d-block');

      })

      $('.intro p').append('<span class="read-more">→ </span><a href="" class="link-read">Read more</a>');
    })
  },
};
