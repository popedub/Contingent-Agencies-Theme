@extends('layouts.app')

@section('content')


@if (!have_posts())
<div class="alert alert-warning">
  {{ __('Sorry, no results were found.', 'contingentagenciestheme') }}
</div>
{!! get_search_form(false) !!}
@endif

<div class="photo-home" style="background-image: url('https://picsum.photos/seed/picsum/1200/800')"></div>
<div class="intro-home">
  <p>
    Each circumstance bring about a specific environment: a significant but non-objectified, precise but vague,
    ephemeral
    and enveloping presence. Contingent Agencies is an artistic research project initiated by Alex Arteaga and Nikolaus
    Gansterer to inquire into the agencies of the different entities that enable the emergence of this kind of
    presences.
  </p>
  <p>
    This project aims at developing specific practices of notation and reflection that allows for a comprehensive
    understanding of these agencies and their mutually conditioning relationships.
  </p>

</div>
<button class="btn btn-outline-dark ml-auto mr-auto mb-5 d-block">
  {{ __('Read more', 'contingentagenciestheme') }}
</button>

<div class="row">
  <div class="col-12">
    <div class="title d-block text-center mt-5 mb-3">
      <h3>
        {{ __('selected notations and reflections','contingentagenciestheme') }}
      </h3>
    </div>
  </div>
</div>
<div class="grid row">
  <div class="grid-sizer col-12 col-lg-6"></div>
  @for ($i = 0; $i < 10; $i++)
  <div class="col-12 col-lg-6 post-home mb-3">
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

<button class="btn btn-outline-dark mt-5 ml-auto mr-auto d-block">
  {{ __('View all', 'contingentagenciestheme') }}
</button>


@while (have_posts()) @php the_post() @endphp
@include('partials.content-'.get_post_type())
@endwhile

{!! get_the_posts_navigation() !!}
@endsection
