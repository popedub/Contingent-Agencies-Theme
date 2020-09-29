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
      // store filter for each group
      var filters = {};
      // filter items on button click
      $('.filtro-inside').on('click', 'button', function () {
        var $this = $(this);
        // get group key
        $this.siblings().removeClass('active')
        $this.addClass('active')
        var $buttonGroup = $this.parents('.filtro-inside');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[filterGroup] = $this.attr('data-filter');
        // combine filters
        var filterValue = concatValues(filters);
        $grid.isotope({ filter: filterValue });
      });

      // flatten object by concatting values
      function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
          value += obj[prop];
        }
        return value;
      }
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

      //audio pre-escucha
      let audio = document.getElementsByClassName('ico-play');
      var foo = document.getElementsByClassName('audio-test');

      for (let i = 0; i < audio.length; i++) {
        audio[i].addEventListener('mouseover', function () {
          var play = foo[i].play();
          if (play) {
            //Older browsers may not return a promise, according to the MDN website
            play.catch(function (error) { console.error(error); });
          }
          // $(this).children('.ico-play').addClass('d-none').removeClass('d-block')

          // $(this).children('.ico-pause').addClass('d-block')


        })
        audio[i].addEventListener('mouseleave', function () {
          foo[i].pause()
          foo[i].currentTime = 0;
          // $(this).children('.ico-play').removeClass('d-none').addClass('d-block')

          // $(this).children('.ico-pause').addClass('d-none').removeClass('d-block')


        })
      }

        $('[data-toggle="tooltip"]').tooltip()

    })
  },
};
