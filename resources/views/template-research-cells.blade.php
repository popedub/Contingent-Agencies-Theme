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
  <p><i data-feather="grid"></i><a href="#" id="artifacts"
      class="ml-2 mr-2">{{ __('artifacs','contingentagenciestheme')  }}</a> <i data-feather="list"></i><a href="#"
      id="cell-name" class="ml-2">{!! __('cell&#39;s name','contingentagenciestheme') !!}</a></p>
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

{{-- vista de lista aqui aplicar TABLE --}}
<div class="row grid-list mt-5 d-none f-lg">
  <div class="col-12 item-list">
    <div class="d-flex justify-content-between align-items-center">
      <div class="link-white">{!! __('↓ cell&#39;s name','contingentagenciestheme') !!}</div>
      <div></div>
      <div class="link-white">{{ __('notations ↓','contingentagenciestheme' ) }}</div>
      <div></div>
      <div class="link-white">{{ __('reflections ↓','contingentagenciestheme' ) }}</div>
    </div>
    <ul class="list">
      @for ($i = 0; $i < 10; $i++)
        <li class="d-flex justify-content-between align-items-center">
        <span class="id pr-3"><a href="{{ get_permalink(90) }}">Architecture and Atmosphere</a></span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">32</span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">15</span>
        </li>

        @endfor
  </div>
  </ul>
</div>

@endsection
