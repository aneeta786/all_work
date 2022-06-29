<footer id="footer" class="footer bg-dark-blue padd-t_b">
		<div class="container">
				<div class="footer_logo">
					
				
					
					<a href="<?php echo get_site_url();?>"><img src="<?php echo esc_url( get_field( 'footer_logo', 'options' ) ); ?>" alt="Wiio"></a>
					<p class="tagline text-white">
					<?php if ( $footer_text = get_field( 'footer_text', 'options' ) ) : ?>
	                 <?php echo esc_html( $footer_text ); ?>
                      <?php endif; ?>	</p>
				</div>
				<div class="footer_btm">
					<div class="col stay-touch">
						<!-- <h3 class="text-white title-layer-before">Stay in Touch!</h3> -->
						
						<?php if (ICL_LANGUAGE_CODE == 'pt-pt') {?>
							
							<h3 class="text-white title-layer-before">Mantenha em contato conosco</h3>
                        <?php dynamic_sidebar('stay-in-touch');?>
						<?php } ?>
						<?php if (ICL_LANGUAGE_CODE == 'es') {?>
							
							<h3 class="text-white title-layer-before">¡Mantente en contacto!</h3>
                        <?php dynamic_sidebar('stay-in-touch');?>
						<?php } ?>
						<?php if (ICL_LANGUAGE_CODE == 'en') {?>
							<h3 class="text-white title-layer-before">Stay in Touch!</h3>
							<?php dynamic_sidebar('footer-1');?>
						<?php } ?>
						<div class="social-icon">
						<?php if (ICL_LANGUAGE_CODE == 'pt-pt') {?>
							<h4 class="text-white">Siga-nos</h4>
							<?php } ?>
							<?php if (ICL_LANGUAGE_CODE == 'en') {?>
							<h4 class="text-white">Follow us</h4>
							<?php } ?>
							<ul>
							<?php if ( have_rows( 'social_icons', 'options' ) ) : ?>
							<?php while ( have_rows( 'social_icons', 'options' ) ) :the_row(); ?>
		
	
							  
				            <li><a href="<?php if ( $url = get_sub_field( 'url', 'options' ) ) : ?>
	                         <?php echo esc_html( $url ); ?>
                                <?php endif; ?>">
									<img src="<?php echo esc_url( get_sub_field( 'social_images', 'options' ) ); ?>" alt="Youtube"></a></li>
										
                             <?php endwhile; ?>
                             <?php endif; ?>
							
							</ul>
					</div>
					</div>
					<div class="col menu">
						<div class="footer-ver-menu">
						
							<h4 class="text-pink">
								<?php if (ICL_LANGUAGE_CODE == 'en') {
							$menu = wp_get_nav_menu_object("Platform" );
							echo $menu->name;?></h4>
						<?php } ?>
						<h4 class="text-pink">
								<?php if (ICL_LANGUAGE_CODE == 'es') {
							$menu = wp_get_nav_menu_object("Plataforma" );
							echo $menu->name;?></h4>
						<?php } ?>
							<?php dynamic_sidebar('footer-2');?>
						</div>
						<div class="footer-ver-menu">
						<?php if (ICL_LANGUAGE_CODE == 'en') {?>
						<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("Integrations");
                            echo $menu->name; ?></h4>
							<?php } ?>
							<?php if (ICL_LANGUAGE_CODE == 'es') {?>
						<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("integraciones");
                            echo $menu->name; ?>integraciones</h4>
							<?php } ?>
							<?php if (ICL_LANGUAGE_CODE == 'pt-pt') {?>
							<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("Integrações");
                            echo $menu->name; ?></h4><?php } ?>
						<?php dynamic_sidebar('footer-4');?>
						
						</div>
						<div class="footer-ver-menu">
						<?php if (ICL_LANGUAGE_CODE == 'en') {?>
							<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("other");
                            //echo $menu->name;?>other</h4>
							<?php } ?>
								<?php if (ICL_LANGUAGE_CODE == 'es') {?>
							<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("otra");
                            //echo $menu->name;?>otra</h4>
							<?php } ?>
							<?php if (ICL_LANGUAGE_CODE == 'pt-pt') {?>
                           <h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("other");
                            //echo $menu->name;?>Recursos</h4>
                           <?php  } ?>
							<?php dynamic_sidebar('footer-3');?>
						</div>
						<div class="footer-ver-menu helps">
							<?php if (ICL_LANGUAGE_CODE == 'en') {?>
						<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("help" );
							echo $menu->name; ?></h4>
						<?php } ?>
						<?php if (ICL_LANGUAGE_CODE == 'es') {?>
						<h4 class="text-pink"><?php $menu = wp_get_nav_menu_object("ayudar" );
							echo $menu->name; ?>ayudar</h4>
						<?php } ?>
							<?php dynamic_sidebar('help-menu');?>
						</div>
					</div>
				</div>
				<?php //dynamic_sidebar('viral-loop');?>
		</div>
	</footer><!-- End Footer -->
      <!-- jQuery/JavaScript -->
	  <script>
		jQuery(function() {
			jQuery('#navMenus li a[href*=\\#]:not([href=\\#])').on('click', function() {
				console.log('clicked');
				jQuery("#navMenus li a").removeClass("active");
				jQuery(this).addClass("active");
		        var target = jQuery(this.hash);
		        target = target.length ? target : jQuery('[name=' + this.hash.substr(1) +']');
		        if (target.length) {
		            jQuery('html,body').animate({
		                scrollTop: target.offset().top
		            }, 100);
		            return false;
		        }
	    	});
	    	$(document).on('click', '.language-switcher .wpml-ls-current-language', function (e) {
	    		$(this).toggleClass('show');
	    		$('.language-switcher ul.dropdown-menu').toggleClass('show');
	    	});


	    	$(document).on('click', '.tablinks', function() {
		      console.log('clickedddd');
		      var tab_id = $(this).attr('data-id');
		      console.log(tab_id, 'tab_id');

		      $('.tablinks').removeClass('active');
		      $('.tabcontent').removeClass('active');
		      $('.tabcontent').css('display','none');

		      $(this).addClass('active');
		      $("#"+tab_id).addClass('active');
		      $("#"+tab_id).css('display','block');
		    });
		});  
