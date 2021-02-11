<div class="page-header">
  @if (is_single() && !in_category(array('researchers', 'events')))
    @if (strcmp(Single::api_single()->data[3]->label, 'keywords') == 0)
      @if (strcmp(Single::api_single()->data[3]->value[0], 'thing') == 0)
        <h1>{{ __('Þing', 'sage') }}</h1>
      @endif
    @endif
    @if (strcmp(Single::api_single()->data[3]->label, 'keywords') == 0)
        @if (strcmp(Single::api_single()->data[3]->value[0], 'research cell') == 0)
        <h1>@title</h1>
      @endif
    @endif
    @if (strcmp(Single::api_single()->data[0]->value[0], 'N') == 0 )
      <h1>{{ __('notation', 'sage') }}</h1>
    @endif
    @if (strcmp(Single::api_single()->data[0]->value[0], 'R') == 0 )
    <h1>{{ __('reflection', 'sage') }}</h1>

    @endif
  @else
  <h1>{!! App::title() !!}</h1>
  @endif
</div>
