@php
  $reportFile = get_field('report_file');
  $filePageLink = $reportFile['link'];
  $downloadUrl = $reportFile['url'];

  $file_size = \App\convertByteSizeToHumanReadable($reportFile['filesize']);
  $image = new Imagick();
  $image->pingImage(get_attached_file($reportFile['id']));
  $numberOfPages = $image->getNumberImages();
  $fileType = $reportFile['subtype'];
  $fileName = $reportFile['filename'];
  $publishedDate = DateTime::createFromFormat('Y-m-d H:i:s', $reportFile['date'], new DateTimeZone('Europe/London'));

  $attachmentImage = wp_get_attachment_image($reportFile['id'], 'report');
  $summary = get_field('summary');
  $post = get_post();
  $postTypeName = $post->post_type;
  $postType = get_post_type_object($postTypeName);
@endphp

<article @php post_class() @endphp>

  <div class="entry-content">
    <h3>{{ $postType->labels->singular_name }}</h3>
    <a href="{{$downloadUrl}}">@php echo $attachmentImage; @endphp</a>
    <div>
      <a href="{{$downloadUrl}}">
        {{$fileName}}<br/>
        ({{ $file_size }}, {{ $numberOfPages }} pages)<br/>
      </a>
      {{$publishedDate->format('F Y')}}
    </div>
    <p class="summary">@php echo $summary @endphp</p>
    @php the_content() @endphp
    <div>Find more <a href="/{{ $postTypeName }}">{{ $postType->label }}</a></div>
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php comments_template('/partials/comments.blade.php') @endphp

</article>
