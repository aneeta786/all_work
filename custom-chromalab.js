// Responsive  navigation

let button = document.getElementById("navButton")
//const menu1 = document.getElementsByClassName("MainNav")[0];

  button.addEventListener("click",function(e) {

    e.preventDefault();//prevent default click

    //get header and toggle navigation
    const header = document.getElementsByClassName("mainHeader")[0];
    header.classList.toggle("navigationActive");


  });
/*
Prevents animations and traansitions from firing when browser resized
https://css-tricks.com/stop-animations-during-window-resizing/
*/
let resizeTimer;
window.addEventListener("resize", () => {
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);
});
//end naviagtion code

// FAQ section accordan
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
// end faq section accordan

$(document).ready(function() {

// fixed header
$(window).scroll(function(){
    if ($(window).scrollTop() >= 10) {
        $('header').addClass('fixed-header');
    }
    else {
        $('header').removeClass('fixed-header');
    }
});

// active menu
$(".MainNav li a").click(function() {
    $(this).parent().addClass('selected').siblings().removeClass('selected');

});

//scroll to top
 $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 

//Logo slidersection slider
$('.logos-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
prevArrow: false,
    nextArrow: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        slidesToShow: 3,
         dots: false,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
         dots: false,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
        {
      breakpoint:580,
       dots: false,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

// how to invest slider section slider
$('.invest-inner-row').slick({
  dots: true,
  infinite: true,
  autoplay:true,
  arrows: true,
  speed: 200,
  slidesToShow: 1,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  //slidesToScroll: 4,
  //slidesToShow: 2,
  adaptiveHeight: true,
 responsive: [
    {
      breakpoint: 1024,
      settings: {
         dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
         dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

//Logo slidersection slider
$('.testimonial-slider').slick({
  dots: true,
  infinite: false,
  autoplay:true,
  arrows: true,
  speed: 200,
  slidesToShow: 3,
prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
        {
      breakpoint:580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});



// article slider section slider
$('.article-slider').slick({
  dots: false,
  infinite: false,
  autoplay:true,
  arrows: true,
  speed: 200,
  slidesToShow: 3,
prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
        {
      breakpoint:580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


//vertical tabbed content WITH responsive
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
    
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();    
    
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
    
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    $(".tab_container").css("min-height", function(){ 
      return $(".tabs").outerHeight() + 50;
    });
  /* if in drawer mode */
  $(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
    
    $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
    
    $("ul.tabs li").removeClass("active");
    $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
  
//menu active on scroll

    // $(document).on("scroll", onScroll);
    
    // //smoothscroll
    // $('.MainNav li a[href^="#"]').on('click', function (e) {
    //     e.preventDefault();
    //     $(document).off("scroll");
        
    //     $('.MainNav li a').each(function () {
    //         $(this).removeClass('active');
    //     })
    //     $(this).addClass('active');
      
    //     var target = this.hash,
    //         menu = target;
    //     $target = $(target);
    //     $('html, body').stop().animate({
    //         'scrollTop': $target.offset().top+2
    //     }, 0, 'swing', function () {
    //         window.location.hash = target;
    //         $(document).on("scroll", onScroll);
    //     });
    // });
    $('.MainNav li a').on('click', function() {  
      $('html, body').animate({scrollTop: $(this.hash).offset().top - 100}, 1000);
      return false;
  });


  $(function() {
    var header = $(".MainNav li a");
  
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
  
});
});

  


