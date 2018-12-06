@extends('layouts.app')

@section('page-header')
  @include('partials.page-header')
@endsection

@section('content')
  <div class="wrap container">
    <div class="content">
      <main class="main">
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif
      </main>
    </div>
  </div>
@endsection
