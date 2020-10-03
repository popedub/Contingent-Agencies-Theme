const Isotope = require('isotope-layout')
export default {
  init() {
    // JavaScript to be fired on the notations & reflections page
    $(document).ready(function() {
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

      //para añadir clase a los elemtos cuándo los escondemos
      var itemReveal = Isotope.Item.prototype.reveal;
      Isotope.Item.prototype.reveal = function () {
        itemReveal.apply(this, arguments);
        $(this.element).removeClass('isotope-hidden');
      };

      var itemHide = Isotope.Item.prototype.hide;
      Isotope.Item.prototype.hide = function () {
        itemHide.apply(this, arguments);
        $(this.element).addClass('isotope-hidden');
      };
      // store filter for each group
      var filters = {};
      // filter items on button click
      $('.filtro-inside button').on('click',  function () {
        // exit directly if filter already disabled
        if ($(this).hasClass('disabled')) {
          return false;
        }


        var $this = $(this);

        // get group key
        var $filterDisplay = $('.filtros-activos')

        var $buttonGroup = $this.parents('.filtro-inside');
        var group = $buttonGroup.attr('data-filter-group');

        //store filter alue in object
        var filterGroup = filters[group];
        // set filter for group

        if (!filterGroup) {
          filterGroup = filters[group] = [];
        }
        var isAll = $this.hasClass('all');
        // reset filter group
        if (isAll) {
          Array.prototype.remove = function (from, to) {
            var rest = this.slice((to || from) + 1 || this.length);
            this.length = from < 0 ? this.length + from : from;
            return this.push.apply(this, rest);
          };
          filters[group].remove(0, -1)
        }

        var index = $.inArray($this.attr('data-filter'), filterGroup);
        if (!isAll && index === -1) {
          // push filter to group
          filters[group].push($this.attr('data-filter'));
        }
        else if (!isAll) {
          // remove filter from group
          filters[group].splice(index, 1);
        }
        // class toggling
        if ($this.hasClass('active')) {
          $this.removeClass('active');
        }
        else {
          $this.addClass('active');
        }
			// let's do some filtering :>
        var comboFilter = getComboFilter(filters);
        // combine filters

        $grid.isotope({ filter: comboFilter });
         // gotta check and set those disabled filters!
        var $that = $(this);
        // type
        $('button.type:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('type')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        //agency
        $('button.agency:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('agency')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        // practice of research
        $('button.practice:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('practice')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        // researcher
        $('button.researcher:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('researcher')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        // place
        $('button.place:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('place')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        // price
        $('button.date:not(.clone)').each(function () {
          var $this = $(this);
          var getVal = $this.attr('data-filter');
          var numItems = $('.item-artifact' + getVal + ':not(.isotope-hidden)').length;
          if (!$(this).hasClass('active') && !$that.hasClass('date')) {
            if (numItems === 0) {
              $this.addClass('disabled');
            }
            else {
              $this.removeClass('disabled');
            }
          }
          else if ($this.hasClass('active') && $this.hasClass('disabled')) {
            $this.removeClass('disabled');
          }
          else if (!$(this).hasClass('active')) {
            if (numItems > 0) {
              $this.removeClass('disabled');
            }
          }
        });
        // update filter display
        // eslint-disable-next-line no-unused-vars
        var arrLbl = [];
        arrLbl = comboFilter.split('.');
        // before iterating we empty previous display vals
        $filterDisplay.empty();
        // clone method for filter display
        //display filter by
        var numItemsHidden = $('.item-artifact.isotope-hidden').length;

        if (numItemsHidden !== 0) {
          $filterDisplay.append('<p>→ selected filters: </p>')
        }
        if (numItemsHidden == 0) {
          $filterDisplay.empty();
        }
        var clone = 'clone';
        var cloneId = 0; // because cloning an id attr just wrong :>
        $('button.active').each(function () {
          cloneId++;
          $(this).clone().appendTo($filterDisplay).attr('id', clone+cloneId).addClass('clone');
        });

        $('button.clone').on('click', function () {

          var that = $(this);
          var parent = that.attr('data-filter');

          $('.filtro-inside').find(parent).each(function () {

            $(this).trigger('click');
          });
        });
        // resolves any outstanding issues with disableds
        // TODO: Find a way around using indexOf this way. Lots of unneccesary overhead.
        if (comboFilter.indexOf('type') == -1
          && comboFilter.indexOf('agency') == -1
          && comboFilter.indexOf('practice') == -1
          && comboFilter.indexOf('researcher') == -1
          && comboFilter.indexOf('place') == -1
          && comboFilter.indexOf('date') > 0) {
          $('button.date:not(.clone)').removeClass('disabled');
        }
        if (comboFilter.indexOf('date') == -1
          && comboFilter.indexOf('agency') == -1
          && comboFilter.indexOf('practice') == -1
          && comboFilter.indexOf('researcher') == -1
          && comboFilter.indexOf('place') == -1
          && comboFilter.indexOf('type') > 0) {
          $('button.type:not(.clone)').removeClass('disabled');
        }
        if (comboFilter.indexOf('date') == -1
          && comboFilter.indexOf('type') == -1
          && comboFilter.indexOf('practice') == -1
          && comboFilter.indexOf('researcher') == -1
          && comboFilter.indexOf('place') == -1
          && comboFilter.indexOf('agency') > 0) {
          $('button.agency:not(.clone)').removeClass('disabled');
        }
        if (comboFilter.indexOf('date') == -1
          && comboFilter.indexOf('agency') == -1
          && comboFilter.indexOf('type') == -1
          && comboFilter.indexOf('researcher') == -1
          && comboFilter.indexOf('place') == -1
          && comboFilter.indexOf('practice') > 0) {
          $('button.practice:not(.clone)').removeClass('disabled');
        }
        if (comboFilter.indexOf('date') == -1
          && comboFilter.indexOf('agency') == -1
          && comboFilter.indexOf('practice') == -1
          && comboFilter.indexOf('type') == -1
          && comboFilter.indexOf('place') == -1
          && comboFilter.indexOf('researcher') > 0) {
          $('button.researcher:not(.clone)').removeClass('disabled');
        }
        if (comboFilter.indexOf('researcher') == -1
          && comboFilter.indexOf('agency') == -1
          && comboFilter.indexOf('practice') == -1
          && comboFilter.indexOf('type') == -1
          && comboFilter.indexOf('date') == -1
          && comboFilter.indexOf('place') > 0) {
          $('button.place:not(.clone)').removeClass('disabled');
        }
      });



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
      var btnGroup = $('.list-group-item-action');
      btn.addEventListener('click', function () {
        $(this).preventDefault;
        $(this).addClass('active');
        $('#identifiers').removeClass('active');
        $('.grid-list').removeClass('d-block').addClass('d-none');
        $('.identifiers').removeClass('d-block').addClass('d-none');

        $('.grid').addClass('d-block');
        $('.snapshot').removeClass('d-none').addClass('d-block');


      })

      btn2.addEventListener('click', function () {
        $(this).preventDefault;
        $(this).addClass('active');
        $('#artifacts').removeClass('active');
        $('.grid').removeClass('d-block').addClass('d-none');
        $('.grid-list').removeClass('d-none').addClass('d-block');
        $('.identifiers').removeClass('d-none').addClass('d-block');
        $('.snapshot').removeClass('d-block').addClass('d-none');

      })
      btnGroup.on('click', function(){
        if($(this).hasClass('active')){
          $(this).removeClass('active')
        }else {
          $(this).addClass('active').siblings().removeClass('active');
        }

      })

      $('.intro p').append('<span class="read-more">→ </span><a class="link-read" href="">Read more</a>');

      //audio pre-escucha
      let audio = document.getElementsByClassName('ico-play');
      var foo = document.getElementsByClassName('audio-test');

      for (let i = 0; i < audio.length; i++) {
        audio[i].addEventListener('mouseover', function () {
          var play = foo[i].play();
          $('[data-toggle="tooltip"]').tooltip()
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


      //para que funcione como un acordeon y sólo muestre unos filtros a la vez
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
