@extends('layouts.app')

@section('content')
  <header class="testimonial video">
    <div class="header-content">
      <div class="header-content-inner">
        <h1 id="homeHeading">Testimonials</h1>
      </div>
    </div>
    <div class="box"></div>
  </header>

  <div id="random">
    <p>Geef een willekeurige testimonial</p>
    <a href="{{ url('/testimonials/randomTestimonial') }}"></a>
  </div>

  <div class="filter testimonials">
    <div class="container">
      <h1>Categorie</h1>
      <ul>
        <li><a href="{{ url('/testimonials/filter/all') }}">Alle artikelen</a></li>
        @foreach($uniqueTags as $tag)
          @if($tag['tags'] === "")
            <li><a href="{{ url('/testimonials/filter/geen-tag') }}">Andere artikelen</a></li>
          @else
            <li><a href="{{ url('/testimonials/filter/' . str_replace(' ', '-', $tag['tags'])) }}">{{ $tag['tags'] }}</a></li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>

  <section id="testimonials">
    <div class="container">
      <div class="row">
        @foreach($articles as $article)
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <a href="{{ url('/testimonials/article/' . $article->id) }}" style="background-image: url('{{ $article->picture_url }}')" class="photo">
              <div class="bv-info">
                <h2>{{str_limit($article->title, 30)}}</h2>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
