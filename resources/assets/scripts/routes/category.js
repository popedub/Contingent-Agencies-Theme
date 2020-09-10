export default {
  init() {
    $(document).ready(function () {
      var $grid = $('.grid').masonry({
        itemSelector: 'article',
        columnWidth: '.grid-sizer',
        percentPosition: true,
      })
      $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
      })
    })
  },
};
