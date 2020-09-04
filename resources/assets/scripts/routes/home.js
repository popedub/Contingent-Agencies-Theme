export default {
  init() {
    // JavaScript to be fired on the home page
    var $grid = $('.grid').masonry({
      itemSelector: '.post-home',
      columnWidth: '.grid-sizer',
      percentPosition: true,
    })
    $grid.imagesLoaded().progress(function(){
      $grid.masonry('layout');
    })
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
