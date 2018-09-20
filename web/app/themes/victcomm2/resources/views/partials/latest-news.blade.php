<div class="latest-news">
  <h2 class="latest-news__title">Latest news</h2>

  <ul class="latest-news__list">
    @php $posts = get_posts(['posts_per_page' => 3]); @endphp

    @foreach($posts as $post)
      @php setup_postdata($post); @endphp

      <li class="latest-news__list-item">
        <div class="latest-news__date">{{ get_the_date('M j', $post->ID) }}</div>
        <a href="{{ get_permalink($post->ID) }}"
           class="latest-news__url"
        ><h3 class="latest-news__list-item-title">{{ $post->post_title }}</h3></a>
      </li>

      @php wp_reset_postdata(); @endphp
    @endforeach
  </ul>
</div>
