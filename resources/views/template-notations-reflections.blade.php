{{--
  Template Name: Notations & Reflections
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="intro">
      @include('partials.content-page')
      {{-- @include('partials.portfolio-conect') --}}
    </div>

  @endwhile

  {{-- aquí hay q llamar al contenido vía API --}}

  <div class="filtro">
    <p>→ {{ __('view as:', 'contingentagenciestheme') }}</p>
    <div class="view-as">
      <p><i data-feather="grid"></i><a href="#" id="artifacts" class="ml-2 mr-2">{{ __('Artifacs','contingentagenciestheme')  }}</a> <i data-feather="list"></i><a href="#" id="identifiers" class="ml-2">{{ __('Identifiers','contingentagenciestheme')  }}</a></p>
    </div>
    <div class="filtros">

      <ul class="list-group list-group-horizontal" id="grupo">
        <p class="list-group-item list-group-item-action" href="#">{{ __('→ filter by:','contingentagenciestheme' ) }}</p>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseType" role="button" aria-expanded="false" aria-controls="collapseType">{{ __('type ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseAgency" role="button" aria-expanded="false" aria-controls="collapseAgency">{{ __('agency ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapsePractice" role="button" aria-expanded="false" aria-controls="collapsePractice">{{ __('practice of research ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseResearcher" role="button" aria-expanded="false" aria-controls="collapseResearcher">{{ __('researcher ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapsePlace" role="button" aria-expanded="false" aria-controls="collapsePlace">{{ __('place ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseDate" role="button" aria-expanded="false" aria-controls="collapseDate">{{ __('date ↓','contingentagenciestheme' ) }}</a>
      </ul>



      <div class="todo-collapse">
        <div class="collapse" id="collapseType">
          {{-- los botones tienen que tener la misma clase que el data-filter para que funcione el script con
                                  los botones clonados que remueven el filtro --}}
          <div class="dot p-3 filtro-inside" data-filter-group="type">

            <button class="type notation" data-filter=".notation">Notation</button>
            <button class="type reflection" data-filter=".reflection">Reflection</button>
          </div>
        </div>

        <div class="collapse" id="collapseAgency">
          <div class="dot p-3 filtro-inside" data-filter-group="agency">

            <button class="agency light" data-filter=".light">Light</button>
            <button class="agency atmosphere" data-filter=".atmosphere">Atmosphere</button>
            <button class="agency sound" data-filter=".sound">Sound</button>
          </div>
        </div>

        <div class="collapse" id="collapsePractice">
          <div class="dot p-3 filtro-inside" data-filter-group="practice">

            <button class="practice video" data-filter=".video">Video</button>
            <button class="practice photo" data-filter=".photo">Photo</button>
            <button class="practice performative-writing" data-filter=".performative-writing">Performative Writing</button>
            <button class="practice dance" data-filter=".dance">Dance</button>
          </div>
        </div>

        <div class="collapse" id="collapseResearcher">
          <div class="dot p-3 filtro-inside" data-filter-group="researcher">

            <button class="researcher nikolaous-gansterer" data-filter=".nikolaous-gansterer">Nikolaus Gansterer</button>
            <button class="researcher tiago-pina" data-filter=".tiago-pina">Tiago Pina</button>
            <button class="researcher pablo-volt" data-filter=".pablo-volt">Pablo Volt</button>
            <button class="researcher ricardo-duke" data-filter=".ricardo-duke">Ricardo Duke</button>
          </div>
        </div>

        <div class="collapse" id="collapsePlace">
          <div class="dot p-3 filtro-inside" data-filter-group="place">

            <button class="place albania" data-filter=".albania">Albania</button>
            <button class="place egipto" data-filter=".egipto">Egipto</button>
            <button class="place estiopia" data-filter=".etiopia">Etiopía</button>
            <button class="place madagascar" data-filter=".madagascar">Madagascar</button>
            <button class="place viena" data-filter=".viena">Viena</button>
          </div>
        </div>

        <div class="collapse" id="collapseDate">
          <div class="dot p-3 filtro-inside" data-filter-group="date">

            <button class="date 2020" data-filter=".2020">2020</button>
            <button class="date 2019" data-filter=".2019">2019</button>
            <button class="date 2018" data-filter=".2018">2018</button>
            <button class="date 2017" data-filter=".2017">2017</button>
          </div>
        </div>
      </div>
      <div class="filtros-activos"></div>
    </div>
  </div>
  <div class="grid row mt-5">
    <div class="grid-sizer col-12 col-lg-4"></div>
    <iframe src="https://github.com/anars/blank-audio/blob/master/750-milliseconds-of-silence.mp3" allow="autoplay" id="audio" style="display: none"></iframe>

    <div class="item-artifact col-12 col-lg-4 mb-4 sound 2019">
      <div class="audio">
        <div class="play" data-toggle="tooltip" data-placement="top" title="Preview">
          @svg('ico-play', 'ico-play')
        </div>

      <audio class="audio-test">
        <source src="http://localhost:8888/contingentagencies/wp-content/uploads/2020/09/Cococo-mix-leo.mp3"
          type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>
      </div>
    </div>

    <div class="item-artifact col-12 col-lg-4 mb-4 sound 2020">
      <div class="audio">
        <div class="play" data-toggle="tooltip" data-placement="top" title="Preview">

          @svg('ico-play', 'ico-play')
        </div>


          <audio class="audio-test">
            <source src="http://localhost:8888/contingentagencies/wp-content/uploads/2020/09/Volt-8-elektron.mp3"
              type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
      </div>
    </div>

    @for ($i = 0; $i < 17; $i++)
      <div class="col-12 col-lg-4 item-artifact mb-4 dance 2018 albania notation @if ($i % 2 == 0) reflection light ricardo-duke 2020 barcelona video @else atmosphere 2019 nikolaous-gansterer viena photo @endif">
        <div class="photo">
          @if ($i % 2 == 0)
          <img src="https://picsum.photos/1200/800?ramdom={{ $i }}" alt="" class="img-fluid">
          @else
          <img src="https://picsum.photos/950/1300?ramdom={{ $i }}" alt="" class="img-fluid">
          @endif
          <div class="info-post text-center">
            <p>N-GANSTERER-20200112-1200-Viena</p>
          </div>
        </div>
      </div>
    @endfor
  </div>

  {{-- vista de lista --}}
  <div class="row grid-list mt-5 d-none">
    <div class="col-12 item-list">
    <ul class="list">
      @for ($i = 0; $i < 17; $i++)

        <li class="d-flex justify-content-between align-items-center">
          <span class="id pr-3">N-GANSTERER-20200112-1200-Viena</span>
          <span class="dot flex-grow-1 align-self-end"></span>
          <span class="end pl-3">Light</span>
        </li>

      @endfor
    </div>
    </ul>
  </div>

<button class="btn btn-outline-dark mt-5 ml-auto mr-auto d-block">
  {{ __('Load more', 'contingentagenciestheme') }}
</button>
@endsection
