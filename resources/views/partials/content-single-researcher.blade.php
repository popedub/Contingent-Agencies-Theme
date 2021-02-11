<section class="gris">
  <div class="row conceptual">
    <div class="col-12 col-lg-6">

      <img src="@thumbnail('full', false)" alt="" class="img-fluid">
    </div>
    <div class="col-12 col-lg-6">
      @field('bio')
      @hasfield('links')
      <div class="links mt-5">
        ↓ <br>
        @fields('links')
          <a href="@sub('link')" target="_blank">@sub('link')</a>
        @endfields
      </div>
      @endfield
    </div>

  </div>
</section>


<section class="dark">
  <div class="row f-lg">
    <div class="col-12">
      <h2 class="text-center mt-3">notations & reflections</h2>
      <div class="d-flex justify-content-between align-items-center mt-5">
        <div class="link-gris">{!! __('↓ identifier','contingentagenciestheme') !!}</div>
        <div class="link-gris">{!! __('agencies ↓','contingentagenciestheme') !!}</div>
      </div>

      <ul class="list">
        @foreach (App::api() as $post)
          @if(strcmp($post->data[3]->label, 'keywords') == 0)
            @if (strcmp($post->data[3]->value[0], 'thing') !== 0 && strcmp($post->data[3]->value[0], 'research cell') !== 0)
                @if (strcmp($post->data[5]->value[1]->label, get_the_title() ) == 0)
                  <li class="d-flex justify-content-between align-items-center">

                    <span class="id pr-3"><a href="{{ $post->data[7]->value }}" class="link-white">{{ $post->data[0]->value }}</a></span>
                    <span class="dot-white flex-grow-1 align-self-end"></span>
                    <span class="end pl-3"><a href="{{ get_permalink(11) }}" class="filter-cookie agency link-white">{{ $post->data[4]->value[0]->value }}</a></span>

                  </li>
                @endif
              @endif
            @endif
        @endforeach
      </ul>

      <button class="btn btn-outline-light mt-5 ml-auto mr-auto d-block">
        {{ __('View all researchers', 'contingentagenciestheme') }}
      </button>
    </div>
  </div>
</section>

