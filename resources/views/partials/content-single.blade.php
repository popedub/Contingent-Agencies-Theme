<article @php (post_class()) @endphp>
  <header class="col-12 col-lg-6 offset-lg-3">
    @if (has_post_thumbnail())
      {{ the_post_thumbnail('full', array('class' => 'img-fluid mr-auto ml-auto d-block')) }}
    @endif
  </header>
  <div class="col-12 col-lg-6 offset-lg-6 link-white mt-5 mb-5 date">
    @if ($start_date)
      {{ __('From', 'contingentagenciestheme') }} {{ $start_date }}
    @endif
    @if ($final_date)
      {{ __('until', 'contingentagenciestheme') }} {{ $start_date }}
    @endif
  </div>
  <div class="col-12 quote">
    {!! $featured_text !!}
  </div>
  <div class="entry-content col-12 col-lg-6 offset-lg-6">
    {!! $content !!}
    <div class="fotos-evento mt-5">
    @foreach ($fotos as $foto)
      <img src="{{ $foto->url }}" alt="{{ $foto->alt }}" class="img-fluid mb-3">
    @endforeach
    </div>
  </div>
</article>
@if ($content_completed)
  <article class="event-completed">
    <div class="col-12 text-center mb-5 text-lowercase h2">
      {{ $tittle }}
    </div>
    <div class="entry-content col-12 col-lg-6 offset-lg-6 mt-1">
      {!! $content_completed !!}
    </div>
  </article>
@endif
