<?php /* Template Name: blog page */ 
get_header();?>
<div class="banner-section bg-gray padd_l_r sec-content blog-page" data-id="bg-gray">
		<div class="section-headings">
			<div class="title-layer-before">
				<span class="subtitle"><?php echo get_the_title() ;?></span>
				<h2 class="text-pink "><?php if ( $main_title = get_field( 'main_title' ) ) : ?>
						<?php echo  $main_title; ?>
						<?php endif; ?></h2>
			</div>
		</div><!--section heading end-->
		<!-- Blog sec -->
		<div class="blog_main bg-gray padd-t_b sec-content" data-id="bg-gray">
					<div class="cms-tab-inner">
						<div class="sec-tab">
							<div class="cate-title "><?php if ( $categories_name = get_field( 'categories_name' ) ) : ?>
									<?php echo $categories_name ; ?>:
									<?php endif; ?></div>
							<div class="tab-btn">
								<div class="tab tab-btn-desktop">
									<?php $custom_terms = get_terms('category');foreach ($custom_terms as $custom_term) { ?>
										<button class="tablinks" data-id="<?php echo $custom_term->slug;?>" onclick="openCity(event, '<?php echo $custom_term->slug;?>')"><span><?php echo $custom_term->name;?></span></button>
						            <?php } ?>
								</div>
							</div>
							<div class="tab-btn tab-btn-mobile">
								<div class="tab tabslider">
								<?php $custom_terms = get_terms('category');
				                  foreach ($custom_terms as $custom_term) { ?>
								  <button class="tablinks" data-id="<?php echo $custom_term->slug;?>" onclick="openCity(event, '<?php echo $custom_term->slug;?>')"><span><?php echo $custom_term->name;?></span></button>
								<?php } ?>
							</div>
						</div>
					</div>
						<div class="news-sec-inner team_sections">
							<?php foreach ($custom_terms as $custom_term) {
                                $args = array('post_type' => 'post','posts_per_page' => 1 ,
								'tax_query' => array(
                                        array(    'taxonomy' => 'category', 'field' => 'slug','terms' => $custom_term->slug,
									 ),
									 ),
									);
									$loop = new WP_Query($args);
									if ($loop->have_posts()) { ?>
									<div id="<?php echo   $custom_term->slug; ?>" class="tabcontent hideit <?php echo $custom_term->slug; ?>"  >
									<?php while ($loop->have_posts()) { $loop->the_post(); ?> 
										<div class="news-box-inner">
											<div class="thumbnil">
												<?php if (has_post_thumbnail($loop->ID)): ?>
												     <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->ID), 'single-post-thumbnail'); ?>
												    <a href="<?php the_permalink();?>">	<img src="<?php echo $image[0]; ?>" class="new_img" alt=""></a>
									            <?php endif; ?>
												<div class="post-contnet">
													<div class="post-desp">
													<a href="<?php the_permalink();?>">
														<div class="desp">
															<h4><?php echo  get_the_title($loop->post_title) ; ?></h4>
															<p><?php echo wp_trim_words( get_the_content(), 40, '...' );?></p>
														</div>
										            </a>
													</div>
													<div class="date-dropsipping">
														<ul>
														<li>
                                                            <span class="date"><?php $post_date = get_the_date( 'j D Y' ); echo $post_date; ?></span>
																<span class="time"><?php echo meks_time_ago();?>.</span>
															</li>
														</ul>
														<div class="author-desp">
														    <div class="img">
														        <?php the_custom_logo(); ?>
													        </div>
															<div class="name">Wiio</div>
														</div>
													</div>
												</div>
										</div>
									</div><!--end top full post-->
									<?php }  wp_reset_postdata();?>
									<div class="blog-post-mid">
										<div class="blog-post-top">
											<div class="blog-post-mid-left">
												<div class="blog-post-row">
                                                  <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
												      $args = array( 'post_type'=> 'post', 
													     'orderby'    => 'ID','post_status' => 'publish', 'order'    => 'DESC', 'posts_per_page' => 10, 'paged'          => $paged,
														     'tax_query' => array(
																  array(    'taxonomy' => 'category',
																   'field' => 'slug',
																     'terms' => $custom_term->slug,
																	 ), 
																	),
																 );
												 $result = new WP_Query( $args );
												 if ( $result-> have_posts() ) : ?>
												<?php while ( $result->have_posts() ) : $result->the_post(); ?>
													<div class="blog-post-box">
														 <div class="post-img">
														    <?php if (has_post_thumbnail( $post->ID ) ): ?>
															  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
										                          <a href="<?php the_permalink();?>">
										                             <img src="<?php echo $image[0]; ?>" alt=""></a>
                                                                 <?php endif; ?>
													        </div>
															 <a href="<?php the_permalink();?>">
																	<div class="post-contnet">
																		 <ul class="date">
																			 <li>
																				 <span class="date"><?php $post_date = get_the_date( 'j D Y' ); echo $post_date; ?></span>
																                  <span class="time"><?php echo meks_time_ago();?>.</span>
															                  </li>
													                      </ul>
															                 <h4><?php the_title(); ?></h4>
															                <p><?php echo wp_trim_words( get_the_content(), 40, '...' );?></p>
													                         	<div class="author-desp">
														                           <div class="img" id="cus_logsss">
														                             <?php the_custom_logo(); ?>
                                                                
                                                                                     </div>
															                           <div class="name">Wiio</div>
														                         </div>
														                </div>
																</a>
															</div><!--1-->
                                                    <?php endwhile; else: ?>
														<p><?php _e('Sorry, no posts found.'); ?></p>
														<?php endif; wp_reset_postdata(); ?>
												</div>
											</div>
											<div class="blog-latest-aritcle">
												<div class="blog-row-aritcle">
													<div class="section-headings">
													<div class="title-layer-before">
														<h3 class="text-white "><?php if ( $subcribe_test = get_field( 'subdcribe_test' ) ) : ?>
																<?php echo  $subcribe_test ; ?>
																	<?php endif; ?>
														</h3>
													</div>
												</div><!--section heading end-->
												<div class="form-box">
												<?php if (ICL_LANGUAGE_CODE == 'pt-pt') {
													echo do_shortcode('[email-subscribers-form id="2"]');
													?>
													<?php } ?>
													<?php if (ICL_LANGUAGE_CODE == 'en') { ?>
													<?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
													<?php } ?>
													<!-- <form>
														<div class="form-group">
															<input type="E-mail" name="" placeholder="Email">
														</div>
														<div class="btn-group"><span class="custom-btn"><input type="submit" name="" value="Subscribe now"></span></div>
													</form> -->
												</div>
												</div>
											</div>
                                    
                                    <!--Mid blog post-->


									<!--end Tab 1-->

                                                        </div>

				

						</div>
						

						<div class="pagination">
							
						<?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $result->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
           // 'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer', 'text-domain' ) ),
            //'next_text'    => sprintf( '%1$s <i></i>', __( 'Previous', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
			
		
		               <?php $query = new WP_Query( $loop );
                         $count =  wp_count_posts()->publish; ?>	
							<div class="pagination-total">
								<span>1-<?php echo $total_pages;?> of  <?php echo  $count;?> news</span>
							</div>
						</div>
						</div><!--end Tab 1-->
                         <?php } } ?>


						

						</div>
					</div>
		</div><!-- End Blog -->
