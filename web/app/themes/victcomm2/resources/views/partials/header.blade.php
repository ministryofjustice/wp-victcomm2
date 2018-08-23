<header class="banner">
  <div class="container">
    <div class="header">

      <a class="brand" href="{{ home_url('/') }}">
        <img class="brand__image" src="@asset('images/vc-logo.png')" alt="logo"/>
        <div class="brand__text">
          Victims<br/>Commissioner
        </div>
      </a>

      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>

      <div class="mobile-nav-menu-container">
        <button class="btn mobile-nav-menu-button">menu</button>
      </div>

    </div>
  </div>
</header>
