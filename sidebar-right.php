<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package ProfitMag
 */
?>
<?php
$profitmag_settings = get_option( 'profitmag_options' );
if( is_home() || is_front_page() ) {
    $show_sidebar = 1;
}else {
    if( isset( $profitmag_settings['sidebar_layout']) && ($profitmag_settings['sidebar_layout'] == 'right_sidebar') || ($profitmag_settings['sidebar_layout'] == 'both_sidebar') ) {
        $show_sidebar = 1;
    }else {
        $show_sidebar = 0;
    }
}
?>
<?php 
if( $show_sidebar ): ?>

    <?php if( is_active_sidebar( 'right-sidebar-top' ) || !empty( $profitmag_settings['right_cat_post_one'])  || !empty( $profitmag_settings['right_sidebar_middle_ads']) || !empty( $profitmag_settings['right_side_gallery'] )  || 
                !empty( $profitmag_settings['right_cat_post_two'] ) || is_active_sidebar( 'right-sidebar-middle' )|| !empty( $profitmag_settings['right_sidebar_bottom_ads_one'] ) || !empty( $profitmag_settings['right_sidebar_bottom_ads_two'] )   ) : ?>
        <div id="secondary-right" class="widget-area secondary-sidebar f-right clearfix" role="complementary">
        <?php if( is_active_sidebar( 'right-sidebar-top' ) ) : ?>
                <div id="sidebar-section-top" class="widget-area sidebar clearfix">
                 <?php   dynamic_sidebar( 'right-sidebar-top' ); ?>
                </div>
        <?php endif; ?>
        
        <?php   if( !empty( $profitmag_settings['right_cat_post_one'] ) && $profitmag_settings['right_cat_post_one']>0 ): ?>
                    <div id="sidebar-section-cat-one" class="widget-area sidebar clearfix">
                        <?php
                            $cat = $profitmag_settings['right_cat_post_one'];
                            $no_of_posts = $profitmag_settings['right_no_of_cat_post_one'];                    
                            $side_query1 = new WP_Query( 'cat='.$cat.'&posts_per_page='.$no_of_posts );
                            if($side_query1->have_posts()):
                                $cat_name = get_cat_name( $cat );
                                $cat_link = get_category_link( $cat );
                                $skip_flag = 1;
                        ?>
                                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo  $cat_name; ?></h2>
                        <?php
                                while( $side_query1->have_posts() ): $side_query1->the_post();
                        ?>
                                    <div class="featured-post-sidebar">
                                        
                                        <?php if( $skip_flag == 1 ): ?>
                                            <figure class="post-thumb clearfix">
                                                <?php
                                                    if( has_post_thumbnail() ):
                                                        $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar-medium' );
                                                ?>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                                <?php
                                                    endif;
                                                ?>
                                            </figure>
                                        <?php endif; ?>
                                        
                                        <div class="post-desc">
                                            <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                            <?php if( $skip_flag == 1 ): ?>
                                                <p class="side-excerpt"><?php profitmag_sidebar_excerpt(get_the_content()); ?></p>
                                                <?php $skip_flag = 0; ?>
                                            <?php endif; ?>                                    
                                        </div>
                                    </div>
                        <?php                        
                                endwhile;
                        ?>
                            <div class="view-all-link"><a href="<?php echo esc_url( $cat_link ); ?>" title="View All"><?php _e( 'View All', 'profitmag' ); ?></a></div>
                        <?php
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
        <?php   endif; ?>
        
        
        <?php if( !empty( $profitmag_settings['right_sidebar_middle_ads'] ) && $profitmag_settings['right_sidebar_middle_ads'] != '' ): ?>
                                <div id="sidebar-section-mid-ads" class="widget-area sidebar clearfix">
                                    <?php echo $profitmag_settings['right_sidebar_middle_ads']; ?>
                                </div>
            <?php endif; ?>
            
        <?php if( !empty( $profitmag_settings['right_side_gallery'] ) ): ?>
            <div id="sidebar-section-side-gallery" class="widget-area sidebar clearfix">
                <h2 class="block-title"><span class="bordertitle-red"></span><?php _e( 'Photo Gallery', 'profitmag' ); ?></h2>
                <div class="photogallery-wrap clearfix">
                <?php   foreach( $profitmag_settings['right_side_gallery'] as $image ): 
                            $attachment_id = profitmag_get_image_id( $image );
                            $img_url = wp_get_attachment_image_src($attachment_id,'sidebar-gallery');
                            $img_url_full = wp_get_attachment_image_src( $attachment_id, 'full' );
                ?>
                            <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo $img_url_full[0];?>"><img src="<?php echo $img_url[0]; ?>" alt="Gallery" /></a>
                <?php
                 endforeach;?>
             </div>
            </div>
            
        <?php endif; ?>
            
            
        <?php   if( !empty( $profitmag_settings['right_cat_post_two'] ) && $profitmag_settings['right_cat_post_two']>0 ): ?>
                    <div id="sidebar-section-cat-two" class="widget-area sidebar clearfix">
                        <?php
                            $cat = $profitmag_settings['right_cat_post_two'];
                            $no_of_posts = $profitmag_settings['right_no_of_cat_post_two'];                    
                            $side_query1 = new WP_Query( 'cat='.$cat.'&posts_per_page='.$no_of_posts );
                            if($side_query1->have_posts()):
                                $cat_name = get_cat_name( $cat );
                                $cat_link = get_category_link( $cat );
                                $skip_flag = 1;
                        ?>
                                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                        <?php
                                while( $side_query1->have_posts() ): $side_query1->the_post();
                        ?>
                                    <div class="featured-post-sidebar clearfix">
                                        
                                        <?php if( $skip_flag == 1 ): ?>
                                            <figure class="post-thumb clearfix">
                                                <?php
                                                    if( has_post_thumbnail() ):
                                                        $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar-medium' );
                                                ?>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                                <?php
                                                    endif;
                                                ?>
                                            </figure>
                                        <?php endif; ?>
                                        
                                        <div class="post-desc">
                                            <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                            <?php if( $skip_flag == 1 ): ?>
                                                <p class="side-excerpt"><?php profitmag_sidebar_excerpt(get_the_content()); ?></p>
                                                <?php $skip_flag = 0; ?>
                                            <?php endif; ?>                                    
                                        </div>
                                    </div>
                        <?php                        
                                endwhile;
                        ?>
                            <div class="view-all-link"><a href="<?php echo esc_url( $cat_link ); ?>" title="View All"><?php _e( 'View All', 'profitmag' ); ?></a></div>
                        <?php
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
        <?php   endif; ?>
            
        <?php if( is_active_sidebar( 'right-sidebar-middle' ) ) : ?>
                <div id="sidebar-section-side-mid" class="widget-area sidebar clearfix">
                 <?php   dynamic_sidebar( 'right-sidebar-middle' ); ?>
                </div>
        <?php endif; ?>
        
        
        
        <?php if( !empty( $profitmag_settings['right_sidebar_bottom_ads_one'] ) && $profitmag_settings['right_sidebar_bottom_ads_one'] != '' ): ?>
                                <div id="sidebar-section-ads-one" class="widget-area sidebar clearfix">
                                    <?php echo $profitmag_settings['right_sidebar_bottom_ads_one']; ?>
                                </div>
        <?php endif; ?>
        
        <?php if( !empty( $profitmag_settings['right_sidebar_bottom_ads_two'] ) && $profitmag_settings['right_sidebar_bottom_ads_two'] != '' ): ?>
                                <div id="sidebar-section-ads-two" class="widget-area sidebar clearfix">
                                    <?php echo $profitmag_settings['right_sidebar_bottom_ads_two']; ?>
                                </div>
        <?php endif; ?>
        </div>
    
    <?php else: ?>
                <!-- Preview Content -->
                <div id="secondary-right" class="widget-area secondary-sidebar f-right clearfix" role="complementary">
                <div id="sidebar-section-top" class="widget-area sidebar clearfix">
                 		<aside id="profitmag-recent-posts-2" class="widget profitmag_widget_recent_entries">		
                            <h3 class="widget-title"><span>Recent</span></h3>		<ul>
        					<li class="clearfix">
        				        <figure class="widget-image clearfix">
                                    <img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-95.jpg' ?>">
                                </figure>
                                <a href="#">Nulla porttitor accumsan</a>        			
 			                </li>
                            <li class="clearfix">
        				        <figure class="widget-image clearfix">
                                    <img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-95.jpg' ?>">
                                </figure>
                                <a href="#">Nulla porttitor accumsan</a>        			
 			                </li>
                            <li class="clearfix">
        				        <figure class="widget-image clearfix">
                                    <img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-95.jpg' ?>">
                                </figure>
                                <a href="#">Nulla porttitor accumsan</a>        			
 			                </li>
                            <li class="clearfix">
        				        <figure class="widget-image clearfix">
                                    <img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-95.jpg' ?>">
                                </figure>
                                <a href="#">Nulla porttitor accumsan</a>        			
 			                </li>
                            
        					
        				</ul>
        		</aside>        </div>
        
                    <div id="sidebar-section-cat-one" class="widget-area sidebar clearfix">
                                                <h2 class="block-title"><span class="bordertitle-red"></span>Life</h2>
                                                    <div class="featured-post-sidebar">
                                                        <figure class="post-thumb clearfix">
                                                            <a href="#" title="Nulla porttitor accumsan"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>" alt="Nulla porttitor accumsan" title="Nulla porttitor accumsan"></a>
                                                        </figure>
                                                                        
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="" title="Nulla porttitor accumsan">Nulla porttitor accumsan</a></h3>
                                                            <p class="side-excerpt">Nulla porttitor accumsan tincidunt. Cras ultricies ligula</p>
                                                                                                                                        
                                                        </div>
                                                    </div>
                                                    <div class="featured-post-sidebar">                                                                                                              
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="#" title="Donec sollicitudin">Donec sollicitudin</a></h3>                                                                                            
                                                        </div>
                                                    </div>  
                                                    <div class="featured-post-sidebar">                                                                                                              
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="#" title="Donec sollicitudin">Donec sollicitudin</a></h3>                                                                                            
                                                        </div>
                                                    </div>                                                  
                                            <div class="view-all-link"><a href="#" title="View All">View All</a></div>
                                    </div>
        
        
                                <div id="sidebar-section-mid-ads" class="widget-area sidebar clearfix">
                                    <a href=""><img src="<?php echo get_template_directory_uri().'/images/demo/button-fashion-1334-302.jpg' ?>"></a>                        
                                </div>
                
            <div id="sidebar-section-side-gallery" class="widget-area sidebar clearfix">
                <h2 class="block-title"><span class="bordertitle-red"></span>Photo Gallery</h2>
                <div class="photogallery-wrap clearfix">
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>                                    
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>
                                    <a class="nivolight" data-lightbox-gallery="grp" href="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-81.jpg' ?>" alt="Gallery" /></a>
                                    
                                    
                                    
                     </div>
            </div>
            
            
            
                    <div id="sidebar-section-cat-two" class="widget-area sidebar clearfix">
                                                <h2 class="block-title"><span class="bordertitle-red"></span>Entertainment</h2>
                                                    <div class="featured-post-sidebar clearfix">                                        
                                                        <figure class="post-thumb clearfix">
                                                            <a href="#" title="Nulla porttitor accumsan"><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>" alt="Nulla porttitor accumsan" title="Nulla porttitor accumsan"></a>
                                                        </figure>                                                                        
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="#" title="Nulla porttitor accumsan">Nulla porttitor accumsan</a></h3>
                                                            <p class="side-excerpt">Nulla porttitor accumsan tincidunt. Cras ultricies ligula</p>
                                                                                                                                        
                                                        </div>
                                                    </div>
                                                    <div class="featured-post-sidebar clearfix">                                                    
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="#" title="Politics Nulla">Politics Nulla</a></h3>
                                                                                                
                                                        </div>
                                                    </div>
                                                    <div class="featured-post-sidebar clearfix">                                                    
                                                        <div class="post-desc">
                                                            <div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                                            <h3><a href="#" title="Politics Nulla">Politics Nulla</a></h3>
                                                                                                
                                                        </div>
                                                    </div>
                                                    
                                            <div class="view-all-link"><a href="#" title="View All">View All</a></div>
                                    </div>
            
        
        
        
                                <div id="sidebar-section-ads-one" class="widget-area sidebar clearfix">
                                    <a href=""><img src="<?php echo get_template_directory_uri().'/images/demo/christmas-xmas-3470-302.jpg' ?>""></a>                        
                                </div>
        
            </div>                                    
    <?php endif; ?>
<?php endif; ?>