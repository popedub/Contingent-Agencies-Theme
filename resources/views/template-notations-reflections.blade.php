{{--
  Template Name: Notations & Reflections
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
<div class="intro">
  @include('partials.content-page')
{{-- @dump(App::api()) --}}
  @foreach (App::api() as $post)


  {{-- {{ $post->data[0]->value }}<br>
  {{ count($post->media) }}<br><br> --}}

  @if (strcmp($post->data[0]->value[0], 'R') == 0 || strcmp($post->data[0]->value[0], 'N') == 0 )
  @php
  //type
  json_decode($post->data[2]->value);
  $types[] = $post->data[2]->value;
  //agencies
  json_decode($post->data[4]->value[0]->value);
  $agencies[] = $post->data[4]->value[0]->value;
  //practice de notataion
  json_decode($post->data[4]->value[1]->value);
  $practicas[] = $post->data[4]->value[1]->value;
  //name del researcher
  json_decode($post->data[5]->value[1]->label);
  $researchers[] = $post->data[5]->value[1]->label;
  //name fo location
  json_decode($post->data[6]->value[0][2]->value[0]);
  $locations[] = $post->data[6]->value[0][2]->value[0];
  //year
  json_decode($post->data[6]->value[0][0]->value->from);
  $dates[] = substr($post->data[6]->value[0][0]->value->from, 0, 4);
  @endphp
  @endif


  @endforeach
  @php
  //quitamos los duplicados
  $types = array_unique($types);
  $agencies = array_unique($agencies);
  $practicas = array_unique($practicas);
  $researchers = array_unique($researchers);
  $locations = array_unique($locations);
  $dates = array_unique($dates);
  @endphp


</div>

@endwhile


<div class="filtro">
  <p>→ {{ __('view as:', 'contingentagenciestheme') }}</p>
  <div class="view-as">
    <p><a href="#view" id="artifacts" class="ml-2 mr-2 active"><i data-feather="grid"></i>
        {{ __('Artifacs','contingentagenciestheme')  }}</a>
        <a href="#view" id="identifiers" class="ml-2"><i data-feather="list"></i>
          {{ __('Identifiers','contingentagenciestheme')  }}</a></p>
  </div>
  <div class="filtros">

    <ul class="list-group list-group-horizontal" id="grupo">
      <p class="list-group-item list-group-item-action" href="#">{{ __('→ filter by:','contingentagenciestheme' ) }}</p>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseType"
        role="button" aria-expanded="false"
        aria-controls="collapseType">{{ __('type ↓','contingentagenciestheme' ) }}</a>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse"
        href="#collapseAgency" role="button" aria-expanded="false"
        aria-controls="collapseAgency">{{ __('agency ↓','contingentagenciestheme' ) }}</a>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse"
        href="#collapsePractice" role="button" aria-expanded="false"
        aria-controls="collapsePractice">{{ __('practice of research ↓','contingentagenciestheme' ) }}</a>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse"
        href="#collapseResearcher" role="button" aria-expanded="false"
        aria-controls="collapseResearcher">{{ __('researcher ↓','contingentagenciestheme' ) }}</a>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse"
        href="#collapsePlace" role="button" aria-expanded="false"
        aria-controls="collapsePlace">{{ __('place ↓','contingentagenciestheme' ) }}</a>
      <a class="list-group-item list-group-item-action" aria-disabled="true" data-toggle="collapse" href="#collapseDate"
        role="button" aria-expanded="false"
        aria-controls="collapseDate">{{ __('date ↓','contingentagenciestheme' ) }}</a>
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
          @foreach ($agencies as $agency)
          @php
          $filtro = str_replace(' ','-', $agency);
          @endphp
          <button class="agency {{ strtolower($filtro) }}"
            data-filter=".{{ strtolower($filtro) }}">{{ $agency }}</button>
          @endforeach

        </div>
      </div>

      <div class="collapse" id="collapsePractice">
        <div class="dot p-3 filtro-inside" data-filter-group="practice">
          @foreach ($practicas as $practica)
          @php
          $filtro = str_replace(' ','-', $practica);
          @endphp
          <button class="practice {{ strtolower($filtro) }}"
            data-filter=".{{ strtolower($filtro) }}">{{ $practica }}</button>
          @endforeach
        </div>
      </div>

      <div class="collapse" id="collapseResearcher">
        <div class="dot p-3 filtro-inside" data-filter-group="researcher">
          @foreach ($researchers as $researcher)
          @php
          $filtro = str_replace(' ','-', $researcher);
          @endphp
          <button class="researcher {{ strtolower($filtro) }}"
            data-filter=".{{ strtolower($filtro) }}">{{ $researcher }}</button>
          @endforeach
        </div>
      </div>

      <div class="collapse" id="collapsePlace">
        <div class="dot p-3 filtro-inside" data-filter-group="place">

          @foreach ($locations as $location)
          @php
          $filtro = str_replace(' ','-', $researcher);
          @endphp
          <button class="place {{ strtolower($filtro) }}"
            data-filter=".{{ strtolower($filtro) }}">{{ $location }}</button>
          @endforeach

        </div>
      </div>

      <div class="collapse" id="collapseDate">
        <div class="dot p-3 filtro-inside" data-filter-group="date">
          @foreach ($dates as $date)
          @php
          $filtro = str_replace(' ','-', $date);
          @endphp
          <button class="date {{ strtolower($filtro) }}" data-filter=".{{ strtolower($filtro) }}">{{ $date }}</button>
          @endforeach
        </div>
      </div>
    </div>
    <div class="filtros-activos"></div>

  </div>
</div>
<div class="snapshot link-white mt-5 f-lg d-block mb-2">{{ __('↓ artifacts', 'contingentagenciestheme') }}</div>
<?php $upload_dir = wp_upload_dir(); ?>
<div class="grid row">

  <div class="grid-sizer col-12 col-lg-4"></div>
  <iframe src="https://github.com/anars/blank-audio/blob/master/750-milliseconds-of-silence.mp3" allow="autoplay"
    id="audio" style="display: none"></iframe>

  @foreach (App::api() as $post)

  @if (strcmp($post->data[0]->value[0], 'R') == 0 || strcmp($post->data[0]->value[0], 'N') == 0 )
  {{-- @dump($post->media) --}}
  @php
  $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
  $agency = str_replace(' ','-', $post->data[4]->value[0]->value);
  $practice = str_replace(' ','-', $post->data[4]->value[1]->value);
  $researcher = str_replace(' ','-', $post->data[5]->value[1]->label);
  $place = str_replace(array(',', ' '),array('','-'), $post->data[6]->value[0][2]->value[0]);
  $year = substr($post->data[6]->value[0][0]->value->from, 0, 4);
  @endphp
  <div class="col-12 col-lg-4 item-artifact mb-4
                                {{ strtolower($post->data[2]->value) }}
                                {{ strtolower($agency) }}
                                {{ strtolower($practice) }}
                                {{ strtolower($researcher) }}
                                {{ strtolower($place) }}
                                {{ $year }}
                                ">
    {{-- <a href="{{ $post->data[7]->value }}"> --}}
     <a href="http://localhost:8888/contingentagencies/{{ $post->data[0]->value }}">
    {{-- es texto la practica de research --}}
      @php
        $text = strtolower($post->data[4]->value[1]->value);
      @endphp
    @if (strcmp($text, 'text') == 0)
        <div class="texto-container gris">
            {{ App::getExcerpt($post->data[4]->value[5]->value) }}

        </div>
    @endif
    {{-- solo un medio y es foto --}}
    @if (count($post->media) == 1 && strcmp($post->media[0]->type, 'i') == 0 && strcmp($text, 'text') !== 0)
    <div class="photo">
      <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">

      <div class="info-post text-center">
        <p>{{ $post->data[0]->value }}</p>
      </div>

    </div>

    @endif
    {{-- solo tiene 2 fotos, la panoramica y la destacada --}}
    @if (count($post->media) == 2 && strcmp($post->media[1]->type, 'i') == 0  && strcmp($text, 'text') !== 0)
    <div class="photo">
      <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">

      <div class="info-post text-center">
        <p>{{ $post->data[0]->value }}</p>
      </div>

    </div>

    @endif
    {{-- es audio como 3er adjunto--}}
    @if (count($post->media) > 2)
    @if (strcmp($post->media[2]->type, 'x') == 0 || strcmp($post->media[2]->type, 'a') == 0)
    <div class="audio-container">
    <div class="play" data-toggle="tooltip" data-placement="top" title="Preview">
      @svg('ico-play', 'ico-play')
    </div>

    <audio class="audio-test">
      <source src="https://basedev.uni-ak.ac.at{{ $post->media[2]->original }}" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </div>
    @endif
       {{-- es un video como 3er elemento --}}
    @if (count($post->media) > 2 && strcmp($post->media[2]->type, 'v') == 0)
      <div class="photo">
        <div class="video-container">
          <img class="img-fluid img-jpg" src="https://basedev.uni-ak.ac.at{{ $post->media[2]->cover->jpg }}">
          <img class="img-fluid img-gif" src="https://basedev.uni-ak.ac.at{{ $post->media[2]->cover->gif }}">
          @svg('play-video','ico-video')
        </div>


      </div>
    @endif


    @endif
    {{-- es foto como 3er adjunto--}}
    @if (count($post->media) > 2 && strcmp($post->media[2]->type, 'i') == 0)
    <div class="photo">
      <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">

      <div class="info-post text-center">
        <p>{{ $post->data[0]->value }}</p>
      </div>

    </div>

    @endif
    </a>
  </div>
  @endif


  @endforeach



</div>

{{-- vista de lista --}}
<div class="identifiers link-white mt-5 f-lg d-none">{{ __('↓ identifiers', 'contingentagenciestheme') }}</div>
<div class="row grid-list d-none">
  <div class="col-12 item-list">
    <ul class="list">
      @foreach (App::api() as $post)
      @if (strcmp($post->data[0]->value[0], 'R') == 0 || strcmp($post->data[0]->value[0], 'N') == 0 )
        <li class="d-flex justify-content-between align-items-center">
          <span class="id pr-3">{{ $post->data[0]->value }}</span>
          <span class="dot flex-grow-1 align-self-end"></span>
          <span class="end pl-3">{{ $post->data[4]->value[0]->value }}</span>
        </li>
      @endif
      @endforeach

  </div>
  </ul>
</div>

<button class="btn btn-outline-dark mt-5 ml-auto mr-auto d-block">
  {{ __('Load more', 'contingentagenciestheme') }}
</button>
@endsection
