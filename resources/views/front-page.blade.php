@extends('layouts.app')

@section('content')


@if (!have_posts())
<div class="alert alert-warning">
  {{ __('Sorry, no results were found.', 'contingentagenciestheme') }}
</div>
{!! get_search_form(false) !!}
@endif

<div class="photo-home" style="background-image: url('https://picsum.photos/seed/picsum/1900/1200')"></div>
<div class="intro-home mb-5">
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
  {{-- @dump(App::api()) --}}
  {{-- @foreach (App::api() as $post)
  {{ $post->data[3]->label }}<br>
  @endforeach --}}

</div>
<button class="btn btn-outline-dark ml-auto mr-auto mb-5 mt-5 d-block">
  {{ __('Read more', 'contingentagenciestheme') }}
</button>

<div class="row">
  <div class="col-12">
    <div class="title d-block text-center mb-5">
      <h2>
        {{ __('selected notations and reflections','contingentagenciestheme') }}
      </h2>
    </div>
  </div>
</div>
<div class="grid row">
  <div class="grid-sizer col-12 col-lg-6"></div>

@foreach (App::api() as $post)
@if (count($post->media) == 1)
  @php
    $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
  @endphp
@elseif (count($post->media) >= 2)
    @php
    $img_1024w = json_decode(json_encode($post->media[0]->previews[2]), true);
    @endphp
@endif
@if(strcmp($post->data[3]->label, 'keywords') == 0)
@if (strcmp($post->data[3]->value[0], 'highlighted') == 0)
  <div class="col-12 col-lg-6 post-home">
    {{-- <a href="{{ $post->data[7]->value }}" class="photo"> --}}
    <a href="http://localhost:8888/contingentagencies/{{ $post->data[0]->value }}" class="photo">
      <img class="img-fluid" src="https://basedev.uni-ak.ac.at{{ $img_1024w['1024w'] }}">
      <div class="info-post text-center">
        <p>{{ $post->data[0]->value }}</p>


      </div>
    </a>
  </div>
@endif
@endif
@endforeach
</div>

<button class="btn btn-outline-dark mt-5 ml-auto mr-auto d-block">
  {{ __('View all', 'contingentagenciestheme') }}
</button>


@while (have_posts()) @php the_post() @endphp
@include('partials.content-'.get_post_type())
@endwhile
@query([
'category_name' => 'featured',
'post_type' => 'post',
'posts_per_page' => 1,
])

@posts($query)
<div id="modalEvent" class="modal">

    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="foto-modal col-5 d-block" style="background-image: url('@thumbnail('full', false)'">

            </div>

            <div class="info-modal col-7">
              <div class="top">
                <h3 class="entry-title">@title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="bottom mt-3">
                <div class="h3 mb-2">
                @field('start_date')<br>
                {{ __('until', 'contingentagenciestheme') }} @field('final_date')
                </div>


                @field('intro')

              <a href="@permalink" class="btn btn-sm btn-outline-dark mt-5 mr-auto" role="button">
                {{ __('Read more', 'contingentagenciestheme') }}
              </a>
              </div>

            </div>
          </div>
        </div>
      </div>
      </div>

    </div>

</div>

@endposts
{!! get_the_posts_navigation() !!}
@endsection

