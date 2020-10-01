export default {
  init() {
    // JavaScript to be fired on the home page
    $(document).ready(function(){
      var $grid = $('.grid').masonry({
        itemSelector: '.post-home',
        columnWidth: '.grid-sizer',
        percentPosition: true,
      })
      $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
      })
    })

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS


    if (sessionStorage.getItem('visit') !== 'true') {
      $('#modalEvent').modal('show')
      sessionStorage.setItem('visit', 'true')
    }
    console.log(sessionStorage.visit)


  },
};
