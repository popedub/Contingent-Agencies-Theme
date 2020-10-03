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
      <p><a href="#view" id="snapshots" class="ml-2 mr-2 active"><i data-feather="grid"></i> {{ __('Snapshots','contingentagenciestheme')  }}</a> <a href="#view" id="identifiers" class="ml-2"><i data-feather="list"></i> {{ __('Identifiers','contingentagenciestheme')  }}</a></p>
    </div>
  </div>
  <div class="snapshot link-white mt-5 f-lg d-block">{{ __('↓ Snapshots', 'contingentagenciestheme') }}</div>
  <div class="grid row">

    @for ($i = 0; $i < 10; $i++)
      <div class="col-12 col-lg-6 col-xl-6 item-artifact mb-3">
        <div class="photo">

          <img src="https://picsum.photos/1200/700?ramdom={{ $i }}" alt="" class="img-fluid">

          <div class="info-post text-center">
            <p>N-GANSTERER-20200112-1200-Viena</p>
          </div>
        </div>
      </div>
    @endfor
  </div>

  {{-- vista de lista --}}
  <div class="row grid-list mt-5 d-none f-lg">
    <div class="col-12 item-list">
    <div class="d-flex justify-content-between align-items-center">
      <div class="link-white">{{ __('↓ identifiers','contingentagenciestheme' ) }}</div>
      <div class="link-white">{{ __('notators ↓','contingentagenciestheme' ) }}</div>
    </div>
    <ul class="list">
      @for ($i = 0; $i < 20; $i++)

        <li class="d-flex justify-content-between align-items-center">
          <span class="id pr-3">N-GANSTERER-20200112-1200-Viena</span>
          <span class="dot flex-grow-1 align-self-end"></span>
          <span class="end pl-3">Light</span>
        </li>

      @endfor
    </div>
    </ul>
  </div>

@endsection