</div>

<!-- Dropshipper section -->
<?php if( have_rows('join_sections') ):
  while ( have_rows('join_sections') ) : the_row();?>
<div class="dropshippers-sec padd_l_r padd-t_b bg-gray sec-content" data-id="bg-gray">
	<div class="integrstion-section-inner">
		<div class="section-headings">
		<h2 class="text-dark-blue title-layer-before"><?php if ( $title = get_sub_field( 'title' ) ) : ?>
	        <?php echo $title; ?>
           <?php endif; ?>
		<div class="flag-title"><h6><?php if ( $lets_start = get_sub_field( 'lets_start' ) ) : ?>
	         <?php echo  $lets_start ; ?>
              <?php endif; ?></h6></div></h2>
	</div>
	<div class="dropshippers-right Intergration-right">
		<p><?php if ( $descriptions = get_sub_field( 'descriptions' ) ) : ?>
	       <?php echo  $descriptions ; ?>
              <?php endif; ?></p>
		<div class="btn-group"><a href="<?php if ( $button_link = get_sub_field( 'button_link' ) ) : ?>
	    <?php echo  $button_link ; ?>
        <?php endif; ?>" class="custom-btn"><?php if ( $button = get_sub_field( 'button' ) ) : ?>
      	<?php echo  $button ; ?>
         <?php endif; ?></a></div>
	</div>
	</div>
</div>
<?php endwhile;
endif;?>

<script>
	jQuery(document).ready(function() {
		$(' .tablinks').click(function(){
  var target = $(this).attr('data-id');
  $('.team_sections .tabcontent').removeClass('active');
  $('.team_sections .tabcontent').addClass('hideit');
  $('.team_sections .tabcontent.'+target).addClass('active');
  $('.team_sections .tabcontent.'+target).removeClass('hideit');
});

jQuery( ".slick-arrow" ).on( "click", function() {
		jQuery('.slick-slide.slick-current').find('.tablinks').click();
    });
	
 });
 




	
	</script>
<?php get_footer();?>