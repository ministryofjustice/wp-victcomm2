@extends('layouts.app')

@section('content')
  @include('partials.page-header--front-page')

  <div class="wrap container" role="document">
    <div class="content">
      <main class="main">
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </main>

      @if (App\display_sidebar())
        <aside class="sidebar">
          @include('partials.sidebar')
        </aside>
      @endif
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
