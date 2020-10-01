export default {
  init() {
    // function search(string) {
    //   window.find(string);
    // }
    // var form = document.getElementById('search').value;
    // var btn = document.getElementById('btn-search');
    // btn.onclick = function() {
    //   search(form);
    // }
    // $.typeahead({
    //   input: '.js-typeahead',
    //   order: 'asc',
    //   source: {
    //     ajax: {
    //       url: 'http://localhost:8888/contingentagencies/wp-json/wp/v2/pages/9',
    //     },

    //   },
    //   callback: {
    //     onClickBefore: function () { },
    //   },
    // });
    function gid(a_id) {
      return document.getElementById(a_id);
    }

    function close_all() {

      for (var i = 0; i < 999; i++) {
        var o = gid('bloke-' + i);
        if (o) {
          o.style.display = 'none';
        }
      }

    }
    function show_all() {

      for (var i = 0; i < 999; i++) {
        var o = gid('bloke-' + i);
        if (o) {
          o.style.display = 'block';
        }
      }

    }

    var busqueda = gid('edit_search');
    busqueda.onkeyup = function() {
      find_my_div();
    }
    // var btn_busqueda = gid('btn-search');
    // btn_busqueda.onclick = function () {
    //   find_my_div();
    // }

    function find_my_div() {
      close_all();

      var o_edit = gid('edit_search');
      var str_needle = o_edit.value;

      $('.conceptual_frame').highlight(str_needle,{
        wordsOnly: true,
      });

      str_needle = str_needle.toUpperCase(str_needle);
      var searchStrings = str_needle.split(/\W/);

      for (var i = 0, len = searchStrings.length; i < len; i++) {
        var currentSearch = searchStrings[i].toUpperCase();
        if (currentSearch !== '') {
         var nameDivs = document.getElementsByClassName('conceptos');
          for (var j = 0, divsLen = nameDivs.length; j < divsLen; j++) {
            if (nameDivs[j].textContent.toUpperCase().indexOf(currentSearch) !== -1) {
              nameDivs[j].style.display = 'block';
              // var resaltado = $('.highlight')
              // $('html, body').animate({ scrollTop: resaltado.offset().top - $('html, body').offset().top + $('html, body').scrollTop(), scrollLeft: 0}, 500)
            }
          }
        }
        else if (currentSearch == '') {
          show_all();
          $('.conceptual_frame').unhighlight();
        }
      }
    }


  },
};
