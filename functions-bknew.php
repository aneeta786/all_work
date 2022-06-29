<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'hello_elementor_child_style' );
				function hello_elementor_child_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

/**
 * Your code goes below.
 */

/*****************latest article****************/
add_shortcode('latest_article','latest_article_shortcode');
function latest_article_shortcode(){
ob_start();


?>

<div class="post-category-filter">
   <div class="filter-categories" data-default-order="desc" data-default-orderby="name">

      <?php $args = array('orderby' => 'Date','order' => 'DSC');
      $categories = get_categories($args);
      foreach($categories as $category) { 

         ?>
      <a href="blog/?term=<?php echo $category->term_id;?>&amp;orderby=name&amp;order=desc" class="teram<?php echo $category->term_id;?>"><?php echo $category->name;?></a>
   <?php } ?>
      </div>
   <div class="filter-extras">
      <div class="filter-by">

         <a href="/blog/?term=<?php echo $_GET['term'];?>&amp;orderby=date&amp;order=desc" class="sort-by-date" data-by="date"><i class="fas fa-calendar-alt"></i><span class="filter-popup">Sort by date</span></a>
         <span class="filter-switch new_switrer"><span class="filter-switch-toggle"></span></span>
         <a href="/blog/?term=<?php echo $_GET['term'];?>&amp;orderby=name&amp;order=desc" class="sort-by-name act" data-by="name"><i class="fa fa-font" aria-hidden="true"></i><span class="filter-popup">Sort by name</span></a>
      </div>
      <div class="filter-sorting" style="display: none;">
         <a href="/blog/?term&amp;orderby=name&amp;order=DESC" class="sort-by-desc act" data-sort="desc"><i class="fas fa-sort-amount-down" aria-hidden="true"></i><span class="filter-popup">Descending</span>
         </a>
         
      </div>
   </div>
</div>
<div class="blog-posts-wrap">
   <div class="elementor-widget-container">
      <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-ratio">

<?php


$term_ids =$_GET['term'];

$order =$_GET['order'];
$order_name =$_GET['orderby'];
  
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
       'orderby'=> $order_name,
         'order' => $order,
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms'    => $term_ids
            ),
            // array(
            //     'taxonomy' =>'sort_by',
            //     'field' => 'term_id',
            //     'terms'    => $terms
            // )
        )
    );
$arr_posts = new WP_Query( $args ); 
      // echo "<pre>";
      // print_r($arr_posts);
      // echo "</pre>";
      if ($arr_posts->have_posts()) :
    while ($arr_posts->have_posts()) :
        $arr_posts->the_post(); 
 ?>
  <style>.all_post{display:none !important;}</style>
         <article class="elementor-post elementor-grid-item post type-post has-post-thumbnail">
            <a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>">
               <div class="elementor-post__thumbnail elementor-fit-height">
                  <?php if (has_post_thumbnail()) :
                the_post_thumbnail();
      endif; ?></div>
            </a>
            <div class="elementor-post__text">
               <h3 class="elementor-post__title">
                  <a href="<?php the_permalink();?>">
                 <?php the_title(); ?></a>
               </h3>
               <div class="elementor-post__meta-data">
                  <span class="elementor-post-date">
                 <?php $post_date = get_the_date( 'j D Y' ); echo $post_date; ?></span>
               </div>
               <div class="elementor-post__excerpt">
                  <p><?php the_excerpt(); ?></p>
               </div>
               <a class="elementor-post__read-more" href="<?php the_permalink();?>">
               Read More</a>
            </div>
         </article>
    <?php endwhile;
      wp_reset_postdata();
      endif;
     // exit; ?>
      </div>
   </div>
</div>

