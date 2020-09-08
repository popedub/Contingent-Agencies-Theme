export default {
  init() {
    // JavaScript to be fired on the notations & reflections page
    $(document).ready(function () {


      var btn = document.getElementById('snapshots');
      var btn2 = document.getElementById('identifiers');
      btn.addEventListener('click', function () {
        $(this).preventDefault;
        $('.grid-list').removeClass('d-block').addClass('d-none');
        $('.grid').addClass('d-flex');

      })

      btn2.addEventListener('click', function () {
        $(this).preventDefault;
        $('.grid').removeClass('d-flex').addClass('d-none');
        $('.grid-list').removeClass('d-none').addClass('d-block');

      })

      $('.intro p').append('<span class="read-more">→ </span><a href="">Read more</a>');
    })
  },
};
