
@php
  $reportFile = get_field('report_file');
  $filePageLink = $reportFile['link'];
  $downloadUrl = $reportFile['url'];
@endphp

<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif

  </header>


  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  <a href="{{$downloadUrl}}">@php echo wp_get_attachment_image($reportFile['id'], 'report'); @endphp</a>
  <div>{{ \App\convertByteSizeToHumanReadable($reportFile['filesize']) }}</div>
  <div>
    <a href="{{$filePageLink}}">meta</a>
  </div>
  <br/><br/>
</article>
