<header class="banner">
  <div class="container-fluid d-flex align-content-center justify-content-center">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    @if (!is_front_page())
      @include('partials.page-header')
    @endif
    <a id="menu" class="btn-menu">@svg('ico-menu', 'ico-menu')</a>
  </div>
</header>
<div class="overlay overlay-slidedown">

  <button type="button" id="closeMenu" class="overlay-close font-3">CLOSE</button>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif

    @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
    @endif

  </nav>
</div>

