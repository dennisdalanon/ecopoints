$( function() {
    // Home
    $(document.body).addClass('home');
    $('.flex-center').css("background-image", "url(/images/ecopoints-home-bg.jpg)"); 
    $('.carousel-inner .item:first-child').addClass('active');
    $('.carousel-indicators li:first-child').addClass('active');

    $('nav.navbar ul.nav li a.home, .logo').on("click",function(){
        $(document.body).attr('class', 'home');
        window.location = '/';
             
    });

    //Start homepage loading content Login Page
    $('nav.navbar ul.nav li a.login').on("click",function(){
        $(document.body).attr('class', 'login');
        $.ajax({
                url: "/login",
                type: "GET",
                dataType: "html",
                success: function (res) {
                $(".widget-content, .load-content").html($(res).find(".container").addClass('loaded')).fadeIn('slow');
                }
        });
    });
    // End Login Page

    //Start homepage loading content register Page
    $('#projectlayer .project-link').on("click",function(){
     $('.flex-center').css("background-image", "none"); 
    }); 
    // End Register Page


    // Remove Background Image 
    $('nav.navbar ul.nav li a.register').on("click",function(){
        $(document.body).attr('class', 'register');
        $.ajax({
                url: "/register",
                type: "GET",
                dataType: "html",
                success: function (res) {
                $(".widget-content, .load-content").html($(res).find(".container").addClass('loaded')).fadeIn('slow');
                }
        });
    });




    // Carousel
// Instantiate the Bootstrap carousel
$('.carousel-showmanymoveone').carousel({
  interval: 5000
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
// End Carousel

//Nav Bar Sticky Background

    var scroll_start = 0;
    var startchange = $(".header");
    var offset = startchange.offset();

    if (startchange.length) {
        $(document).scroll(function () {
            scroll_start = $(this).scrollTop();
            if (scroll_start > offset.top) {
                $("nav").css('background-color', 'rgba(0,0,0,.8)');
                $(".navbar-header .welcome-msg").css('top', '-3px');
                $(".navbar-header .welcome-msg").css('font-size', '1em');
                $("nav").addClass("nav-bar-active");
            } else {
                $('nav').css('background-color', 'transparent');
                $(".navbar-header .welcome-msg").css('top', '15px');
                $(".navbar-header .welcome-msg").css('font-size', '1.2em');
                $("nav").removeClass("nav-bar-active");
            }
        });
    }

});