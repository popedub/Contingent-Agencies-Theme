{{--
  Template Name: Research Cells
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
    <p><a href="#view" id="artifacts" class="ml-2 mr-2 active"><i data-feather="grid"></i>
        {{ __('artifacs','contingentagenciestheme')  }}</a> <a href="#view" id="cell-name" class="ml-2"><i
          data-feather="list"></i> {!! __('cell&#39;s name','contingentagenciestheme') !!}</a></p>
  </div>
</div>
<div class="grid row mt-5">
  <div class="grid-sizer col-12 col-lg-6 col-xl-4"></div>
  @foreach (App::api() as $post)
    @if(strcmp($post->data[3]->label, 'keywords') == 0)
    @if (strcmp($post->data[3]->value[0], 'research cell') == 0)
      @if (count($post->media) == 1)
        @php
        $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
        @endphp
        @elseif (count($post->media) >= 2)
        @php
        $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
        @endphp
      @endif
      <div class="col-12 col-lg-6 col-xl-4 item-artifact mb-3">
        <div class="photo">
          <a href="{{ $post->data[6]->value }}">

            <img src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}" alt="" class="img-fluid">


            <div class="info-post text-center">
              <p>{{ $post->data[0]->value }}</p>
            </div>
          </a>
        </div>
      </div>
    @endif
  @endif
  @endforeach
</div>


<div class="row grid-list mt-5 d-none f-lg">

  <div class="col-4">
    <div class="link-white text-left">{!! __('↓ cell&#39;s name','contingentagenciestheme') !!}</div>
  </div>
  <div class="col-4 text-right">
    <div class="link-white">{{ __('notations ↓','contingentagenciestheme' ) }}</div>
  </div>
  <div class="col-4 text-right">
    <div class="link-white">{{ __('reflections ↓','contingentagenciestheme' ) }}</div>
  </div>

  @for ($i = 0; $i < 20; $i++)
    @if ($i % 2==0)
      <div class="col-8 item-list d-flex justify-content-between">

        <span class="li-list id pr-3"><a href="{{ get_permalink(90) }}">Architecture</a></span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">2</span>

      </div>
      <div class="col-4 d-flex justify-content-between">
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">5</span>
      </div>
    @else
      <div class="col-8 item-list d-flex justify-content-between">

        <span class="li-list id pr-3"><a href="{{ get_permalink(90) }}">Architecture and Atmosphere</a></span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">12</span>

      </div>
      <div class="col-4 d-flex justify-content-between">
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">35</span>
      </div>
    @endif
  @endfor



</div>

@endsection
