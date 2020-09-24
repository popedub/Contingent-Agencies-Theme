{{--
  Template Name: Notations & Reflections
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="intro">
      @include('partials.content-page')

    </div>

  @endwhile

  {{-- aquí hay q llamar al contenido vía API --}}

  <div class="filtro">
    <p>→ {{ __('view as:', 'contingentagenciestheme') }}</p>
    <p><i data-feather="grid"></i><a href="#" id="artifacts" class="ml-2 mr-2">{{ __('Artifacs','contingentagenciestheme')  }}</a> <i data-feather="list"></i><a href="#" id="identifiers" class="ml-2">{{ __('Identifiers','contingentagenciestheme')  }}</a></p>

    <div class="filtros">
      <ul class="list-group list-group-horizontal">
        <a class="list-group-item list-group-item-action" href="#">{{ __('→ filter by:','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" href="#" aria-disabled="true">{{ __('type ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action"  aria-disabled="true" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">{{ __('agency ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" href="#" aria-disabled="true">{{ __('practice of research ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" href="#" aria-disabled="true">{{ __('researcher ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" href="#" aria-disabled="true">{{ __('place ↓','contingentagenciestheme' ) }}</a>
        <a class="list-group-item list-group-item-action" href="#"
          aria-disabled="true">{{ __('date ↓','contingentagenciestheme' ) }}</a>
      </ul>
      <div class="collapse" id="collapseExample">
        <div class="dot p-3 filtro-inside">
          <button data-filter=".light">Light</button>
          <button data-filter=".atmosphere">Atmosphere</button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid row mt-5">
    <div class="grid-sizer col-12 col-lg-4"></div>
    @for ($i = 0; $i < 10; $i++)
      <div class="col-12 col-lg-4 item-artifact mb-3 @if ($i % 2 == 0) light @endif">
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
      @for ($i = 0; $i < 10; $i++)

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
