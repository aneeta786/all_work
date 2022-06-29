//header toggle

jQuery(document).ready(function(){
 // $( "#chat_bots" ).click(function(event) {
 
 
 
  jQuery("#cus_logsss img[src$='.svg']").addClass('svg_logos_img');


  setTimeout(() => {
    var url = window.location.href;
	var index = url.indexOf("#");
	if (index !== -1)
	{
		var hash = url.substring(index + 1);
	if(hash){
      document.getElementById(hash).click();
      $([document.documentElement, document.body]).animate({
        scrollTop: $("#"+hash).offset().top
    }, 1000);

  }
	}
  
  }, 1000);

	$(".clickable").click(function(){
	  $(".menu").slideToggle(400);
	});
	$(".first").click(function(){
	  $(this).find("ul").slideToggle(400);
	});
  // $(".language-switcher a.dropdown-toggle").click(function(){
  //   $(this).find("ul").slideToggle(400);
  // });
//add remove class on toggle click
jQuery(".clickable").click(function () {
  // If the clicked element has the active class, remove the active class from EVERY .nav-link>.state element
  if (jQuery(this).hasClass("current")) {
    jQuery(".clickable").removeClass("current");
  }
  // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
  else {
   jQuery(".clickable").removeClass("current");
    jQuery(this).addClass("current");
  }
});

$('.tab .tablinks:first-child').addClass('active');
$('.team_sections .tabcontent:first-child').addClass('active');

  $('.meet_team .team_section .tabcontent:first-child').css("display","block");

  $(".testimonial-body .read-more a").click(function(e) {
    e.preventDefault(); 
    $(this).parents(".bg-mob").find('p:not(:first-child)').toggle(); 
    $(this).parents(".bg-mob").toggleClass('desc-open');
    // $(this).siblings(".bio-fulltext").toggle();
    // $(this).text('Read more <i class="fa fa-angle-down" aria-hidden="true"></i>' == $(this).text() ? 'Read less <i class="fa fa-angle-up" aria-hidden="true"></i>' : 'Read more <i class="fa fa-angle-down" aria-hidden="true"></i>');
  });
  $(".home .testimonial-body .read-more a").click(function(e) {
    e.preventDefault(); 
    $(this).parents(".testimonial-body").find('p:not(:first-child)').toggle(); 
    $(this).parents(".testimonial-body").toggleClass('desc-open');
    // $(this).siblings(".bio-fulltext").toggle();
    // $(this).text('Read more <i class="fa fa-angle-down" aria-hidden="true"></i>' == $(this).text() ? 'Read less <i class="fa fa-angle-up" aria-hidden="true"></i>' : 'Read more <i class="fa fa-angle-down" aria-hidden="true"></i>');
  });

//how it work section slider
$('.pro-slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
   centerMode: true,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow:3,
        centerMode: true,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

/*************images slider product results*********** */
$('#pro_img').slick({
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 1,
   centerMode: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,

        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        centerMode: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


//pro section slider
$('.trending-pro').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
   centerMode: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,

        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        centerMode: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
//team section slider
$('.team-slider').slick({
  dots: false,
  rows: 2,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  adaptiveHeight: true,
   centerMode: false,
    prevArrow: false,
    nextArrow: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1201,
      settings: {
         rows:2,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 1025,
      settings: {
         rows:false,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
         rows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

//team tabs section slider
$('.tabslider').slick({
  dots: false,
  infinite: false,
  prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
  speed: 300,
  slidesToShow: 4,
   centerMode: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1201,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.testimonial-slider').slick({
  dots: true,
     arrows:true,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  
});
// fixed header

$(window).resize(function() {
      var HeaderHeight = $('.header').innerHeight();
      $(".header-wrapper").height(HeaderHeight);

      if($('.faq-main .side-nav').length > 0) {
        var Faq_Sidebar_width = $('.faq-main .side-nav ul').width();
        $('.faq-main .side-nav').width(Faq_Sidebar_width);
      }

}).resize();


if($('.faq-main .side-nav').length > 0) {
  $(document).scroll(function() {
    var HeaderHeight = $('.header').innerHeight();      
    if($(window).scrollTop() > $('.faq-main').offset().top-98) {
      $('.faq-main .side-nav').addClass("fixed-sidebar");
      $('.faq-main .side-nav').css("top",HeaderHeight);
    }
    else {
      $('.faq-main .side-nav').removeClass("fixed-sidebar");
    }
    var indicatorstopperheight = $('.scroll-indicator-stopper').innerHeight();
    if($(window).scrollTop() + $(window).height() > $('.scroll-indicator-stopper').offset().top+250) {
      $('.faq-main .side-nav').addClass("fixed-bottom");
      // var formsectionheight = $('.setting-hs-sec').innerHeight();
      // var footerheight = $('.hhs-footer-mod').innerHeight();
      // $('.scroll-indicator.fixed-bottom').css("bottom",formsectionheight+footerheight+indicatorstopperheight);
    }
    else {
      $('.faq-main .side-nav').removeClass("fixed-bottom");
    }
  });
}


$(window).scroll(function(){
    if ($(window).scrollTop() > 0) {
        $('header').addClass('fixed-header');
    }
    else {
        $('header').removeClass('fixed-header');
    }
});

$(window).load(function(){
  $('body').addClass('page-loaded');

  $('.meet_team .tabslider .slick-slide:first-child .tablinks').addClass('active');

  var stickyOffset = $("#header").offset();
  var $contentDivs = $(".sec-content");
  $contentDivs.each(function(k) {
      var _thisOffset = $(this).offset();
      var _actPosition = _thisOffset.top - $(window).scrollTop();
      if (_actPosition < stickyOffset.top && _actPosition + $(this).height() -100  > 0) {
          $("#current").html("Current div under sticky is: " + $(this).attr("class"));
          $("#header").removeClass("bg-dark-blue bg-gray bg-purple").addClass($(this).attr("data-id"));
          return false;
      }
  });
});

//add remove class based on section color
var stickyOffset = $("#header").offset();
var $contentDivs = $(".sec-content");
$(document).scroll(function() {
    $contentDivs.each(function(k) {
        var _thisOffset = $(this).offset();
        var _actPosition = _thisOffset.top - $(window).scrollTop();
        if (_actPosition < stickyOffset.top && _actPosition + $(this).height() -100  > 0) {
            $("#current").html("Current div under sticky is: " + $(this).attr("class"));
            $("#header").removeClass("bg-dark-blue bg-gray bg-purple").addClass($(this).attr("data-id"));
            return false;
        }
    });
});


//on click play pause video with custom Play button
// $('.video').parent().click(function () {
//   if($(this).children(".video").get(0).paused){ 
//            $(this).children(".video").get(0).play();   $(this).children(".playpause").fadeOut();
//     }else{       $(this).children(".video").get(0).pause();
//   $(this).children(".playpause").fadeIn();
//     }
// });
});

jQuery( ".accordion .read-more" ).click(function(event) {
    event.preventDefault()
});

//intergartion page tabbing
// function openCity(evt, cms) {
//   var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("tabcontent");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   //document.getElementById(cms).style.display = "block";
//   evt.currentTarget.className += " active";
// }

function openCitys(evt, cms) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cms).style.display = "block";
  evt.currentTarget.className += " active";
}


// faq Accordan
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


// $(document).ready(function() {
//     $('a[href*=#]').bind('click', function(e) {
//         e.preventDefault(); // prevent hard jump, the default behavior

//         var target = $(this).attr("href"); // Set the target as variable

//         // perform animated scrolling by getting top-position of target-element and set it as scroll target
//         $('html, body').stop().animate({
//             scrollTop: $(target).offset().top
//         }, 600, function() {
//             location.hash = target; //attach the hash (#jumptarget) to the pageurl
//         });

//         return false;
//     });
// });

// $(window).scroll(function() {
//     var scrollDistance = $(window).scrollTop();

//     // Show/hide menu on scroll
//     //if (scrollDistance >= 850) {
//     //    $('nav').fadeIn("fast");
//     //} else {
//     //    $('nav').fadeOut("fast");
//     //}
  
//     // Assign active class to nav links while scolling
//     $('.main-content section').each(function(i) {
//         if ($(this).position().top+100 <= scrollDistance) {
//             $('.side-nav ul li.active').removeClass('active');
//             $('.side-nav ul li').eq(i).addClass('active');
//         }
//     });
// }).scroll();


$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
    var HeaderHeight = $('.header').innerHeight();
  
    // Assign active class to nav links while scolling
    $('.main-content section').each(function(i) {
        if ($(this).position().top-HeaderHeight < scrollDistance) {
            $('.side-nav ul li a.active').removeClass('active');
            $('.side-nav ul li a').eq(i).addClass('active');
        }
    });
}).scroll();

if($('.custom_animate').length > 0) {
  $(document).scroll(function() {     
    $('.custom_animate').each(function(){
      if($(window).scrollTop() + $(window).height() > $(this).offset().top) {
        $(this).addClass("custom_animating");
      }
      else {
        $(this).removeClass("custom_animating");
      }
    });
  });

  $(window).load(function() {
    $('.custom_animate').each(function(){
      if($(window).scrollTop() + $(window).height() > $(this).offset().top+150) {
        $(this).addClass("custom_animating");
      }
      else {
        $(this).removeClass("custom_animating");
      }
    });
  });
}


// (function(c){function g(a){var b=a||window.event,i=[].slice.call(arguments,1),e=0,h=0,f=0;a=c.event.fix(b);a.type="mousewheel";if(b.wheelDelta)e=b.wheelDelta/120;if(b.detail)e=-b.detail/3;f=e;if(b.axis!==undefined&&b.axis===b.HORIZONTAL_AXIS){f=0;h=-1*e}if(b.wheelDeltaY!==undefined)f=b.wheelDeltaY/120;if(b.wheelDeltaX!==undefined)h=-1*b.wheelDeltaX/120;i.unshift(a,e,h,f);return(c.event.dispatch||c.event.handle).apply(this,i)}var d=["DOMMouseScroll","mousewheel"];if(c.event.fixHooks)for(var j=d.length;j;)c.event.fixHooks[d[--j]]=
// c.event.mouseHooks;c.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=d.length;a;)this.addEventListener(d[--a],g,false);else this.onmousewheel=g},teardown:function(){if(this.removeEventListener)for(var a=d.length;a;)this.removeEventListener(d[--a],g,false);else this.onmousewheel=null}};c.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);


// if($('.about-banner .right-bnnr-img').length > 0) {

//   $('.about-banner .right-bnnr-img').mousewheel(function(event,delta){


      // if (delta > 0) {
      //     // media.css('top', parseInt(media.css('top'))+40);
      // }
      // else {
      //   var delta_count = 1;

      //   console.log(delta_count, 'delta_count');
      //   if(delta_count == 1) {
      //       console.log(delta,'delta');
      //       $(this).addClass('first-active');
      //     }
      //     if(delta_count == 2) {
      //       console.log(delta,'delta');
      //       $(this).addClass('second-active');
      //     }
      //     if(delta_count == 3) {
      //       console.log(delta,'delta');
      //       $(this).addClass('third-active');
      //     }
      //   console.log(delta,'delta');
      //   // $(this).removeClass('first-active');
      //     // media.css('top', parseInt(media.css('top'))-40);
      // }   



        // if (delta > 0) {
        //     i = 0;
        //     i = parseInt(i) + 1;
        //     console.log(i,'removeClass');
        // } else {
        //     if (parseInt(i) > 0) {
        //         i = parseInt(i) - 1;
        //         console.log(i,'addClass');
        //     }
        // }
        // return false;

      // var scrollTop = self.prop('scrollTop');
      // if (delta > 0) {
      //     // media.css('top', parseInt(media.css('top'))+40);
      // }
      // else {
      //   var delta_count =1;
      //   var delta_count_2 = 2;
      //   var delta_count_3 = 3;

      //   console.log(delta_count, 'delta_count');
      //   if(delta_count == 1) {
      //       console.log(delta,'delta');
      //       $(this).addClass('first-active');
      //     }
      //     if(delta_count_2 == 2) {
      //       console.log(delta,'delta');
      //       $(this).addClass('second-active');
      //     }
      //     if(delta_count_3 == 3) {
      //       console.log(delta,'delta');
      //       $(this).addClass('third-active');
      //     }
      //   console.log(delta,'delta');
      //   // $(this).removeClass('first-active');
      //     // media.css('top', parseInt(media.css('top'))-40);
      // }   


      // focusedEl = document.activeElement;
      // if(focusedEl === excludedEl){
      //   //Exclude one specific element for UI comparison 
      //   return;
      // }
      // if (focusedEl.nodeName='input' && focusedEl.type && focusedEl.type.match(/number/i)){
      //   e.preventDefault();
      //   var max=null;
      //   var min=null;
      //   if(focusedEl.hasAttribute('max')){
      //     max = focusedEl.getAttribute('max');
      //   }
      //   if(focusedEl.hasAttribute('min')){
      //     min = focusedEl.getAttribute('min');
      //   }
      //   var value = parseInt(focusedEl.value, 10);
      //   if (e.originalEvent.deltaY < 0) {
      //     value++;
      //     if (max !== null && value > max) {
      //       value = max;
      //     }
      //   } else {
      //     value--;
      //     if (min !== null && value < min) {
      //       value = min;
      //     }
      //   }
      //   focusedEl.value = value;
      // }     
//   });

// }




// jQuery(document).ready(function($){
// var swiper = new Swiper('#teambox_scroller', {
//       // slidesPerView: 'auto',
//       // spaceBetween: 50,
//     direction: 'horizontal',
//     autoHeight: true,
//     loop: false,
//     // centeredSlides: true,
//     mousewheel: true,
//     slidesPerView: 1,
//     spaceBetween: 5,
//     grabCursor: true,
//     speed: 1200,
//     // observer: true,
//     // autoplay: {
//     //    delay: 2400,
//     //  },
//     // init: function() {
//     //   console.log('initialized.'); // this works
//     //   // var slider = this;
//     //   //   slider.autoplay.stop();
//     //   //   jQuery('.creators-carousel').mouseenter(function() {
//     //   //   slider.autoplay.start();
//     //   //   }).mouseleave(function() {
//     //   //   slider.autoplay.stop();
//     //   //   });
//     // },
//     breakpoints: {
//         767: {
//             // observer: false,
//             mousewheel: true,
//           slidesPerView: 1,
//           spaceBetween: 30,
//         },
//         991: {
//           slidesPerView: 1,
//           spaceBetween: 30,
//         },
//         1024: {
//           slidesPerView: 1,
//           spaceBetween: 30,
//         },
//     }
// });
// });

