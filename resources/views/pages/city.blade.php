@extends('layouts.app')

@section('content')
  <header class="city video">
    <div class="header-content">
      <div class="header-content-inner">
        <h1 id="homeHeading">De stad Antwerpen</h1>
      </div>
    </div>
    <div class="box"></div>
  </header>

  <!-- Antwerp -->
  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <h2 class="section-heading">De stad Antwerpen</h2>
        </div>
        <div class="col-xs-12 col-sm-8">
          <p class="text-faded">{!! $introtekst !!}</p>
        </div>
      </div>
    </div>
  </section>

  <section id="game">
    <div class="container">
      <div class="scoreBoard">
        <div class="head">Scoreboard</div>
        <div class="item">
          <h1 class="number">1.</h1>
          <div class="personal">
            <span class="name">Yawuar</span>
            <span class="best">Best: Flappy - 14</span>
          </div>
          <span class="highscore">Topscore: 50</span>
        </div>
        <div class="item">
          <h1 class="number">1.</h1>
          <div class="personal">
            <span class="name">Yawuar</span>
            <span class="best">Best: Flappy - 14</span>
          </div>
          <span class="highscore">Topscore: 50</span>
        </div>
        <div class="item">
          <h1 class="number">1.</h1>
          <div class="personal">
            <span class="name">Yawuar</span>
            <span class="best">Best: Flappy - 14</span>
          </div>
          <span class="highscore">Topscore: 50</span>
        </div>
        <div class="item">
          <h1 class="number">1.</h1>
          <div class="personal">
            <span class="name">Yawuar</span>
            <span class="best">Best: Flappy - 14</span>
          </div>
          <span class="highscore">Topscore: 50</span>
        </div>
        <div class="item">
          <h1 class="number">1.</h1>
          <div class="personal">
            <span class="name">Yawuar</span>
            <span class="best">Best: Flappy - 14</span>
          </div>
          <span class="highscore">Topscore: 50</span>
        </div>
      </div>
      <div class="image"></div>
    </div>
  </section>

  <!-- Artikelen -->
  <section id="events">
    <div class="container">
      @foreach($locations as $location)
        <div class="row">
            <div class="col-md-6">
                <div style="background-image: url('{{ asset($location['picture_url']) }}')" class="event">
                  <div class="bv-info">
                    <h2>{{$location['name']}}</h2>
                  </div>
                </div>
                <div class="dummy"></div>
            </div>
            <div class="col-md-6">
              <div class="text">
                <p>{!! $location['content'] !!}</p>
              </div>
            </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
