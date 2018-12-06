@extends('layouts.app')

@section('page-header')
  @include('partials.page-header')
@endsection

@section('content')
  <div class="wrap container">
    <div class="content">
      <main class="main">
        <h2>archive.blade.php</h2>
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
        @endwhile

        {!! get_the_posts_navigation() !!}
      </main>
    </div>
  </div>

@endsection
