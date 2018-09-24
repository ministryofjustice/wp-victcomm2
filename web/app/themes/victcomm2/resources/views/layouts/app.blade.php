<!doctype html>
<html @php language_attributes() @endphp>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div class="site-container">
      <div class="page-container" role="document">
        @php do_action('get_header') @endphp
        @include('partials.header')

        @yield('page-header')

        @yield('content')

        @php do_action('get_footer') @endphp
        @include('partials.footer')
        @php wp_footer() @endphp

        <div class="mobile-nav-menu-overlay"></div>
      </div>
      <nav class="nav-primary nav-primary--mobile">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'mobile-menu', 'walker' => new App\Walker\Mobile_Walker()]) !!}
        @endif
      </nav>
    </div>
  </body>
</html>
