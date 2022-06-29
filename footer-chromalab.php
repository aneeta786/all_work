<?php
 //if (! is_page(7190)) {
     global $iron_sonaar_archive;
     if (function_exists('is_shop') && is_shop()) {
         $post_id = wc_get_page_id('shop');
     } elseif (isset($post)) {
         $post_id = $post->ID;
     }


     $iron_sonaar_fixed_header = Iron_sonaar::getOption('enable_fixed_header', null, '0');
     $iron_sonaar_menu_type = Iron_sonaar::getOption('menu_type', null, 'push-menu');
     $iron_sonaar_menu_position = Iron_sonaar::getOption('classic_menu_position', null, 'absolute absolute_before');

     $iron_sonaar_block_footer =  Iron_sonaar::getOption('block_footer', null, null);
     $iron_sonaar_block_footer_post = (isset($post))? Iron_sonaar::getField('block_footer', $post_id) : '';
     $iron_sonaar_block_footer_post = (isset($iron_sonaar_archive))? Iron_sonaar::getField('block_footer', $iron_sonaar_archive->getArchiveID()) : $iron_sonaar_block_footer_post;
     $iron_sonaar_block_footer = ($iron_sonaar_block_footer_post !== 'null' && $iron_sonaar_block_footer_post !== '' && !$iron_sonaar_block_footer_post === false)? $iron_sonaar_block_footer_post : $iron_sonaar_block_footer;

     if (get_post_type(get_the_ID()) != 'block') {
         if ($iron_sonaar_block_footer) {
             $iron_sonaar_block_footer = (class_exists('Sonaar_Lang') && function_exists('get_current_lang_id'))? get_post(Sonaar_Lang::get_current_lang_id($iron_sonaar_block_footer, 'block')):get_post($iron_sonaar_block_footer);
         }
     } ?>
	</div>


	<?php if (! function_exists('elementor_theme_do_location') || ! elementor_theme_do_location('footer')) : ?>
	<!--- end if elementor footer location -->
	<?php endif; ?>
 </div>
<?php

        if (($iron_sonaar_menu_type == 'elementor-menu') || ($iron_sonaar_menu_type == 'push-menu' && empty($iron_sonaar_fixed_header)) || ($iron_sonaar_menu_type == 'classic-menu' && ($iron_sonaar_menu_position == 'fixed' || $iron_sonaar_menu_position == 'fixed_before'))) : ?>
		</div>
	<?php endif;

     if (($iron_sonaar_menu_type == 'elementor-menu') ||($iron_sonaar_menu_type == 'push-menu' && !empty($iron_sonaar_fixed_header)) || ($iron_sonaar_menu_type == 'classic-menu' && ($iron_sonaar_menu_position != 'fixed' || $iron_sonaar_menu_position == 'fixed_before'))) : ?>
		</div>
	<?php endif; ?>
	</div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>   -->
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>
<div class="footer">
  <div class="footer-inner">
  <div class="radioplayer"
	data-src="http://streaming.radio.co/s4a0e6e7f7/listen"
	data-autoplay="false"
	data-playbutton="true"
	data-volumeslider="false"
	data-elapsedtime="true"
	data-nowplaying="true"
	data-showplayer="false"
	data-volume="100"></div> 
  
  <script>
    // jQuery(document).ready(function(){
      
         jQuery('.radioplayer').radiocoPlayer();

    //     jQuery('#radioco-radioplayer').attr('autoplay', 'true');
    //   });
      
      function toggleAllowPopup() {

function toggle(current) {
  console.log(`Current value: jQuery{current.value}`);
  var browser=window.browser||window.chrome;


//  browser.browserSettings.allowPopupsForUserEvents.set({value: !current.value});
}

//browser.browserSettings.allowPopupsForUserEvents.get({}).then(toggle);
}

//browser.browserAction.onClicked.addListener(() => {
toggleAllowPopup();
//});
  </script>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Become a member</h3>
          <p>For the purpose of MFSP regulation, your details are required.</p>
        </div>
        <div class="modal-body">
        <?php echo do_shortcode('[ihc-register]'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <?php
 //}?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/slick.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script>
jQuery(function(){
    jQuery('.with_login').slick({
      draggable: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      dots: false,
      fade: true,
      speed: 300,
      infinite: true,
      cssEase: 'ease-in-out',
      touchThreshold: 100,
      slidesToShow: 1
    });

});

jQuery(document).ready(function () { 
  if (jQuery(window).width() < 1025) {
     jQuery('.realated-slider').slick({
      dots: false,
      arrows : false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            
           
          }
        },
        {
          breakpoint: 520,
          settings: {
            slidesToShow: 2,
            infinite: true,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '40px',            
          }
        },
        {
          breakpoint: 425,
          settings: {
            slidesToShow: 2,
            infinite: fa,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '30px',            
          }
        },
      ]
    });
  }
  jQuery(".playlist-title").click(function () {
      jQuery(this).parent().toggleClass('active')
  });
});
//  jQuery('.search-submitss').on('click', function(){
//     //event.preventDefault();
//     $(this).removeClass('is-active');
//     $('.search-section').addClass('is-active');
// });

