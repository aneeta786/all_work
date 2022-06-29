 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"  referrerpolicy="no-referrer"></script>
  <link href="https://unpkg.com/flickity@2/dist/flickity.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.0/flickity.pkgd.min.js" defer></script>
<script>
jQuery(function($) {
	$(window).on("scroll", function () {
		AOS.init({
			duration: 1400,
		});
	});

	$( ".map-image-wrapper a" ).click(function() {
		var dataid = $(this).attr("data-id");
		$('.multi-function-video-box').each(function() {
			var datas= $(this).attr("data-index");
			if(datas == dataid){
				$('.multi-function-video-box').removeClass("active");
				$(this).addClass("active");
				$('.multi-function-popup').addClass("active");

				var windowWidthNOW = $( window ).width();
				if(windowWidthNOW > 480){
					$(this).find(".multi-video-file.desktop").trigger('play');
				}else{
					$(this).find(".multi-video-file.mobile").trigger('play');
				}
				$( window ).resize(function() {
					if(windowWidthNOW > 480){
						$(this).find(".multi-video-file.desktop").trigger('play');
					}else{
						$(this).find(".multi-video-file.mobile").trigger('play');
					}
				});
			}
		});
	});
	$( ".popup-close" ).click(function() {
		$('.multi-function-video-box').removeClass("active");
		$('.multi-function-popup').removeClass("active");
		$(".multi-function-popup active.multi-video-file").trigger('pause');
	});
	jQuery(".multi-function-video-box").click(function(e){
		e.stopPropagation();
	}); 
	jQuery('body').click(function(e){
		var container = jQuery(".map-image-wrapper");
		if (!container.is(e.target) && container.has(e.target).length === 0)
		{
			$('.multi-function-video-box').removeClass("active");
			$('.multi-function-popup').removeClass("active");
			$(".multi-function-popup active.multi-video-file").trigger('pause');   
		}
	});

   jQuery(".multi-function-block-box-inner").click(function () {
		if (jQuery(this).hasClass("active")) {
			jQuery(".multi-function-block-box-inner").removeClass("active");
		}
		else {
			jQuery(".multi-function-block-box-inner").removeClass("active");
			jQuery(this).addClass("active");
		}
	});
	jQuery(".video-wrapper a").click(function(event){
		event.preventDefault()
	});
	jQuery(".video-wrapper").click(function(event){
		event.preventDefault()
		jQuery('video').trigger('play');
		jQuery('.video-popup').addClass('active');

	});
	var append  = jQuery('.manual-mode-section').html();
	$(".append_data").append(append)
});
  
jQuery( document ).ready(function($) {
  if($("#qab_container").length) {
    jQuery('.mobile_nav-fixed--true').addClass('opened');
   }else{
    jQuery('.mobile_nav-fixed--true').removeClass('opened');
  }
  setTimeout(function(){
   jQuery('.mobile_nav-fixed--true').addClass('opened');
  },4000);
});
</script>



                       
/**********Slider code start*************/
   $( document ).ready(function() {
     

const target = document.getElementById('flickity');
  const videos = target.getElementsByTagName('video');
  const videosLength = videos.length;

  const flickity = new Flickity(target,{
    wrapAround:true,
    pageDots: true,
    prevNextButtons: true,

    autoPlay:false,
    on: {
      ready: function() {
        console.log('Flickity ready');
        videos[0].play();
      }
    }
  });

  for(let i = 0;i < videosLength; i++){
   
    videos[i].addEventListener('loadedmetadata',function(){
      console.log("Video Duration_" + i + " : "+ videos[i].duration);
    },false);
    videos[i].addEventListener('ended',function(){
      flickity.next('false');
    },false);
  }

  flickity.on('change',changeSlide);
  function changeSlide(index) {
    for(let i = 0;i < videosLength; i++){
      videos[i].currentTime = 0;
      videos[index].play();
    }
  }

      
   });

/**********Slider code end****************/


