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
@query([
  'post_type' => 'post',
  'category_name' => 'researchers',
  'posts_per_page' => -1

])
<div class="row f-lg">
  @posts
    @hasfield('leader')
    <div class="col-12">

      <div class="link-white">{!! __('↓ research leaders','contingentagenciestheme') !!}</div>
      <ul class="list">

        <li class="d-block d-lg-flex justify-content-between align-items-center">
          <a href="@permalink"><span class="id pr-3">@title</span></a>
          <span class="dot flex-grow-1 align-self-end"></span>
          <span class="end pl-3">@hasfield('profesion')@field('profesion') @endfield</span>
        </li>

      </ul>
    </div>
    @endfield

    @if (!get_field('leader'))


    <div class="col-12">
      <div class="link-white">{!! __('↓ contributors','contingentagenciestheme') !!}</div>
        <ul class="list">

          <li class="d-block d-lg-flex justify-content-between align-items-center">

            <a href="@permalink"><span class="id pr-3">@title</span></a>
            <span class="dot flex-grow-1 align-self-end"></span>
            <span class="end pl-3">@hasfield('profesion')@field('profesion') @endfield</span>


            </li>

        </ul>
    </div>
    @endif
    @endposts
</div>

@endsection