jQuery(".search-submitss").click(function () {
  // If the clicked element has the active class, remove the active class from EVERY .nav-link>.state element
  if (jQuery(".search-section").hasClass("is-active")) {
    jQuery("#datafetch").hide();
    jQuery("#datafetchs").hide();
    jQuery('.search-post-data').show();
    jQuery(".search-section").removeClass("is-active");
  }
  // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
  else {
     jQuery(".search-submitss").removeClass("is-active");
     jQuery("#datafetchs").show();
     jQuery('#keywords').val('');
     jQuery("#datafetchs .blog-section-inner").html(jQuery('.search-post-data').html());
     jQuery("#datafetch").show();
     jQuery('#keyword').val('');
     jQuery("#datafetch .blog-section-inner").html(jQuery('.search-post-data').html());

   
    jQuery(".search-post-data").hide();
  
    jQuery(".search-section").addClass("is-active");
    
  }
});



jQuery(".search-submitss").click(function () {
  // If the clicked element has the active class, remove the active class from EVERY .nav-link>.state element
  if (jQuery("#datafetchs").hasClass("is-actives")) {
    
    jQuery("#datafetchs").removeClass("is-actives");
  }
  // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
  else {
    jQuery("#search-submitss").removeClass("is-actives");
 
  
    jQuery("#datafetchs").addClass("is-actives");
    
  }
});



  jQuery("form").attr('autocomplete', 'off');
  jQuery(document).on('click', '.menu-item a', function() {
      jQuery(".dialog-close-button").click();
  });

  jQuery(document).on('click', '#become-member', function() {
      jQuery("#elementor-tab-title-8842").click();
  });

  jQuery(document).on('click', '#log_in', function() {
      jQuery("#elementor-tab-title-8843").click();
  });

 
 
  jQuery( "input.sr-mailchimp-input" ).attr("placeholder", "Subscribe for Newsletter");

  jQuery( ".blog-single-section-2 iframe" ).wrap( "<div class='video-box'></div>" );



  jQuery(this).find('.menu-btn').removeClass("active");

   jQuery( ".menu-btn,.menu-close" ).click(function() {
        jQuery( ".header-menu , .header-logo , body" ).toggleClass( "active" );
        jQuery(".main-menu-content").show();
        jQuery(".login-menu-content").hide();
        jQuery(".member-menu-content").hide();
   });
   jQuery( ".member-menu a,.login-menu a" ).click(function() {
    jQuery(".member-menu, .login-menu").removeClass('active');
    jQuery(".login-menu-content").hide();
    jQuery(".main-menu-content").hide();
      jQuery( this ).parent().addClass( "active" );
      jQuery(".member-menu-content").show();
   });
   jQuery( ".login-menu a" ).click(function() {
    jQuery(".member-menu, .login-menu").removeClass('active');
    jQuery(".member-menu-content").hide();
    jQuery(".main-menu-content").hide();
      jQuery( this ).parent().addClass( "active" );
      jQuery(".login-menu-content").show();
   });

  jQuery( ".menu-close" ).click(function() {
    jQuery(".login-menu").removeClass("active");
  });

  jQuery( ".menu-close" ).click(function() {
    jQuery(".member-menu").removeClass("active");
  });


  jQuery(window).scroll(function($) {
     jQuery(".footer").addClass("move-bar");
     if(jQuery(window).scrollTop() + jQuery(window).height() > (jQuery(document).height() - 80) ) {
         jQuery(".footer").removeClass("move-bar");
     }
  }); 
  jQuery( "#alredy_logns" ).click(function() {
    jQuery(".login-menu-content").hide();
    jQuery(".member-menu-content").show();
  });
  jQuery( "#alredy_reg" ).click(function() {
   
    jQuery(".member-menu-content").hide();
    jQuery(".login-menu-content").show();
  });

  jQuery(window).scroll(function() {
     if (jQuery(this).scrollTop() > 60){
      jQuery('.header').addClass("fixed");
     } else {
      jQuery('.header').removeClass("fixed");
     }
  });

function goBack() {
  window.history.back();
}
</script> 





<?php 
if(!is_page( 6073 )){
  wp_footer(); 
}
?>
</body>
</html>