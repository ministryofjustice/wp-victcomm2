<footer class="banner">

  <div class="container">
    FOOTER
    @php dynamic_sidebar('sidebar-footer') @endphp
    <nav class="nav-footer">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</footer>
