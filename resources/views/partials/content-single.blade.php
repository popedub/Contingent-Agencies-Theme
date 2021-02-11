{{-- es un researcher --}}
@if (in_category('researchers'))
  @include('partials.content-single-researcher')

@elseif (strcmp(Single::api_single()->data[3]->value[0], 'thing') == 0)
{{-- es una thing --}}
  @include('partials.content-single-thing')

{{-- es una cell --}}
@elseif(strcmp(Single::api_single()->data[3]->value[0], 'research cell') == 0)
    @include('partials.content-single-cell')

@else
{{-- es una notation o reflection --}}
  @include('partials.content-single-notation')

@endif
