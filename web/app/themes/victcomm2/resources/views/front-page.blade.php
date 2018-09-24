@extends('layouts.app')

@section('page-header')
  @include('partials.page-header--front-page')
@endsection

@section('content')

  <div class="wrap container">
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

  <div class="highlighted">
    <div class="wrap container">

      <div class="row">
        <div class="col-md-7 col-md-push-7">
          @include('partials.latest-news')
        </div>
        <div class="col-md-5 col-md-pull-5">
          @include('partials.latest-tweets')
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <hr/>
          <div class="make-a-complaint">
            <h2>Make a complaint</h2>

            <a href="/make-a-complaint/"
               class="make-a-complaint__link"
            >Complain about a victim's service</a>
          </div>
        </div>
        <div class="col-md-7"></div>
      </div>

      <hr/>

      <div class="row">
        <div class="col-md-5">
{{--          <p>Sign up to our newsletter</p>
          <form action="/">
            <div class="form-group" style="position: relative;"><input id="email" class="form-control" type="text" placeholder="enter your email" /><i class="text-input-button">sign up</i></div>
          </form>--}}
        </div>
      </div>

    </div>
  </div>

  {!! get_the_posts_navigation() !!}

@endsection