// 		jQuery( ".menu-item-has-children" ).click(function(event) {
//     event.preventDefault()
// });

	  </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
		  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		  <?php wp_footer();?>
   </body>
   <!-- <script>!function(){var a=window.VL=window.VL||{};return a.instances=a.instances||{},a.invoked?void(window.console&&console.error&&console.error("VL snippet loaded twice.")):(a.invoked=!0,void(a.load=function(b,c,d){var e={};e.publicToken=b,e.config=c||{};var f=document.createElement("script");f.type="text/javascript",f.id="vrlps-js",f.defer=!0,f.src="https://app.viral-loops.com/client/vl/vl.min.js";var g=document.getElementsByTagName("script")[0];return g.parentNode.insertBefore(f,g),f.onload=function(){a.setup(e),a.instances[b]=e},e.identify=e.identify||function(a,b){e.afterLoad={identify:{userData:a,cb:b}}},e.pendingEvents=[],e.track=e.track||function(a,b){e.pendingEvents.push({event:a,cb:b})},e.pendingHooks=[],e.addHook=e.addHook||function(a,b){e.pendingHooks.push({name:a,cb:b})},e.$=e.$||function(a){e.pendingHooks.push({name:"ready",cb:a})},e}))}();var campaign=VL.load("uqL3hns9mqkrWFAd7tCxgCPfjUM",{autoLoadWidgets:!0});</script>
 -->
 <script>!function(){var a=window.VL=window.VL||{};return a.instances=a.instances||{},a.invoked?void(window.console&&console.error&&console.error("VL snippet loaded twice.")):(a.invoked=!0,void(a.load=function(b,c,d){var e={};e.publicToken=b,e.config=c||{};var f=document.createElement("script");f.type="text/javascript",f.id="vrlps-js",f.defer=!0,f.src="https://app.viral-loops.com/client/vl/vl.min.js";var g=document.getElementsByTagName("script")[0];return g.parentNode.insertBefore(f,g),f.onload=function(){a.setup(e),a.instances[b]=e},e.identify=e.identify||function(a,b){e.afterLoad={identify:{userData:a,cb:b}}},e.pendingEvents=[],e.track=e.track||function(a,b){e.pendingEvents.push({event:a,cb:b})},e.pendingHooks=[],e.addHook=e.addHook||function(a,b){e.pendingHooks.push({name:a,cb:b})},e.$=e.$||function(a){e.pendingHooks.push({name:"ready",cb:a})},e}))}();var campaign=VL.load("xvIsk68OenzyeeSS22Ptc2w0N6E",{autoLoadWidgets:!0});</script>

 <!-- <script>!function(){var a=window.VL=window.VL||{};return a.instances=a.instances||{},a.invoked?void(window.console&&console.error&&console.error("VL snippet loaded twice.")):(a.invoked=!0,void(a.load=function(b,c,d){var e={};e.publicToken=b,e.config=c||{};var f=document.createElement("script");f.type="text/javascript",f.id="vrlps-js",f.defer=!0,f.src="https://app.viral-loops.com/client/vl/vl.min.js";var g=document.getElementsByTagName("script")[0];return g.parentNode.insertBefore(f,g),f.onload=function(){a.setup(e),a.instances[b]=e},e.identify=e.identify||function(a,b){e.afterLoad={identify:{userData:a,cb:b}}},e.pendingEvents=[],e.track=e.track||function(a,b){e.pendingEvents.push({event:a,cb:b})},e.pendingHooks=[],e.addHook=e.addHook||function(a,b){e.pendingHooks.push({name:a,cb:b})},e.$=e.$||function(a){e.pendingHooks.push({name:"ready",cb:a})},e}))}();var campaign=VL.load("xvIsk68OenzyeeSS22Ptc2w0N6E",{autoLoadWidgets:!0});</script> -->
</html>