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
      <div class="content">

        <div class="row">
          <div class="col-md-7">
            <h2>Latest news</h2>

            <div>Aug 23</div>
            <h4>VC launches review into criminal injuries compensation</h4>
            {{--<img src="https://via.placeholder.com/480x270" class="news-thumbnail" />--}}
            <hr/>

            <div>Aug 23</div>
            <h4>The Victims’ Commissioner responds to the call for evidence by the Commission on Justice in Wales</h4>
            {{--<img src="https://via.placeholder.com/480x270" class="news-thumbnail" />--}}
            <hr/>

            <div>Aug 23</div>
            <h4>VC launches report on victims of Mentally Disordered Offenders</h4>
            {{--<img src="https://via.placeholder.com/480x270" class="news-thumbnail" />--}}
            <hr/>

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
      </div>
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
