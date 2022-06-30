<?php
/*
Template Name: Left and Right Sidebars
*/

get_header();

$post_id              = get_the_ID();
$is_page_builder_used = et_pb_is_pagebuilder_used( $post_id );
$container_tag        = 'product' === get_post_type( $post_id ) ? 'div' : 'article'; ?>

<div id="main-content" class="right-left-sidebars">
    <div class="sidebar--left">
        <?php //dynamic_sidebar('et_pb_widget_area_1'); ?>

        <div class="tab-container">
            <div class="tab-menu">
              <ul>
                 <li><a href="javascript:void(0)" class="tab-a active-a" data-id="index">Index</a></li>
                 <li><a href="javascript:void(0)" class="tab-a" data-id="viewall">View all</a></li>
                 <li><a href="javascript:void(0)" class="tab-a" data-id="sort">Sort by</a></li>
              </ul>
            </div>
            <div class="tab tab-active" data-id="index">
                <?php $taxonomy = 'index';
                $top_level_terms = get_terms( array(
                     'taxonomy'      => $taxonomy,
                      'parent'        => '0',
                      'hide_empty'    => false,
                      ) );
                      if ($top_level_terms) {
                          foreach ($top_level_terms as $top_level_term)
                           {
                              $top_term_id = $top_level_term->term_id;
                              $top_term_name = $top_level_term->name;
                              $top_term_tax = $top_level_term->taxonomy; ?>
                <div class="order-list">
                    <h3><?php echo $top_term_name; ?></h3>
                    <ol>
                        <?php  
                        $second_level_terms = get_terms(array(
                                    'taxonomy' => $top_term_tax, 
                                    'child_of' => $top_term_id,
                                    'parent' => $top_term_id,
                                    'hide_empty' => false,
                                ));
                        if ($second_level_terms) 
                        {
                            foreach ($second_level_terms as $second_level_term) 
                            {
                                //print_r($second_level_term);
                                $second_term_name = $second_level_term->name;
                                $counts = $second_level_term->count; 
                                
                                if($counts == '1'){?>
                                <a id="term-<?php echo $second_level_term->term_id;?>" dataid ="<?php echo  $second_level_term->term_id ?>"  href="<?php echo $top_term_tax.'/'.$second_level_term->slug; ?>">
                                <li>
                                <?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                             </li></a> <?php }else  {  ?>
                                <a dataid ="<?php echo  $second_level_term->term_id ?>" id="<?php echo $second_level_term->term_id;?>" class="yourtermname ajax" onclick="term_ajax_get('<?php echo $second_level_term->term_id;?>');" href="javascript:void(0)">
                                <li>
                                <?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                            </li></a> <?php } ?>
                            
                            <?php }
                         } ?>
                    </ol>
                   
                </div>
                  <?php }   } ?>
            </div> 
            <!---------Close index--------------------->
            <div class="tab" data-id="viewall">
            <?php $taxonomy = 'sort_by';
                $top_level_terms = get_terms( array(
                    'taxonomy'      => array( 'index', 'sort_by' ),
                      'parent'        => '0',
                      'hide_empty'    => false,
                      ) );
                      if ($top_level_terms) {
                          foreach ($top_level_terms as $top_level_term)
                           {
                              $top_term_id = $top_level_term->term_id;
                              $top_term_name = $top_level_term->name;
                              $top_term_tax = $top_level_term->taxonomy; ?>
                <div class="order-list">
                    <h3><?php echo $top_term_name; ?></h3>
                    <ol>
                        <?php  $second_level_terms = get_terms(array(
                                    'taxonomy' => $top_term_tax, 
                                    'child_of' => $top_term_id,
                                    'parent' => $top_term_id,
                                    'hide_empty' => false,
                                ));
                        if ($second_level_terms) 
                        {
                            foreach ($second_level_terms as $second_level_term) 
                            {
                                $second_term_name = $second_level_term->name;
                                $counts = $second_level_term->count; 
                                 if($counts == '1'){
                                     
                                     ?>
                                <li dataid ="<?php echo  $second_level_term->term_id ?>"><a href="<?php echo $second_level_term->slug; ?>"><?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                            </a> </li> <?php }else  {  ?>
                                <li dataid ="<?php echo  $second_level_term->term_id ?>">
                                <a class="yourtermname ajax" onclick="term_ajax_get('<?php echo $second_level_term->name;?>');" href="javascript:void(0)">
                                    <?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                                </a>     
                             </li><?php } ?>
                            <?php }
                         } ?>
                    </ol>
                   
                </div>
                  <?php }   } ?>  
            </div>
            <div  class="tab" data-id="sort">
               

                    <?php $taxonomy = 'sort_by';
                $top_level_terms = get_terms( array(
                     'taxonomy'      => $taxonomy,
                      'parent'        => '0',
                      'hide_empty'    => false,
                      ) );
                      if ($top_level_terms) {
                          foreach ($top_level_terms as $top_level_term)
                           {
                              $top_term_id = $top_level_term->term_id;
                              $top_term_name = $top_level_term->name;
                              $top_term_tax = $top_level_term->taxonomy; ?>
                <div class="order-list">
                    <h3><?php echo $top_term_name; ?></h3>
                    <ol>
                        <?php  $second_level_terms = get_terms(array(
                                    'taxonomy' => $top_term_tax, 
                                    'child_of' => $top_term_id,
                                    'parent' => $top_term_id,
                                    'hide_empty' => false,
                                ));
                        if ($second_level_terms) 
                        {
                            foreach ($second_level_terms as $second_level_term) 
                            {
                                //print_r($second_level_term);
                                $second_term_name = $second_level_term->name;
                                $counts = $second_level_term->count; 
                                
                                if($counts == '1'){?>
                                <a id="term-<?php echo $second_level_term->term_id;?>" dataid ="<?php echo  $second_level_term->term_id ?>"  href="<?php echo $top_term_tax.'/'.$second_level_term->slug; ?>">
                                <li>
                                <?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                             </li></a> <?php }else  {  ?>
                                <a dataid ="<?php echo  $second_level_term->term_id ?>" id="term-<?php echo $second_level_term->term_id;?>" class="yourtermname ajax" onclick="term_ajax_get('<?php echo $second_level_term->term_id;?>');" href="javascript:void(0)">
                                <li>
                                <?php echo $second_term_name; ?>
                                     <span>(<?php echo $counts; ?>)</span>
                            </li></a> <?php } ?>
                            
                            <?php }
                         } ?>
                    </ol>
                   
                </div>
                  <?php }   } ?>     
           </div>

        </div>
<a href class="reset_filter">Reset Filter</a>
    </div>
    <div class="page-container--center">
        <?php the_content();?>
    </div>    
    <div class="sidebar--right">
        <?php dynamic_sidebar('et_pb_widget_area_2'); ?>
    </div>
</div>


<?php

get_footer();
