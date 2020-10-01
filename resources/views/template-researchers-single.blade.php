{{--
  Template Name: Researchers Single
--}}

@extends('layouts.app')

@section('content')

@while(have_posts()) @php the_post() @endphp

<section class="gris">
  <div class="row conceptual">
    <div class="col-12 col-lg-6">
      <img src="https://picsum.photos/seed/picsum/275/320" alt="" class="img-fluid">
    </div>
    <div class="col-12 col-lg-6">
      @include('partials.content-page')
      <div class="links mt-5">
        ↓ <br>
        <a href="#">www.gansterer.org</a><br>
        <a href="#">www.choreo-graphic-figures.net</a>
      </div>

    </div>

  </div>
</section>

@endwhile
<section class="dark">
  <div class="row f-lg">
    <div class="col-12">
      <h2 class="text-center mt-3">notations & reflections</h2>
      <div class="d-flex justify-content-between align-items-center mt-5">
        <div class="link-gris">{!! __('↓ indentifier','contingentagenciestheme') !!}</div>
        <div class="link-gris">{!! __('agencies ↓','contingentagenciestheme') !!}</div>
      </div>

      <ul class="list">
        @for ($i = 0; $i < 15; $i++) <li class="d-flex justify-content-between align-items-center">
          @if ($i % 2 == 0)
          <span class="id pr-3">N-GANSTERER-20200112-1200-Viena</span>
          <span class="dot-white flex-grow-1 align-self-end"></span>
          <span class="end pl-3">Light</span>
          @else
          <span class="id pr-3">R-GANSTERER-20200112-1200-Barcelona</span>
          <span class="dot-white flex-grow-1 align-self-end"></span>
          <span class="end pl-3">Reverberation</span>
          @endif
          </li>
          @endfor
      </ul>

      <button class="btn btn-outline-light mt-5 ml-auto mr-auto d-block">
        {{ __('View all researchers', 'contingentagenciestheme') }}
      </button>
    </div>
  </div>
</section>


@endsection
