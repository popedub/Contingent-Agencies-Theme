@extends('layouts.app')

@section('content')


  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
<div class="grid row">
  <div class="grid-sizer col-12 col-lg-6"></div>
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
</div>

  {!! get_the_posts_navigation() !!}
@endsection
