@if (count(Single::api_single()->media) >= 2)
  @php
  // si hay dos fotos, la segunda es la panoramica
  $img_1024w = json_decode(json_encode(Single::api_single()->media[1]->previews[2]), true);
  @endphp
@endif
@if (count(Single::api_single()->media) == 1)
  @php
    // si hay una  fotos, pues eso
    $img_1024w = json_decode(json_encode(Single::api_single()->media[0]->previews[2]), true);
    @endphp
@endif


<section class="gris intro-notation extra-pad">
  <div class="row mt-3">
    <div class="col-12 col-lg-6">
      {{-- @dump(Single::api_single()) --}}
      <p class="link-white mb-0">↓ Identifier: {{ Single::api_single()->data[0]->value }}</p>
      <ul class="list">

        <li>Agency: <a href="{{ get_permalink(11) }}" class="filter-cookie agency">{{ Single::api_single()->data[4]->value[0]->value }}</a></li>
        <li>Practice of notation: <a href="{{ get_permalink(11) }}" class="filter-cookie practice">{{ Single::api_single()->data[4]->value[1]->value }}</a></li>
        <li>Notator: <a href="{{ get_permalink(11) }}" class="filter-cookie">{{ Single::api_single()->data[5]->value[1]->label }}</a></li>
        <li>Time: {{ Single::api_single()->data[6]->value[0][0]->value->from }}
          {{ Single::api_single()->data[6]->value[0][1]->value->from }}h</li>
        <li>Place: <a href="#">{{ Single::api_single()->data[6]->value[0][2]->value[0] }}</a></li>
        <li>Coordinates: <a href="#">{{ Single::api_single()->data[6]->value[0][3]->value }}</a></li>
        <li>Þhing: <a href="#">20200122-1241-Barcelona</a></li>
      </ul>
    </div>
    <div class="col-12 col-lg-6 lg-fire">
      {{-- hay 2 imagenes, una destacada en la home en la posicion 1 y la panoramica en la posicion 0 --}}
      <a data-src="https://basedev.uni-ak.ac.at{{ Single::api_single()->media[0]->original }}"
        data-sub-html="{{ Single::api_single()->data[0]->value }}">
        <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">
      </a>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ notes</p>
      <div class="acordeon">
        <p>{{ Single::api_single()->data[4]->value[4]->value }}</p>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ Short description of the atmosphere</p>
      <p>{{ Single::api_single()->data[4]->value[3]->value }} </p>

    </div>
    <div class="col-12 col-lg-6">
      <p class="link-white mb-0">↓ strategies of display</p>
      <p>{{ Single::api_single()->data[4]->value[2]->value }}</p>
    </div>
    <div class="col-12 col-lg-6">
      <div class="d-flex">
        <div>
          <p class="link-white mb-0">↓ related reflections</p>
          <ul class="list">
            <li><a href="#">R-Gomez-20191102-0600-Bogota</a></li>
            <li><a href="#">R-Gansterer-20200113-1200-Vienna</a></li>
            <li><a href="#">R-Arteaga-20200113-1600-Vienna</a></li>
          </ul>
        </div>
        <div class="pl-5">
          <p class="link-white mb-0">↓ research cells</p>
          <ul class="list">
            <li><a href="#">Environment and atmosphere</a></li>
            <li><a href="#">Acustics</a></li>
            <li><a href="#">Acustics</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="row dark mt-4">
    <div class="col-12 text-center mb-5">
      <h3>artifacts of notation</h3>
    </div>
    <div class="col-12 col-lg-6 offset-lg-6">
      {{-- si es x es un audio --}}

      @if (count(Single::api_single()->media) > 2 && Single::api_single()->media[2]->type == 'a')
      <div class="audio-single">
        <div class="play" data-toggle="tooltip" data-placement="top" title="Preview">
          @svg('ico-play', 'ico-play')
        </div>

        <audio controls class="audio-test">
          <source src="https://basedev.uni-ak.ac.at{{ Single::api_single()->media[2]->original }}" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
      </div>
      @endif
      {{-- miramos si es un texto --}}

      @if (count(Single::api_single()->data[4]->value) == 6)
        {!! Single::api_single()->data[4]->value[5]->value !!}
      @endif
      {{-- <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Y8x3LWVC1L4" frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div> --}}
    </div>
  </div>
</section>
