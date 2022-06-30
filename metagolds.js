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
  $(".scroll-top").click(function (event) {
    event.preventDefault();
   //1 second of animation time
   //html works for FFX but not Chrome
   //body works for Chrome but not FFX
   //This strange selector seems to work universally
   $("html, body").animate({scrollTop: 0}, 1000);
});
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
            $('.scroll-top').fadeIn(); 
        } else { 
            $('.scroll-top').fadeOut(); 
        } 
    }); 
    $('.scroll-top').click(function(){ 
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
  autoplay:false,
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
$(document).ready(function () {
  $(document).on("scroll", onScroll);
  
  //smoothscroll
  $('a[href^="#"]').on('click', function (e) {
      e.preventDefault();
      $(document).off("scroll");
      
      $('MainNav li a').each(function () {
          $(this).removeClass('active');
      })
      $(this).addClass('active');
    
      var target = this.hash,
          menu = target;
      $target = $(target);
      $('html, body').stop().animate({
          'scrollTop': $target.offset().top()
      }, 500, 'swing', function () {
          window.location.hash = target;
          $(document).on("scroll", onScroll);
      });
  });
});

function onScroll(event){
  var scrollPos = $(document).scrollTop();
  $('.MainNav li a').each(function () {
      var currLink = $(this);
      var refElement = currLink.attr("href");
      var splitEle = refElement.split('#');

      //var refElement = $(currLink.attr("href"));
      if ($("#"+splitEle[1]).offset() && $("#"+splitEle[1]).offset().top <= scrollPos && $("#"+splitEle[1]).offset().top + $("#"+splitEle[1]).height() > scrollPos) {
        $('.MainNav li a').removeClass("active");
        currLink.parent().addClass("active");
    }else{
        currLink.parent().removeClass("active");
    }
  //   if (scrollPos + $(window).height() +1 > $(document).height()) {
  //    $("#portfoliolink").removeClass("active");
  //    $("#contact").addClass("active");
  // }
    
  });

}
    
 

    $('.MainNav li a').on('click', function() {  
      $('html, body').animate({scrollTop: $(this.hash).offset().top - 100}, 1000);
      return false;
  });

	
});
/************Scroll****************** */

$(function() {
  // This will select everything with the class smoothScroll
  // This should prevent problems with carousel, scrollspy, etc...
  $('.MainNav li a').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top()
        }, 2000); // The number here represents the speed of the scroll in milliseconds
        return false;
        
      }
    }
  });
});

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  //copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
}