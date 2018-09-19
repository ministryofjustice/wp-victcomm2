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

  <div class="highlighted">
    <div class="wrap container">

        <div class="row">
          <div class="col-md-7">
            @include('partials.latest-news')
          </div>
          <div class="col-md-6"></div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <h2>Latest Tweets</h2>

            <div class="tweet">
              <div class="fa fa-twitter" ></div>
              <div><strong>@VictimsComm retweeted<br/>
              @RefugeCharity | Aug 9</strong></div>
              <a>The National Domestic Violence Helpline, which we run in partnership with @womensaid,
                is open 24 hours a day, seven days a week. Please call 0808 2000 247.
              </a>
            </div>

            <div class="tweet">
              <div class="fa fa-twitter" ></div>
              <div><strong>@VictimsComm | Aug 9</strong></div>
              <a>This is brilliant news and hopefully is a major step towards securing truly sustainable long-term funding for refuges.
                Pleased that @mhclg have listened to those in the know @womensaid @RefugeCharity https://victimscommissioner.org.uk/vc-makes-14-…
              </a>
            </div>

            <div class="tweet">
              <div class="fa fa-twitter" ></div>
              <div><strong>@VictimsComm | Aug 9</strong></div>
              <a>This is brilliant news and hopefully is a major step towards securing truly sustainable long-term funding for refuges.
                Pleased that @mhclg have listened to those in the know @womensaid @RefugeCharity https://victimscommissioner.org.uk/vc-makes-14-…
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <hr/>
            <h2>Make a complaint</h2>
            Contact a criminal justice agency directly if you want to <a href="/make-a-complaint/">make a complaint</a>.
          </div>
        </div>

        <hr/>

        <div class="row">
          <div class="col-md-5">
            <p>Sign up to our newsletter</p>
            <form action="/">
              <div class="form-group" style="position: relative;"><input id="email" class="form-control" type="text" placeholder="enter your email" /><i class="text-input-button">sign up</i></div>
            </form>
          </div>
        </div>

    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
