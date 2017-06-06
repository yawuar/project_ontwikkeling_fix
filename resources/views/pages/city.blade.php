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
          <p class="text-faded">Lorem ipsum dolor sit amet, consectetur <span>adipiscing</span> elit. Cras id aliquam est. Praesent <span>accumsan</span> aliquet ligula, vel porta ipsum viverra accumsan. Nulla at nunc vitae mi pulvinar tempus. Aliquam iaculis, metus sed commodo
            sodales, dolor turpis luctus nisl, non tincidunt tellus leo quis sem. Suspendisse ac ligula nec sem pellentesque lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam et nulla cursus, venenatis
            tellus eu, eleifend ex.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Artikelen -->
  <section id="events">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div style="background-image: url({{ asset('images/events/stadsfotograaf.jpg') }})" class="event">
                <div class="bv-info">
                  <span class="date">10 maart 2017</span>
                  <h2>Stadsfotograaf</h2>
                </div>
              </div>
              <div class="dummy"></div>
          </div>
          <div class="col-md-6">
            <div class="text">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id aliquam est. Praesent accumsan aliquet ligula, vel porta ipsum viverra accumsan. Nulla at nunc vitae mi pulvinar tempus. Aliquam iaculis, metus sed commodo sodales, dolor turpis luctus nisl, non tincidunt tellus leo quis sem. Suspendisse ac ligula nec sem pellentesque lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam et nulla cursus, venenatis tellus eu, eleifend ex.</p>
            </div>
          </div>
      </div>
    </div>
  </section>

  <div class="dummy">

  </div>
@endsection
