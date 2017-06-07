@extends('layouts.app')

@section('content')
  <!-- Artikelen -->
  <section id="article">
    <div class="container">
      <!-- Bread Crumbs -->
      <nav>
        <ul id="breadcrumb">
          <li><a href="{{ url('/testimonials#testimonials') }}"><span>Overzicht</span></a></li>
          <li><a><span>{{ str_limit($testimonial['title'], 50) }}</span></a></li>
        </ul>
      </nav>
      <div class="row">
        <div class="col-xs-12">
          <div style="background-image: url('{{ asset($testimonial['picture_url']) }}');" class="person">
            <div class="bv-info">
              <span class="date">{{ $testimonial['published_on'] }}</span>
              <h2>{{ $testimonial['title'] }}</h2>
            </div>
          </div>
          <div class="dummy"></div>
          <div class="text">
            <div class="col-xs-10">
              {!! $testimonial['content'] !!}
              @if (!isset($testimonial->user_id))
              <div onclick="window.open('{{ $testimonial['article_url'] }}', '_blank')" id="url">
                <p>Naar origineel artikel</p>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
