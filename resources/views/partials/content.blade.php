<article @php (post_class()) @endphp>
  <header>
    @if (has_post_thumbnail())
      {{ the_post_thumbnail('full', array('class'=>'img-fluid')) }}
    @endif
    <h2 class="entry-title mt-3"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
  </header>
  <div class="entry-summary">
    <div class="color-gris">
        @field('start_date') @hasfield('city') — @field('city') @endfield
    </div>

    @php
    $intro = get_field('intro')
    @endphp
    {!! $intro !!}

  </div>
</article>
