@extends('layouts.app')

@section('page-header')
  @include('partials.page-header--archive-annual-report')
@endsection

@section('content')
  <div class="wrap container">
    <div class="content">
      <main class="main">
        <h1>archive-annual-report.blade.php</h1>
        @php echo print_r(Imagick::getVersion(), true) @endphp

        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while(have_posts()) @php the_post() @endphp
        @include('partials.content-archive-annual-report-result')
        @endwhile

        {!! get_the_posts_navigation() !!}
      </main>
    </div>
  </div>

@endsection
