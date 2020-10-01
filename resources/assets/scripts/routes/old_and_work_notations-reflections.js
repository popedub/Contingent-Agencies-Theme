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
      $('.filtro-inside').on('click', 'button', function ( event) {
        var $target = $(event.currentTarget);
        $target.toggleClass('active');
        var isChecked = $target.hasClass('active');
        // var filter = $target.attr('data-filter');
        var $this = $(this);
        if(!isChecked) {
          $this.attr('')
        }


        // get group key
        // $('.filtros-activos').append($this.text())
        $this.siblings().removeClass('active')
        // $this.addClass('active')
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

      function getComboFilter(filters) {
        var i = 0;
        var comboFilters = [];
        var message = [];
        for (var prop in filters) {
          message.push(filters[prop].join(' '));
          var filterGroup = filters[prop];
          // skip to next filter group if it doesn't have any values
          if (!filterGroup.length) {
            continue;
          }
          if (i === 0) {
            // copy to new array
            comboFilters = filterGroup.slice(0);
          }
          else {
            var filterSelectors = [];
            // copy to fresh array
            var groupCombo = comboFilters.slice(0); // [ A, B ]
            // merge filter Groups
            for (var k = 0, len3 = filterGroup.length; k < len3; k++) {
              for (var j = 0, len2 = groupCombo.length; j < len2; j++) {
                filterSelectors.push(groupCombo[j] + filterGroup[k]); // [ 1, 2 ]
              }
            }
            // apply filter selectors to combo filters for next group
            comboFilters = filterSelectors;
          }
          i++;
        }
        comboFilters.sort();
        var comboFilter = comboFilters.join(', ');
        return comboFilter;
      }

      //cambio de vista entre artifacts e identificadores
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

      let $linkFiltro = document.getElementsByClassName('list-group-item');
      for (let i = 0; i < $linkFiltro.length; i++) {
        $linkFiltro[i].addEventListener('click', function () {
          var id = $(this).attr('href');
          id = $(id);

          id.on('show.bs.collapse', function () {
            $('.todo-collapse').find('.collapse.show').collapse('hide');
          });
        })
      }


    })
  },
};
