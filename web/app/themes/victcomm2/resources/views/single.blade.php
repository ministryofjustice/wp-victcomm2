@extends('layouts.app')

@section('content')
  <div class="wrap container">
    <div class="content">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-single-'.get_post_type())
      @endwhile
    </div>
  </div>
@endsection
