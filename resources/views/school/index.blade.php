@extends('layouts.app')

@section('content')
  <header class="school video">
    <div class="header-content">
      <div class="header-content-inner">
        <h1 id="homeHeading">Studeren in Antwerpen</h1>
      </div>
    </div>
    <div class="box"></div>
  </header>

<div id="random">
  <p>Geef een willekeurige opleiding</p>
  <a href="/studeren/randomStudy"></a>
</div>

  <!-- Wat doen we? -->
  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <h2 class="section-heading">Onze aanbod aan scholen</h2>
        </div>
        <div class="col-xs-12 col-sm-8">
          <p class="text-faded">Lorem ipsum dolor sit amet, consectetur <span>adipiscing</span> elit. Cras id aliquam est. Praesent <span>accumsan</span> aliquet ligula, vel porta ipsum viverra accumsan. Nulla at nunc vitae mi pulvinar tempus. Aliquam iaculis, metus sed commodo
            sodales, dolor turpis luctus nisl, non tincidunt tellus leo quis sem. Suspendisse ac ligula nec sem pellentesque lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam et nulla cursus, venenatis
            tellus eu, eleifend ex.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Schools -->
  <section id="school">
    <div class="container">
      <div class="row">
        @foreach($faculties as $key => $faculty)
          <div class="col-sm-4 col-md-3">
              <div class="shadow">
                <div class="faculty_photo">
                  @if(Session::has('buttons'))
                    @if(!empty(Session::get('buttons.btn_' . $key)))
                      <a class="fullHeart btn_{{ $key }}"></a>
                    @else
                      <a class="heart btn_{{ $key }}"></a>
                    @endif
                  @else
                    <a class="heart btn_{{ $key }}"></a>
                  @endif
                  <div class="f_photo" style="background-image: url('{{ $faculty['image_url'] }}')"></div>
                </div>
                <div class="text">
                  <p><a href="/studeren/{{ str_slug($faculty['name'], '-') }}">{{ $faculty['name'] }}</a></p>
                </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
