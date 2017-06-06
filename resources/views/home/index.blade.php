@extends('layouts.app')

@section('content')
  <header id="landingvideo" class="video">
    <video poster="{{ asset('images/bg.jpg') }}" id="antwerp_video" playsinline autoplay muted loop>
      <!-- <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm"> -->
      <source src="{{ asset('video/antwerp.mp4') }}" type="video/mp4">
    </video>
    <div class="header-content">
      <div class="header-content-inner">
        <h1 id="homeHeading">Ontdek Antwerpen</h1>
      </div>
    </div>
    <div class="box"></div>
  </header>

  <!-- Wat doen we? -->
  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <h2 class="section-heading">Wat doen we?</h2>
        </div>
        <div class="col-xs-12 col-sm-8">
          <p class="text-faded">Lorem ipsum dolor sit amet, consectetur <span>adipiscing</span> elit. Cras id aliquam est. Praesent <span>accumsan</span> aliquet ligula, vel porta ipsum viverra accumsan. Nulla at nunc vitae mi pulvinar tempus. Aliquam iaculis, metus sed commodo
            sodales, dolor turpis luctus nisl, non tincidunt tellus leo quis sem. Suspendisse ac ligula nec sem pellentesque lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam et nulla cursus, venenatis
            tellus eu, eleifend ex.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Artikelen -->
  <section id="articles">
    <div class="container">
      <div class="row">
        @foreach($articles as $article)
          <a href="testimonials/article/{{ $article['id'] }}" class="col-xs-12">
            <div style="background-image: url('{{ asset($article['picture_url']) }}')" class="person">
              <div class="bv-info">
                <span class="date">{{ $article['published_on'] }}</span>
                <h2>{{ $article['title'] }}</h2>
              </div>
            </div>
            <div class="dummy"></div>
            <p>{!! str_limit($article['content'], 250) !!}</p>
            <div class="dummy"></div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Artikelen -->
  <a href="/events/{{ strtolower(str_replace(' ', '_', $event['title'])) }}" id="mas" style="background-image: url('{{ $event['picture_url'] }}')">
    <div class="mas-box"></div>
    <div class="info">
      <h1>{{ $event['title'] }}</h1>
      <span>{{ gmdate("d-m-Y", $event['event_begin_date']) }}</span>
    </div>
  </a>

  <section id="footer">

  </section>
@endsection