<?php
$terms =$_GET['term'];

 $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
         'orderby'=> $order_name,
         'order' => 'ASC',
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms'    => '1'
            ),
            // array(
            //     'taxonomy' =>'sort_by',
            //     'field' => 'term_id',
            //     'terms'    => $terms
            // )
        )
    );
 $urls =site_url('/blog');
 if($urls){ ?>
    <script type="text/javascript">
           jQuery('.filter-by a[href^="/blog/?term=&orderby=name&order=desc"]').each(function(){ 
                var oldUrl = jQuery(this).attr("href"); // Get current url
                var newUrl = oldUrl.replace("/blog/?term=&orderby=name&order=desc", "/blog/?term=1&orderby=name&order=desc"); // Create new url
                jQuery(this).attr("href", newUrl); // Set herf value
            });
jQuery(".sort-by-date").click(function(e){
       
            var oldUrl = jQuery(this).attr("href"); // Get current url
            var newUrl = oldUrl.replace("/blog/?term=&orderby=date&order=desc", "/blog/?term=1&orderby=date&order=desc"); // Create new url
            jQuery(this).attr("href", newUrl); // Set herf value
        });
jQuery( document ).ready(function() {
setTimeout(function() { 
jQuery(".filter-categories a:nth-child(1)").addClass('act');

}, 900);
});


</script>
<?php
$term_ids =$_GET['term'];
if($term_ids =='12'){
?>
<script type="text/javascript">
   jQuery( document ).ready(function() {
     setTimeout(function() { 
jQuery(".filter-categories a:nth-child(1)").removeClass('act');
}, 1200);
         
     if(jQuery('.filter-categories a.teram12').hasClass('act')){
  // jQuery('.filter-categories a.teram1').removeClass('act');
   


}else{
  jQuery('.filter-categories a.teram12').addClass('act')
}

});
</script>
<?php
} 


if($term_ids =='16'){
?>
<script type="text/javascript">
   jQuery( document ).ready(function() {
     setTimeout(function() { 
jQuery(".filter-categories a:nth-child(1)").removeClass('act');
jQuery('.filter-categories a.teram12').removeClass('act');
}, 1200);
         
     if(jQuery('.filter-categories a.teram16').hasClass('act')){
  // jQuery('.filter-categories a.teram1').removeClass('act');
   


}else{
  jQuery('.filter-categories a.teram16').addClass('act')
}

});
</script>
<?php
} if($term_ids =='15'){
?>
<script type="text/javascript">
   jQuery( document ).ready(function() {
     setTimeout(function() { 
jQuery(".filter-categories a:nth-child(1)").removeClass('act');
jQuery('.filter-categories a.teram12').removeClass('act');
jQuery('.filter-categories a.teram16').removeClass('act');
}, 1200);
         
     if(jQuery('.filter-categories a.teram15').hasClass('act')){
  // jQuery('.filter-categories a.teram1').removeClass('act');
   


}else{
  jQuery('.filter-categories a.teram15').addClass('act')
}

});
</script>
<?php
} ?>
<?php
 if($term_ids =='14'){
?>
<script type="text/javascript">
   jQuery( document ).ready(function() {
     setTimeout(function() { 
jQuery(".filter-categories a:nth-child(1)").removeClass('act');
jQuery('.filter-categories a.teram12').removeClass('act');
jQuery('.filter-categories a.teram16').removeClass('act');
jQuery('.filter-categories a.teram15').removeClass('act');
}, 1200);
         
     if(jQuery('.filter-categories a.teram14').hasClass('act')){
  // jQuery('.filter-categories a.teram1').removeClass('act');
   


}else{
  jQuery('.filter-categories a.teram14').addClass('act')
}

});
</script>
<?php
} ?>
   <div class="blog-posts-wrap">
   <div class="elementor-widget-container">
   <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-ratio">
   <?php
$arr_posts = new WP_Query( $args ); 
      // echo "<pre>";
      // print_r($arr_posts);
      // echo "</pre>";
      if ($arr_posts->have_posts()) :
    while ($arr_posts->have_posts()) :
        $arr_posts->the_post(); 
 ?>
       
         <article class="all_post elementor-post elementor-grid-item post type-post has-post-thumbnail">
            <a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>">
               <div class="elementor-post__thumbnail elementor-fit-height">
                  <?php if (has_post_thumbnail()) :
                the_post_thumbnail();
      endif; ?></div>
            </a>
            <div class="elementor-post__text">
               <h3 class="elementor-post__title">
                  <a href="<?php the_permalink();?>">
                 <?php the_title(); ?></a>
               </h3>
               <div class="elementor-post__meta-data">
                  <span class="elementor-post-date">
                 <?php $post_date = get_the_date( 'j D Y' ); echo $post_date; ?></span>
               </div>
               <div class="elementor-post__excerpt">
                  <p><?php the_excerpt(); ?></p>
               </div>
               <a class="elementor-post__read-more" href="<?php the_permalink();?>">
               Read More</a>
            </div>
         </article>

    <?php

     endwhile;
      wp_reset_postdata();
      endif;
   }
     // exit; ?>
  </div>
      </div>
   </div>
</div>
</div>
</div>

<?php 


return ob_get_clean();
}
add_shortcode('sigle_post_cat','sigle_post_cat');
function sigle_post_cat(){
ob_start();


?>

<div class="category-list">
    <ul>
       <?php $args = array('orderby' => 'name','order' => 'ASC');
      $categories = get_categories($args);
      foreach($categories as $category) { 

         ?>
         <li id="terms<?php echo $category->term_id;?>" class="category-item"><a id="<?php echo $category->term_id;?>" href="<?php echo $category->slug;?>"><?php echo $category->name;?></a>
        </li>
      
   <?php } ?>
           
    </ul>
</div>

<?php return ob_get_clean();
} 
add_shortcode('post_date','post_date');
function post_date(){
ob_start();

global $post;
?>

<div class="fancy-date">
   <?php $date = get_the_date( 'd', $post->ID );?>
<?php $month = get_the_date( 'F', $post->ID );?>
<?php $year = get_the_date( 'Y', $post->ID );?>
    <a title="2:34 pm" href="/2020/08/08/" rel="nofollow">
        <span class="entry-month"><?php echo $month; ?></span>
        
<?php $date = get_the_date( 'd', $post->ID );?>
<?php $month = get_the_date( 'm', $post->ID );?>
<?php $year = get_the_date( 'Y', $post->ID );?>
        <span class="entry-date updated"><?php echo $date; ?></span>
        <span class="entry-year"><?php echo $year; ?></span>
    </a>
</div>
<?php return ob_get_clean();
} 