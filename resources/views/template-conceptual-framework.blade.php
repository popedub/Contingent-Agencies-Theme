{{--
  Template Name: Conceptual Framework Template
--}}

@extends('layouts.app')

@section('content')
<div class="row conceptual">


  <div class="col-12 col-lg-6">
    {{ __('→ Search:', 'contingentagenciestheme') }}<input type="text" id="edit_search">
    <input type="button" id="btn-search" class="d-none" value="Find">

    <div class="chapters">
      @foreach ($texts as $item)
      @if ($item->title_chapter)
      <div class="title-conceptual mt-3">{{ $item->title_chapter }}</div>
      @endif
      <div class="subtitle-conceptual">{{ $item->subtitle }}</div>
      @endforeach
    </div>
  </div>
  <div class="col-12 col-lg-6 conceptual_frame">

    @foreach ($texts as $item)
    <div id="bloke-{{ $loop->index }}" class="conceptos">

      @if ($item->title_chapter)
      <h3 class="title-conceptual">{{ $item->title_chapter }}</h3>
      @endif

      <div class="text-center text-capitalize mt-5 mb-3">
        {{ $item->subtitle }}<br>
      </div>



      {!! $item->chapter !!}


    </div>
    @endforeach
  </div>
</div>

@endsection
