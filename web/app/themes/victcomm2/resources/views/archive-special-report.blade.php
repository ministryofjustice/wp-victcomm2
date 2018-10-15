@extends('layouts.app')

@section('page-header')
  @include('partials.page-header--archive-special-report')
@endsection

@section('content')
  <div class="wrap container">
    <div class="content">
      <main class="main">
        @if (!have_posts())
          @php
            $postTypeName = \App\get_archive_post_type();
            $postTypeObject = get_post_type_object($postTypeName);
            $pluralName = strtolower($postTypeObject->labels->name);
          @endphp
          <div class="alert alert-warning">
            {{ __('Sorry, no ' . $pluralName . ' were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
        @endwhile
      </main>
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
