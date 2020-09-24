{{--
  Template Name: Conceptual Framework Template
--}}

@extends('layouts.app')

@section('content')
<div class="row intro">


  <div class="col-12 col-lg-6">
<input type="text" id="edit_search">
<input type="button" id="btn-search" value="Find">
    {{-- <form>
      <div class="typeahead__container">
        <div class="typeahead__field">
          <div class="typeahead__query">
            <input class="js-typeahead" name="q" autocomplete="on">
          </div>
          <div class="typeahead__button">
            <button type="submit">
              <span class="typeahead__search-icon"></span>
            </button>
          </div>
        </div>
      </div>
    </form> --}}

    @foreach ($texts as $item)
    @if ($item->title_chapter)
    <div class="title-conceptual mb-3 mt-3">{{ $item->title_chapter }}</div>
    @endif

    {{ $item->subtitle }}<br>
    @endforeach
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
