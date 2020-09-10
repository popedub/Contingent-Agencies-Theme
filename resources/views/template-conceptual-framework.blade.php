{{--
  Template Name: Conceptual Framework Template
--}}

@extends('layouts.app')

@section('content')
<div class="row intro">


  <div class="col-12 col-lg-6">
    {!! get_search_form(false) !!}

    @foreach ($texts as $item)
    @if ($item->title_chapter)
    <div class="title-conceptual mb-3 mt-3">{{ $item->title_chapter }}</div>
    @endif

    {{ $item->subtitle }}<br>
    @endforeach
  </div>
  <div class="col-12 col-lg-6">
    @foreach ($texts as $item)
    @if ($item->title_chapter)
        <h3 class="title-conceptual">{{ $item->title_chapter }}</h3>
        @endif
    <div class="text-center text-capitalize mt-5 mb-3">
      {{ $item->subtitle }}<br>
    </div>


    {!! $item->chapter !!}

    @endforeach
  </div>
</div>

@endsection
