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

  @for ($i = 0; $i < 10; $i++) <div class="col-12 col-lg-6 col-xl-4 item-artifact mb-3">
    <div class="photo">
      <a href="{{ get_permalink(90) }}">
        @if ($i % 2 == 0)
        <img src="https://picsum.photos/1200/800?ramdom={{ $i }}" alt="" class="img-fluid">
        @else
        <img src="https://picsum.photos/950/1300?ramdom={{ $i }}" alt="" class="img-fluid">
        @endif

        <div class="info-post text-center">
          <p>N-GANSTERER-20200112-1200-Viena</p>
        </div>
      </a>
    </div>
</div>
@endfor
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
