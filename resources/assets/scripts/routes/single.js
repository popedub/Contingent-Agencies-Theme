import  Amplitude from 'amplitudejs/dist/amplitude';
import videojs from 'video.js/dist/video';
export default {
  init() {
    var video = $('.video-js');

    if(video.length > 0){
      videojs(document.querySelector('.video-js'), {
        controls: true,
        autoplay: false,
        preload: 'auto',
      });
    }


    var play = $('.play-audio');
    var divaudio = $('.audio-single');

    if (divaudio.length > 0) {
      // eslint-disable-next-line no-unused-vars
      var audio = $('#audio_src').text();
      var pause = $('.pause-audio');

      Amplitude.init({
        'songs':[
          {
            'url': audio,
        },
        ],
      })
      /*
        Handles a click on the song played progress bar.
      */
      // document.getElementById('song-played-progress').addEventListener('click', function (e) {
      //   var offset = this.getBoundingClientRect();
      //   var x = e.pageX - offset.left;

      //   Amplitude.setSongPlayedPercentage((parseFloat(x) / parseFloat(this.offsetWidth)) * 100);
      // });


      // $('.duration').append(duration)
      play.on('click', function (e) {
        e.preventDefault();



        $(this).toggleClass('d-none');
        $('.pause-audio').toggleClass('d-none');
      })

      pause.on('click', function (e) {
        e.preventDefault();

        $(this).toggleClass('d-none');
        $('.play-audio').toggleClass('d-none');
      })
    }
  },
};
