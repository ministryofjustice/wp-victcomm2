<article @php post_class() @endphp>
  <header>
    @if ($categoryIds = wp_get_post_categories( get_the_ID() ))
      <ul class="search-result__categories">
        @foreach($categoryIds as $catId)
          <li>{{ get_cat_name( $catId ) }}</li>
        @endforeach
      </ul>
    @endif
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
