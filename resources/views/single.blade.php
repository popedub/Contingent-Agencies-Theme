@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @if (!in_category('events'))

  @include('partials.content-single')
  @else
  @include('partials.content-single-evento')
  @endif

  @endwhile
@endsection
