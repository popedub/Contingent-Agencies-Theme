{{--
  Template Name: Researchers
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
<div class="intro">
  @include('partials.content-page')
</div>

@endwhile
<div class="row">
  <div class="col-12">
    <div class="link-white">{!! __('↓ research leaders','contingentagenciestheme') !!}</div>
    <ul class="list">
      @for ($i = 0; $i < 2; $i++)
      <li class="d-flex justify-content-between align-items-center">
        <span class="id pr-3">Nikolaus Gansterer</span>
        <span class="dot flex-grow-1 align-self-end"></span>
        <span class="end pl-3">Philosopher. Teacher in UDK, Berlin</span>
      </li>
      @endfor
    </ul>


  </div>
  <div class="col-12">
    <div class="link-white">{!! __('↓ contributors','contingentagenciestheme') !!}</div>
      <ul class="list">
        @for ($i = 0; $i < 15; $i++)
        <li class="d-flex justify-content-between align-items-center">
          @if ($i % 2 == 0)
          <span class="id pr-3">Tiago Pina</span>
          <span class="dot flex-grow-1 align-self-end"></span>
          <span class="end pl-3">Philosopher. Teacher in UDK, Berlin</span>
          @else
            <span class="id pr-3">Juan Fernando González</span>
            <span class="dot flex-grow-1 align-self-end"></span>
            <span class="end pl-3">Dance, Berlin</span>
          @endif
          </li>
          @endfor
      </ul>


    </div>
</div>

@endsection
