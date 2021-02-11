<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @if (in_category('researchers'))
    @php (body_class('researchers-single')) @endphp>
  @else
    @php (body_class()) @endphp>
  @endif
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap container-fluid" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
