{{--
  Template Name: Phings
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
<div class="intro">
  @include('partials.content-page')

</div>

@endwhile

{{-- aquí hay q llamar al contenido vía API --}}

<div class="filtro dot">
  <p>→ {{ __('view as:', 'contingentagenciestheme') }}</p>
  <div class="view-as">
    <p><a href="#view" id="snapshots" class="ml-2 mr-2 active"><i data-feather="grid"></i>
        {{ __('Snapshots','contingentagenciestheme')  }}</a> <a href="#view" id="identifiers" class="ml-2"><i
          data-feather="list"></i> {{ __('Identifiers','contingentagenciestheme')  }}</a></p>
  </div>
</div>
<div class="snapshot link-white mt-5 f-lg d-block">{{ __('↓ Snapshots', 'contingentagenciestheme') }}</div>
<div class="grid row">

@foreach (App::api() as $post)
@php

@endphp

  @if (strcmp($post->data[0]->value[0], 'R') !== 0 && strcmp($post->data[0]->value[0], 'N') )
    @if(strcmp($post->data[3]->label, 'keywords') == 0)
      @if (strcmp($post->data[3]->value[0], 'thing') == 0)
        @if (count($post->media) == 1)
          @php
            $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
          @endphp
        @elseif (count($post->media) >= 2)
          @php
            $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
          @endphp
        @endif

          <div class="col-12 col-lg-6 col-xl-6 item-artifact mb-3">
            <a href="{{ $post->data[7]->value }}" class="photo">
              <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">
              <div class="info-post text-center">
                <p>{{ $post->data[0]->value }}</p>


              </div>
            </a>
          </div>
      @endif
    @endif
  @endif
@endforeach
</div>

{{-- vista de lista --}}
<div class="row grid-list mt-5 d-none f-lg">
  <div class="col-12 item-list">
    <div class="d-flex justify-content-between align-items-center">
      <div class="link-white">{{ __('↓ identifiers','contingentagenciestheme' ) }}</div>
      <div class="link-white">{{ __('notators ↓','contingentagenciestheme' ) }}</div>
    </div>
    <ul class="list">
      @for ($i = 0; $i < 20; $i++) <li class="d-flex justify-content-between align-items-center">
        <span class="id pr-3">N-GANSTERER-20200112-1200-Viena</span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">Light</span>
        </li>

        @endfor
  </div>
  </ul>
</div>

@endsection
