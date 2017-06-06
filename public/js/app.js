(function() {

  function scrollMenu(el) {
    var y = this.scrollY;
    var landingpageHeight = document.getElementsByClassName('video')[0].clientHeight;
    if(y > (landingpageHeight - 50)) {
      var getNavbar = document.getElementsByClassName('navbar-default')[0];
      if(!getNavbar.classList.contains('active')) {
        getNavbar.classList.toggle('active');
      }
    } else {
      var getNavbar = document.getElementsByClassName('navbar-default')[0];
      getNavbar.classList.remove('active');
    }
  }

  function getAjaxEventsData(e) {
    e.preventDefault();
    var links = $('.filter ul li a');
    for(var i = 0; i < links.length; i++) {
      if(links[i].className == 'activeEvent') {
        links[i].className = '';
      }
    }
    if(!$(e.target).hasClass('activeEvent')) {
      $(e.target).addClass('activeEvent');
    }
    var newhtmls = "";
    $.ajax({
      url: e.target.href,
      success: function(data) {
        // async data to view
        var html = document.querySelectorAll('#events_gate15 .row .col-sm-6');
        var htmlParent = $('#events_gate15 .row');
        for(var index = 0; index < html.length; index++) {
          html[index].remove();
        }

        for(var i = 0; i < data.length; i++) {
          var date = new Date(data[i]['event_begin_date'] * 1000);
          var newhtml = '<div class="col-xs-12 col-sm-6 col-lg-4"><a href="/events/' + data[i]['title'].split(' ').join('_').toLowerCase() + '" style="background-image: url(\'' + data[i]['picture_url'] + '\')" class="photo"><div class="bv-info"><h2>' + data[i]['title'] + '</h2></div><span>' + date.toLocaleDateString() + '</span></a></div>';
          newhtmls = newhtmls + newhtml;
          htmlParent.html(newhtmls);
        }
      }
    });
  }

  function getAjaxTestimonialData(e) {
    e.preventDefault();
    var links = $('.filter.testimonials ul li a');
    for(var i = 0; i < links.length; i++) {
      if(links[i].className == 'activeTestimonial') {
        links[i].className = '';
      }
    }
    if(!$(e.target).hasClass('activeTestimonial')) {
      $(e.target).addClass('activeTestimonial');
    }
    var newhtmls = "";
    $.ajax({
      url: e.target.href,
      success: function(data) {
        // async data to view
        console.log(data);
        var html = document.querySelectorAll('#testimonials .row .col-sm-6');
        var htmlParent = $('#testimonials .row');
        for(var index = 0; index < html.length; index++) {
          html[index].remove();
        }

        for(var i = 0; i < data.length; i++) {
          var newhtml = '<div class="col-xs-12 col-sm-6 col-lg-4"><a href="/testimonials/article/' + data[i]['id'] + '" style="background-image: url(\'' + data[i]['picture_url'] + '\')" class="photo"><div class="bv-info"><h2>' + data[i]['title'] + '</h2></div></a></div>';
          newhtmls = newhtmls + newhtml;
          htmlParent.html(newhtmls);
        }
      }
    });
  }

  function activateHeart(e) {
    var url, removeClass, addClass, isActivateHeart;
    if($(e.target).hasClass('heart')) {
      url = '/studeren/heart/session/' + e.target.classList[1];
      removeClass = 'heart';
      addClass = 'fullHeart';
    } else {
      url = '/studeren/heart/session/' + e.target.classList[1] + '/remove';
      removeClass = 'fullHeart';
      addClass = 'heart';
    }
    $.ajax({
      url: url,
      success: function(data) {
        console.log(data);
        if($(e.target).hasClass(removeClass)) {
          $(e.target).removeClass(removeClass).addClass(addClass);
          //$(e.target).click(activateHeart);
        }
      }
    });
  }

  function activateCourseHeart(e) {
    // e.preventDefault();
    var url, removeClass, addClass, isActivateHeart;
    if($(e.target).hasClass('heart')) {
      url = '/studeren/heart/session/course/' + e.target.classList[1];
      removeClass = 'heart';
      addClass = 'fullHeart';
    } else {
      url = '/studeren/heart/session/course/' + e.target.classList[1] + '/remove';
      removeClass = 'fullHeart';
      addClass = 'heart';
    }
    $.ajax({
      url: url,
      success: function(data) {
        if($(e.target).hasClass(removeClass)) {
          $(e.target).removeClass(removeClass).addClass(addClass);
          //$(e.target).click(activateCourseHeart);
        }
      }
    });
  }

  function clickFaculty(e) {
    var url = e.currentTarget.querySelectorAll('.text p a')[0].href;
    window.location.href = url;
  }

  function bindEvents() {
    if (window.location.pathname.indexOf('/testimonials/') > -1 || window.location.pathname.indexOf('/events/') > -1 || window.location.pathname.indexOf('/school/') > -1 || window.location.pathname.indexOf('/studeren/') > -1) {
      var getNavbar = document.getElementsByClassName('navbar-default')[0];
      if(!getNavbar.classList.contains('active')) {
        getNavbar.classList.toggle('active');
      }
    } else {
      window.addEventListener('scroll', scrollMenu);
    }

    var p = document.getElementsByTagName('p');
    for(var i = 0; i < p.length; i++) {
      if(p[i].innerHTML == '') {
        p[i].remove();
      }
    }

    // select a tags of filter EVENTS
    var getTypeEvents = document.querySelectorAll('.filter.events ul li a');
    for(var j = 0; j < getTypeEvents.length; j++) {
      getTypeEvents[j].addEventListener('click', getAjaxEventsData);
    }

    // select a tags of filter TESTIMONIALS
    var getTypeTestimonials = document.querySelectorAll('.filter.testimonials ul li a');
    for(var j = 0; j < getTypeTestimonials.length; j++) {
      getTypeTestimonials[j].addEventListener('click', getAjaxTestimonialData);
    }

    // activate full heart
    var heart = document.getElementsByClassName('heart');
    for(var k = 0; k < heart.length; k++) {
      heart[k].addEventListener('click', activateHeart);
    }

    // activate full heart
    var fullHeart = document.getElementsByClassName('fullHeart');
    for(var m = 0; m < fullHeart.length; m++) {
      fullHeart[m].addEventListener('click', activateHeart);
    }

    // activate session course heart
    var heartCourse = $('#school_detail [class*="course"]');
    for(var h = 0; h < heartCourse.length; h++) {
      heartCourse[h].addEventListener('click', activateCourseHeart);
    }

    var getFaculties = document.querySelectorAll('#school .shadow');
    for(var x = 0; x < getFaculties.length; x++) {
      getFaculties[x].addEventListener('click', clickFaculty);
    }
  }

  bindEvents();

})();
